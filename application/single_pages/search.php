<?php
use Application\Helpers\NavHelper;
?>

<h1>Search Results</h1>
<form class="search-form">
    <div class="search-field">
        <label for="query">Search: </label><input name="query" type="text" value="<?php echo $searchPhrase; ?>">
    </div>

    <div class="search-field">
    <label for="tag">Tag:</label>
        <select name="tag">
            <option value=""">-- All tags --</option>
            <?php foreach ($tags as $tag) : ?>
                <option value="<?php echo $tag; ?>" <?php echo ($tag == $selectedTag ? 'selected' : ''); ?>><?php echo $tag; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="search-field">
        <input type="submit" class="search-submit" value="Search" />
    </div>
</form>

<div class="search-results">
    <?php if (count($results)): ?>
        <?php foreach($results as $result): ?>
            <div class="search-result">
            <h2 class="title"><a href="<?php // echo $result->getCollectionPath(); ?>"><?php echo $result->getCollectionName(); ?></a></h2>
                <div class="ccm-block-page-list-date">
                    <strong>Posted on: <?php echo  date('d F Y', strtotime($result->getCollectionDatePublic())); ?></strong>
                </div>

                <div class="ccm-block-page-list-description">
                <?php echo $result->getCollectionDescription(); ?>
                </div>


                <br/><?php echo NavHelper::getTags($result); ?>

                <div class="ccm-block-page-list-page-entry-read-more">
                    <a href="<?php echo $url?>" target="<?php echo $target?>" class="<?php echo $buttonClasses?>">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2 class="title">No results found</h2>
    <?php endif; ?>
</div>
