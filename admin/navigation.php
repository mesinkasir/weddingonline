<?php 

# Setup
$load['plugin'] = true;
include('inc/common.php');
login_cookie_check();

# get pages
getPagesXmlValues();
$pagesSorted = subval_sort($pagesArray,'menuOrder');

global $LANG; $LANG_header = preg_replace('/(?:(?<=([a-z]{2}))).*/', '', $LANG);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Share GetSimple</title>

</head>
<body>
<div class="container">
<div class="row">
<div class="col-12 col-md-12 p-3 p-md-5">
	<div class="navigate">
	<?php
		if (count($pagesSorted) != 0) { 
			echo '<h1>'.i18n_r('CURRENT_MENU').'</h1>
			<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">';
			echo '<tr ><th>'.i18n_r('PRIORITY').'</th><th>'.i18n_r('MENU_TEXT').'</th><th>'.i18n_r('PAGE_TITLE').'</th></tr>';
			foreach ($pagesSorted as $page) {
				$sel = '';
				if ($page['menuStatus'] != '') { 
					
					if ($page['menuOrder'] == '') { 
						$page['menuOrder'] = "N/A"; 
					} 
					if ($page['menu'] == '') { 
						$page['menu'] = $page['title']; 
					}
					echo '<tr>
					<td><strong>#'.$page['menuOrder'].'</strong></td>
					<td>'. $page['menu'] .'</td>
					<td>'. $page['title'] .'</td>
					</tr>';
				}
			}
			echo '</table>';
		} else {
			echo '<p>'.i18n_r('NO_MENU_PAGES').'.</p>';	
		}
						
	?>
	<p class="edit"><a href="menu-manager.php" target="_blank" ><?php echo str_replace(array('<em>','</em>'), '', i18n_r('MENU_MANAGER')); ?> &raquo;</a></p>
	</div>
	</div>
	</div>
</body>
</html>