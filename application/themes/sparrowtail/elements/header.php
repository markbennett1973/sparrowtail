<?php defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header_top.php');

?>

<div id="pre-header" class="clearfix">
    <ul id="header-social" class="clearfix">
        <li><a target="_blank" title="Sparrowtail in Facebook" href="https://www.facebook.com/mark.s.bennett"><img alt="Facebook" src="<?php echo $view->getThemePath()?>/images/social/facebook.png"> </a></li>
        <li><a target="_blank" title="Sparrowtail in Twitter" href="http://www.twitter.com/mark_bennett"><img alt="Twitter" src="<?php echo $view->getThemePath()?>/images/social/twitter.png"> </a></li>
        <li><a target="_blank" title="Sparrowtail in Google+" href="https://plus.google.com/u/0/115048066798492404654/about"><img alt="Google+" src="<?php echo $view->getThemePath()?>/images/social/google.png"> </a></li>
        <li><a target="_blank" title="Sparrowtail in RSS" href="/rss.xml"><img alt="RSS" src="<?php echo $view->getThemePath()?>/images/social/rss.png"> </a></li>
    </ul>
</div>

<header id="header" class="clearfix">
    <div id="logo">
        <div id="site-logo"><a href="/" title="Home">
                <img src="<?php echo $view->getThemePath()?>/images/logo.png" alt="Home" />
            </a></div>        <h1 id="site-name">
            <a href="/" title="Home"><span>Sparrowtail</span></a>
        </h1>
    </div>
    <nav id="navigation" role="navigation">
        <div id="main-menu">
            <?php
            $a = new GlobalArea('Header Navigation');
            $a->display();
            ?>
        </div>
    </nav>
</header>

