<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');

use Application\Helpers\NavHelper;
/** @var \Concrete\Core\Page\Page $c */
?>

<div id="site-slogan">It's all in the detail</div>

<div>
    <?php
    $a = new Area('Header Slider');
    $a->enableGridContainer();
    $a->display($c);
    ?>
</div>

    <main>
        <div class="col-sm-8 col-content">
            <?php
            $a = new Area('Main');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
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
