<?php defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header_top.php');

?>

<div id="pre-header" class="clearfix">
    <ul id="header-social" class="clearfix">
        <li><a target="_blank" title="Sparrowtail in Twitter" href="http://www.twitter.com/mark_bennett"><img alt="Twitter" src="<?php echo $view->getThemePath()?>/images/social/twitter.png"> </a></li>
        <li><a target="_blank" title="Sparrowtail in LinkedIn+" href="https://www.linkedin.com/in/mark-bennett/"><img alt="LinkedIn+" src="<?php echo $view->getThemePath()?>/images/social/linkedin.png"> </a></li>
        <li><a target="_blank" title="Sparrowtail in Github" href="https://github.com/markbennett1973""><img alt="Github" src="<?php echo $view->getThemePath()?>/images/social/github.png"> </a></li>
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
        <?php
        $a = new GlobalArea('Header Navigation');
        $a->display();
        ?>
    </nav>
</header>

