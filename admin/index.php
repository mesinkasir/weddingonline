<?php
/**
 * Login
 *
 * Allows access to the GetSimple control panel
 *
 * @package GetSimple
 * @subpackage Login
 */

# Setup inclusions
$load['login'] = true;
$load['plugin'] = true;

// wrap all include and header output in output buffering to prevent sending before headers.
ob_start();
	include('inc/common.php');
	get_template('header', cl($SITENAME).' &raquo; '.i18n_r('LOGIN')); 
ob_end_flush();

?>
</div>
</div>
<div class="wrapper">
<?php include('template/error_checking.php'); ?>
<div class="container-fluid">
	<div id="maincontent" class="row">
		<div class="main col-12 col-md-4 p-3 p-md-5" ></div>
		<div class="main col-12 col-md-4 p-3 p-md-5 text-center" >
		<div class="p-3 p-md-5 shadow rounded">
		<img class="img-fluid" width="120" src="https://axcora.com/img/angular.png"/>
			<h3>Get <strong class="text-danger">Axcora</strong> CMS</h3>
			<?php exec_action('index-login'); ?>
			<form class="login" action="<?php echo myself(false).'?'. htmlentities($_SERVER['QUERY_STRING'], ENT_QUOTES); ?>" method="post">
				 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input type="text" class="text mdl-textfield__input" id="userid" name="userid">
				 <label class="mdl-textfield__label" for="userid">Username</label>
				</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input type="password" class="text mdl-textfield__input" id="pwd" name="pwd">
				 <label class="mdl-textfield__label" for="pwd">Password</label>
				</div>
				<p><input type="submit" name="submitted" class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored bg-danger text-white btn-block" value="<?php i18n('LOGIN'); ?>" /></p>
			</form>
			<p class="cta" ><a href="<?php echo $SITEURL; ?>"><?php i18n('BACK_TO_WEBSITE'); ?></a><br/><a href="resetpassword.php"><?php i18n('FORGOT_PWD'); ?></a></p>
			<div class="reqs" ><?php exec_action('login-reqs'); ?></div>
		</div>
		</div>
	</div>
</div>
<?php get_template('footer'); ?>