<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/**
 * Header Admin Template
 *
 * @package GetSimple
 */
 
global $SITENAME, $SITEURL;

$GSSTYLE         = getDef('GSSTYLE') ? GSSTYLE : '';
$GSSTYLE_sbfixed = in_array('sbfixed',explode(',',$GSSTYLE));
$GSSTYLE_wide    = in_array('wide',explode(',',$GSSTYLE));

$bodyclass="class=\"";
if( $GSSTYLE_sbfixed ) $bodyclass .= " sbfixed";
if( $GSSTYLE_wide )    $bodyclass .= " wide";
$bodyclass .="\"";

if(get_filename_id()!='index') exec_action('admin-pre-header');

?>
<!DOCTYPE html>
<html lang="<?php echo get_site_lang(true); ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"  />
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<?php if(!isAuthPage()) { ?><meta name="generator" content="GetSimple - <?php echo GSVERSION; ?>" /> 
<link rel="icon" type="image/x-icon" href="https://axcora.com/img/angular.png" />
	<link rel="author" href="https://axcora.com" />
	<?php } ?>	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<!--	 <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-deep_purple.min.css" /> -->
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<!--	<link rel="stylesheet" type="text/css" href="template/style.php?<?php echo 's='.$GSSTYLE.'&amp;v='.GSVERSION; ?>" media="screen" />-->
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="template/ie6.css?v=<?php echo GSVERSION; ?>" media="screen" /><![endif]-->
    <?php
		if($GSSTYLE_sbfixed) queue_script('scrolltofixed', GSBACK);
		get_scripts_backend();
	?>
	<script type="text/javascript" src="template/js/jquery.getsimple.js?v=<?php echo GSVERSION; ?>"></script>

	<!--[if lt IE 9]><script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js" ></script><![endif]-->
	<?php if( ((get_filename_id()=='upload') || (get_filename_id()=='image')) && (!getDef('GSNOUPLOADIFY',true)) ) { ?>
	<script type="text/javascript" src="template/js/uploadify/jquery.uploadify.js?v=3.0"></script>
	<?php } ?>
	<?php if(get_filename_id()=='image') { ?>
	<script type="text/javascript" src="template/js/jcrop/jquery.Jcrop.min.js"></script>
	<link rel="stylesheet" type="text/css" href="template/js/jcrop/jquery.Jcrop.css" media="screen" />
	<?php } ?>

    <?php 
	# Plugin hook to allow insertion of stuff into the header
	if(!isAuthPage()) exec_action('header'); 
	
	function doVerCheck(){
		return !isAuthPage() && !getDef('GSNOVERCHECK');
	}

    if( doVerCheck() ) { ?>
	<script type="text/javascript">		
		// check to see if core update is needed
		jQuery(document).ready(function() { 
			<?php 
				$data = get_api_details();
				if ($data) {
					$apikey = json_decode($data);
					
					if(isset($apikey->status)) {
						$verstatus = $apikey->status;
			?>
				var verstatus = <?php echo $verstatus; ?>;
				if(verstatus != 1) {
					<?php if(isBeta()){ ?> $('a.support').parent('li').append('<span class="info">i</span>');
					<?php } else { ?> $('a.support').parent('li').append('<span class="warning">!</span>'); <?php } ?>
					$('a.support').attr('href', 'health-check.php');
				}
			<?php  }} ?>
		});
	</script>
	<?php } ?>

	<script type="text/javascript">		
		// init gs namespace and i18n
		var GS = {};
		GS.i18n = new Array();
		GS.i18n['PLUGIN_UPDATED'] = '<?php i18n("PLUGIN_UPDATED"); ?>';
		GS.i18n['ERROR'] = '<?php i18n("ERROR"); ?>';
	</script>

</head>

<body <?php filename_id(); echo ' '.$bodyclass; ?> >	
	<div class="header" id="header" >
		<div class="wrapper clearfix">
 <?php exec_action('header-body'); ?>
