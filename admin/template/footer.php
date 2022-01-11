<?php

?>
		<div id="footer" class="col-12 col-md-12 p-3 p-md-5 text-center">

 <p>&copy; <?php echo date('Y'); ?> <a href="http://axcora.com/getaxcoracms" target="_blank" >Get Axcora CMS</a> - by <a href="https://axcora.com" target="_blank">axcora technology</a>
	      
	      		</p> 
		</div>
		<?php 
		if(!isAuthPage()) {
			if (isDebug()){
				global $GS_debug;
				echo '<h2>'.i18n_r('DEBUG_CONSOLE').'</h2><div id="gsdebug">';
				echo '<pre>';
				foreach ($GS_debug as $log){
					if(is_array($log)) print_r($log).'<br/>';
					else print($log.'<br/>');
				}
				echo '</pre>';	
				echo '</div>';
			}
		}
		?>
	</div><!-- end .wrapper -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
	
</body>
</html>