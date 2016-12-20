<?php


namespace Application\Controller\SinglePage;


use Concrete\Core\Page\Controller\PageController;
use Concrete\Core\Page\PageList;
use CollectionAttributeKey;

class Search extends PageController
{
    public function view()
    {
        $searchPhrase = trim($this->request('query'));
        $selectedTag = trim($this->request('tag'));

        $this->set('searchPhrase', $searchPhrase);
        $this->set('selectedTag', $selectedTag);
        $this->set('tags', $this->getAllTagValues());
        $this->set('results', $this->getResults($searchPhrase, $selectedTag));
    }

    private function getResults($phrase, $tag)
    {
        $pl = new PageList();
        $pl->filterByPageTypeHandle('blog_post');

        if ($phrase) {
            $pl->filterByKeywords($phrase);
        }

        if ($tag) {
            $pl->filterByAttribute('tags', $tag);
        }

        return $pl->getResults();
    }

    private function getAllTagValues()
    {
        $tags = [];
        $ak = CollectionAttributeKey::getByHandle('tags');
        if (is_object($ak)) {
            $type = $ak->getAttributeType();
            $controller = $type->getController();
            $controller->setAttributeKey($ak);
            $options = $controller->getOptions();

            foreach ($options as $option) {
                $tags[] = $option;
            }
        }


        return $tags;
    }
}