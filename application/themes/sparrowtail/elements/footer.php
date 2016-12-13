<?php defined('C5_EXECUTE') or die("Access Denied.");

$footerSiteTitle = new GlobalArea('Footer Site Title');
$footerSiteTitleBlocks = $footerSiteTitle->getTotalBlocksInArea();

$footerSocial = new GlobalArea('Footer Social');
$footerSocialBlocks = $footerSocial->getTotalBlocksInArea();

$displayFirstSection = $footerSiteTitleBlocks > 0 || $footerSocialBlocks > 0 || $c->isEditMode();
?>

<footer id="footer-bottom">
    <div id="footer-area" class="clearfix">

        <div class="region region-footer">
            <div id="block-block-5" class="block block-block">


                <div class="content">
                    <p> </p>
                </div>

            </div> <!-- /.block -->
        </div>
        <!-- /.region -->
    </div>
</footer>

<div id="copyright">
    Copyright &copy; 2016, <a href="/">Sparrowtail</a>.
</div>

<?php $this->inc('elements/footer_bottom.php');?>
