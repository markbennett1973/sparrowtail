<?php defined('C5_EXECUTE') or die("Access Denied.");
do {
    $u = new User();
    if (!$u->isRegistered()) {
        break;
    }

    $ui = $u->getUserInfoObject();

    $account = Page::getByPath('/account');
    if (!is_object($account) || $account->isError()) {
        break;
    }

    $desktop = \Concrete\Core\Page\Desktop\DesktopList::getMyDesktop();
    if (!is_object($desktop) || $desktop->isError()) {
        break;
    }
    $cp = new Permissions($desktop);
    if (!$cp->canRead()) {
        break;
    }
    ?>

<div style="display: none">
<div class="btn-group" id="ccm-account-menu">
  <a class="btn btn-default" href="<?php echo $desktop->getCollectionLink()?>"><i class="fa fa-user"></i> <?php echo $ui->getUserDisplayName()?></a>
  <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	<span class="caret"></span>
  </button>
  <ul class="dropdown-menu pull-right" role="menu">
      <li><a href="<?php echo $desktop->getCollectionLink()?>"><?php echo t('My Account')?></a></li>
      <li class="divider"></li>
  <?php
    $categories = array();
    $children = $account->getCollectionChildrenArray(true);
    foreach ($children as $cID) {
        $nc = Page::getByID($cID, 'ACTIVE');
        $ncp = new Permissions($nc);
        if ($ncp->canRead() && (!$nc->getAttribute('exclude_nav'))) {
            $categories[] = $nc;
        }
    }

    foreach ($categories as $cc) {
        ?>
		<li><a href="<?php echo Core::make('helper/navigation')->getLinkToCollection($cc)?>"><?php echo h(t($cc->getCollectionName()))?></a></li><?php

    }
    ?>
	<li class="divider"></li>
	<li><a href="<?php echo URL::to('/')?>"><i class="fa fa-home"></i> <?php echo t("Home")?></a></li>
	<li><a href="<?php echo URL::to('/login', 'logout', Loader::helper('validation/token')->generate('logout'))?>"><i class="fa fa-sign-out"></i> <?php echo t("Sign Out")?></a></li>
 </ul>
</div>
</div>
    </div>

<?php

} while (false);
