<?php 
/**
 * Support
 *
 * @package GetSimple
 * @subpackage Support
 */

# Setup inclusions
$load['plugin'] = true;
include('inc/common.php');
login_cookie_check();

get_template('header', cl($SITENAME).' &raquo; '.i18n_r('SUPPORT') ); 

?>
	
<?php include('template/include-nav.php'); ?>

<div class="container">
	
	<div id="maincontent row">
		<div class="main col-12 col-md-12 p-3 p-md-5">
	
			<h3>About Get Axcora CMS</h3>
			<p class="lead">
			Get Simple CMS by Axcora tehcnology , very simple and no need database mysql and you can call it flat file cms.
			</p>
<p>
Whats is flat file cms ?? flat file cms is modern new technology with blast fast for create website and can be powerfull for your front end website . because no need database like mysql integration make this cms is very fast stable and powerfull !!.
</p>
<p>
How work with axcora cms ?? you just need edit we post page created , or you can edit display website with your own, this is open source code so you can modify codding and themes with your needed, by default we have a schema for develope and build website make easy, so you just need to edit we article post page, because we create a full features website cms just for hel you to build fast website with get axcora cms system.
</p>
<p>
How about SEO ?? Don't wory about your SEO because this schema cms is very powerfull for SEO , just only have a title tag for focusing keyword on target make easy for you just write a content article then post it on your website, and automaticly get axcora cms convert your title post.
</p>
<p>
How about template ?? coming soon we design a modern and fresh simple themes just for you. or you can order we design services for best solutions.
</p>
<p>
If you need to make donation , you can send money using moneygram or western union on we local bank account 
<br/>BANK RAKYAT INDONESIA
ACCOUNT NO : 008601112564504
ACCOUNT NAME : SONI ANDRIAS
IBAN/SWIFT CODE : BRINIDJA
<br/>
BANK CENTRAL ASIA
ACCOUNT NO : 0181884109
ACCOUNT NAME : SUCI CHANIFAH
IBAN/SWIFT CODE : CENAIDJA
<br/>your donation can be help we team to develope many open source project.
<!--Axcora have any open source code project ?? of course we have many open source project like CMS , POS point of sale and e-learn for school too. You can donwload it on we sourceforge or github repo pages.-->
</p>
<p>And thank you for using get axcora cms, and hapy codding !!</p>
		</div>
	</div>
	
</div>
<?php get_template('footer'); ?>
