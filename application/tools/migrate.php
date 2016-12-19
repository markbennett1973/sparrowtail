<?php
/*
 * Migrate blog content from old Drupal db into C5
 */

deleteOldPages();
$newPages = getNewPages();

$parentPage = \Concrete\Core\Page\Page::getByPath('/blog');
foreach ($newPages as $newPage) {
    createPage($newPage, $parentPage);
}

function deleteOldPages()
{
    $pl = new \Concrete\Core\Page\PageList();
    $pl->filterByPageTypeHandle('blog_post');
    $pages = $pl->getResults();
    foreach($pages as $page) {
        $page->delete();
    }
}

function getNewPages()
{
    $newPages = [];

    $mysqli = new mysqli('127.0.0.1', 'root', '', 'sparrowtail_d7');

    $sql = "select n.type, nr.title, n.created, n.changed, b.body_value,
      (select group_concat(td.name) as tags
      from taxonomy_index ti
      left outer join taxonomy_term_data td on ti.tid = td.tid
      where n.nid = ti.nid
      group by ti.nid) as tags
    from node n
    inner join node_revision nr on n.nid = nr.nid and n.vid = nr.vid
    inner join field_data_body b on n.nid = b.entity_id and n.vid = b.revision_id
    where n.type = 'blog'
    and n.status = 1
    order by n.created";


    $result = $mysqli->query($sql);

    while ($page = $result->fetch_assoc()) {
        $newPages[] = $page;
    }

    return $newPages;
}

function createPage($pageData, $parentPage) {

    $pageType = \PageType::getByHandle('blog_post');
    $template = \PageTemplate::getByHandle('blog_post');

    $newPage = $parentPage->add($pageType, array(
        'cName' => $pageData['title'],
        'cDatePublic' => date('Y-m-d H:i:s', $pageData['created']),
    ), $template);

    if ($pageData['tags']) {
        $newPage->setAttribute('tags', explode(',', $pageData['tags']));
    }

    // Create a masthead banner block with this image
    $block = BlockType::getByHandle('content');
    $data = ['content' => $pageData['body_value']];
    $newPage->addBlock($block, 'Main', $data);
}