<?php

namespace Application\Helpers;

use Concrete\Core\Page\Page;

class NavHelper
{
    /**
     * Get an HTML breadcrumb trail
     *
     * @param Page $page
     *   The current page
     * @param string $separator
     *   Optional separator. Defaults to ">"
     *
     * @return string
     *   HTML of breadcrumb trail
     */
    public static function getBreadcrumbs(Page $page, $separator = '>')
    {
        $links[] = $page->getCollectionName();
        while ($parentId = $page->getCollectionParentID()) {
            $page = Page::getByID($parentId);
            $links[] = '<a href="' . ($parentId == 1 ? '/' : $page->getCollectionPath()) . '">' . $page->getCollectionName() . '</a>';
        }

        return implode(" $separator ", array_reverse($links));
    }

    /**
     * Get an HTML list of tags for the current page
     *
     * @param Page $page
     * @return string
     */
    public static function getTags(Page $page)
    {
        $tagsHtml = '';

        $tags = $page->getAttribute('tags');
        if (count($tags)) {
            $tagsHtml = '<ul class="tags">';

            foreach ($tags as $tag) {
                $tagsHtml .= '<li class="tag"><a href="/search?tag=' . $tag . '">' . $tag . '</a></li>';
            }

            $tagsHtml .= '</ul>';
        }

        return $tagsHtml;
    }
}