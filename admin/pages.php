<?php
/**
 * All Pages
 *
 * Displays all pages 
 *
 * @package GetSimple
 * @subpackage Page-Edit
 */

// Setup inclusions
$load['plugin'] = true;

// Include common.php
include('inc/common.php');

// Variable settings
login_cookie_check();
$id      =  isset($_GET['id']) ? $_GET['id'] : null;
$ptype   = isset($_GET['type']) ? $_GET['type'] : null; 
$path    = GSDATAPAGESPATH;
$counter = '0';
$table   = '';

# clone attempt happening
if ( isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'clone') {
	
	// check for csrf
	if (!defined('GSNOCSRF') || (GSNOCSRF == FALSE) ) {
		$nonce = $_GET['nonce'];
		if(!check_nonce($nonce, "clone", "pages.php")) {
			die("CSRF detected!");	
		}
	}

	# check to not overwrite
	$count = 1;
	$newfile = GSDATAPAGESPATH . $_GET['id'] ."-".$count.".xml";
	if (file_exists($newfile)) {
		while ( file_exists($newfile) ) {
			$count++;
			$newfile = GSDATAPAGESPATH . $_GET['id'] ."-".$count.".xml";
		}
	}
	$newurl = $_GET['id'] .'-'. $count;
	
	# do the copy
	$status = copy($path.$_GET['id'].'.xml', $path.$newurl.'.xml');
	if ($status) {
		$newxml = getXML($path.$newurl.'.xml');
		$newxml->url = $newurl;
		$newxml->title = $newxml->title.' ['.i18n_r('COPY').']';
		$newxml->pubDate = date('r');
		$status = XMLsave($newxml, $path.$newurl.'.xml');
		if ($status) {
			create_pagesxml('true');
			header('Location: pages.php?upd=clone-success&id='.$newurl);
		} else {
			$error = sprintf(i18n_r('CLONE_ERROR'), $_GET['id']);
			header('Location: pages.php?error='.$error);
		}
	} else {
		$error = sprintf(i18n_r('CLONE_ERROR'), $_GET['id']);
		header('Location: pages.php?error='.$error);
	}
}


getPagesXmlValues(true);

$count = 0;
foreach ($pagesArray as $page) {
	if ($page['parent'] != '') { 
		$parentTitle = returnPageField($page['parent'], "title");
		$sort = $parentTitle .' '. $page['title'];		
		$sort = $parentTitle .' '. $page['title'];
	} else {
		$sort = $page['title'];
	}
	$page = array_merge($page, array('sort' => $sort));
	$pagesArray_tmp[$count] = $page;
	$count++;
}
// $pagesArray = $pagesArray_tmp;
$pagesSorted = subval_sort($pagesArray_tmp,'sort');
$table = get_pages_menu('','',0);

get_template('header', cl($SITENAME).' &raquo; '.i18n_r('PAGE_MANAGEMENT')); 

?>

<?php include('template/include-nav.php'); ?>
		
<div class="container-fluid">
		<div class="col-12 col-md-12 p-3 p-md-5" id="maincontent">
	<?php exec_action('pages-main'); ?>
		<div class="main">
			<h5 class="text-center">Article</h5>
			<?php include('template/sidebar-pages.php'); ?>
			<!--<div class="edit-nav clearfix" >
				<a href="#" id="filtertable" accesskey="<?php echo find_accesskey(i18n_r('FILTER'));?>" ><?php i18n('FILTER'); ?></a>
				<a href="#" id="show-characters" accesskey="<?php echo find_accesskey(i18n_r('TOGGLE_STATUS'));?>" ><?php i18n('TOGGLE_STATUS'); ?></a>
			</div>
			<div id="filter-search">
				<form><input type="text" autocomplete="off" class="text" id="q" placeholder="<?php echo strip_tags(lowercase(i18n_r('FILTER'))); ?>..." /> &nbsp; <a href="pages.php" class="cancel"><?php i18n('CANCEL'); ?></a></form>
			</div>
			-->
			<table id="editpages" class="table mdl-data-table mdl-js-data-table mdl-shadow--2dp">
				<tr class="bg-danger"><th class="text-white">Post Page</th><th class="text-white">Publish</th><th></th><th></th></tr>
				<?php echo $table; ?>
			</table>
			<p><em><b>Total Post Page : <span id="pg_counter"><?php echo $count; ?></span></b></em></p>
			
		</div>
	</div><!-- end maincontent -->
	
	
</div>
<?php get_template('footer'); ?>
