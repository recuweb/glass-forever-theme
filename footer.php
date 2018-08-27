<?php
			
				echo'</div>'; //container
				
			echo'</div>'; //container-wrapper
		
		echo'</div>'; //gf-body
		
		echo'<div class="cd-footer-nav">';
			
			echo'<div class="container">';
			
				echo'<div class="gf-left-footer hidden-xs hidden-sm"></div>';
				echo'<div class="gf-right-footer hidden-xs hidden-sm"></div>';	
			
				wp_nav_menu( array( 
					'theme_location' => 'footer-menu', 
					'container_class' => 'cd-footer-menu' ) ); 
			
			echo'</div>';
			
		echo'</div>';
		
		dynamic_sidebar("Footer Widget Area"); 
		
		//echo'<div class="clear"></div>';
		
	
		
	echo'</main>';
	
	wp_footer();

echo'</body>';
echo'</html>';