<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');
?>

<main>
    <div class="col-sm-8 col-content">
        <h1><?php echo $c->getCollectionName(); ?></h1>

        <?php
        $a = new Area('Main');
        $a->setAreaGridMaximumColumns(12);
        $a->display($c);
        ?>
    </div>
    <div class="col-sm-offset-1 col-sm-3 col-sidebar">
        <?php
        $a = new GlobalArea('Sidebar');
        $a->display($c);
        ?>
    </div>
</main>

<?php
$this->inc('elements/footer.php');
