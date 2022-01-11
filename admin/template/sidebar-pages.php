<?php

?>
<div class="container-fluid">
<div class="col-12 col-md-12 p-3 text-center">
<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored bg-danger text-white" href="pages.php" accesskey="<?php echo find_accesskey(i18n_r('SIDE_VIEW_PAGES'));?>" <?php check_menu('pages');  ?>>All Post</a>
<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored bg-danger text-white" href="edit.php" accesskey="<?php echo find_accesskey(i18n_r('SIDE_CREATE_NEW'));?>" <?php if((!isset($_GET['id'])) && (get_filename_id()==='edit'))  { echo 'class="current"'; } ?>>New Post</a>
	<?php if((isset($_GET['id']) && $_GET['id'] != '') && (get_filename_id()==='edit')) { ?>
	<a href="#" class="current mdl-button mdl-js-button mdl-button--raised mdl-button--colored bg-danger text-white"><?php i18n('EDITPAGE_TITLE'); ?></a><?php } ?>
	
<!--<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored bg-danger text-white" href="menu-manager.php" accesskey="<?php echo find_accesskey(i18n_r('MENU_MANAGER'));?>" <?php check_menu('menu-manager');  ?>>Menu</a> -->
	<?php exec_action("pages-sidebar"); ?>
</div>
</div>
<?php if(get_filename_id()==='edit') { ?>
<p id="js_submit_line" ></p>
<p id="pagechangednotify"></p>
<p id="autosavenotify"></p>
<?php } ?>