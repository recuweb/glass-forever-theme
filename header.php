<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() . '?_=' . time(); ?>" />
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	
	<?php wp_head(); ?>

	</head>


<body <?php body_class(); ?>>
	
	<!------start-navigation------->

	<a href="#cd-nav" class="cd-nav-trigger">Menu
		
		<span class="cd-nav-icon"></span>
		
		<svg x="0px" y="0px" width="54px" height="54px" viewBox="0 0 54 54">
			
			<circle fill="transparent" stroke="#1590d3" stroke-width="50" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
		
		</svg>
		
	</a>
	
	<div id="cd-nav" class="cd-nav">
		<div class="cd-navigation-wrapper">
			<div class="cd-half-block">

				<nav>
				
				<?php
				wp_nav_menu( array( 
					'theme_location' => 'main-menu', 
					'container_class' => 'cd-primary-nav' ) ); 
				?>				
								
				</nav>
			</div>
			<div class="cd-half-block">

				<ul class="cd-sidebar-nav">

					<?php dynamic_sidebar("Sidebar Widget Area"); ?>

				</ul>
				
			</div> 
		</div> 
	</div>
	
	<!------end-navigation------->

	<main id="container">
	
		<!------start-main------->
		
		<div class="gf-header">
			<div class="bg-header-left hidden-xs hidden-sm"></div>
			<div class="bg-header-right hidden-xs hidden-sm"></div>
			<div class="gf-logo hidden-xs"><a href="<?php echo home_url(); ?>"></a></div>
			<div class="bg-header-center"></div>
		</div>
		
		<div class="gf-body">

			<div class="container-wrapper">
				
				<div class="container">
				
					<div class="gf-left-side hidden-xs"></div>
					<div class="gf-right-side hidden-xs"></div>
					