<?php
/**
 * Navigation Include Template
 *
 * @package GetSimple
 */
 
$debugInfoUrl = 'http://get-simple.info/docs/debugging';

if (cookie_check()) { 
	echo '<nav id="pill" class="navbar bg-light text-white"><a href="logout.php" accesskey="'. find_accesskey(i18n_r('TAB_LOGOUT')).'" >'.i18n_r('TAB_LOGOUT').'</a>';
	if (isDebug()) {
		echo '<a href="'.$debugInfoUrl.'" target="_blank">'.i18n_r('DEBUG_MODE').'</a>';
	}
	echo '<a href="settings.php#profile">'.i18n_r('WELCOME').' <strong>'.$USR.'</strong>!</a></nav>';
} 

//determine page type if plugin is being shown
if (get_filename_id() == 'load') {
	$plugin_class = $plugin_info[$plugin_id]['page_type'];
} else {
	$plugin_class = '';
}

?>
<div class="container-fluid bg-white text-center shadow rounded">
	<img class="img-fluid" src="https://axcora.com/img/axcora%20design%20pembuatan%20website%20blogspot%20template.gif"/>
<!--<h3 id="sitename"><a href="<?php echo $SITEURL; ?>" target="_blank" ><?php echo cl($SITENAME); ?></a></h3>-->
<ul class="nav navbar bg-danger rounded<?php echo $plugin_class; ?>">
	<li id="nav_pages" ><a class="pages text-white" href="pages.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_PAGES'));?>" >Page</a></li>
	<li id="nav_upload" ><a class="files text-white" href="upload.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_FILES'));?>" >File</a></li>
	<!--<li id="nav_theme" ><a class="theme" href="theme.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_THEME'));?>" ><?php i18n('TAB_THEME');?></a></li>
	<li id="nav_backups" ><a class="backups" href="backups.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_BACKUPS'));?>" ><?php i18n('TAB_BACKUPS');?></a></li>
	<li id="nav_plugins" ><a class="plugins" href="plugins.php" accesskey="<?php echo find_accesskey(i18n_r('PLUGINS_NAV'));?>" ><?php i18n('PLUGINS_NAV');?></a></li>
	-->
	<?php exec_action('nav-tab');	?>
	
	<li class="rightnav" ><a class="settings first text-white" href="settings.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_SETTINGS'));?>" ><?php i18n('TAB_SETTINGS');?></a></li>
	<li class="rightnav" ><a class="support last text-white" href="support.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_SUPPORT'));?>" >About</a></li>
	<li class="rightnav" ><a class="support last text-white" href="https://axcora.com/getaxcoracms/index.php?id=free-template-website-download" >Themes</a></li>
</ul>

</div>
</div>
	</div>
<div class="wrapper">

	<?php include('template/error_checking.php'); ?>
