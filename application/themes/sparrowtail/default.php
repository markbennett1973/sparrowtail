<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');

use Application\Helpers\NavHelper;
/** @var \Concrete\Core\Page\Page $c */
?>

<main>
    <div class="col-sm-8 col-content">
        <nav id="breadcrumb"><?php echo NavHelper::getBreadcrumbs($c); ?></nav>

        <h1><?php echo $c->getCollectionName(); ?></h1>

        <?php if ($c->getCollectionTypeHandle() === 'blog_post') : ?>
            <p><strong>Posted on: </strong><?php echo date('d F Y', strtotime($c->getCollectionDatePublic())); ?></p>
        <?php endif; ?>

        <?php
        $a = new Area('Main');
        $a->setAreaGridMaximumColumns(12);
        $a->display($c);
        ?>

        <?php echo NavHelper::getTags($c); ?>
    </div>
    <div class="col-sm-4 col-sidebar">
        <?php
        $a = new GlobalArea('Sidebar');
        $a->display($c);
        ?>
    </div>
</main>

<?php
$this->inc('elements/footer.php');
