<?php

	add_action( 'after_setup_theme', function (){
		
		load_theme_textdomain( 'glass-forever', get_template_directory() . '/languages' );
		
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		
		global $content_width;
		
		if ( ! isset( $content_width ) ) $content_width = 640;
			
			register_nav_menus( array( 
				
				'main-menu' => __( 'Main Menu', 'glass-forever' ),
				'footer-menu' => __( 'Footer Menu', 'glass-forever' )
			));
	});

	add_action( 'wp_enqueue_scripts', function(){
		
		//enqueue styles
		
		wp_register_style( 'gf-navigation-reset', esc_url( get_template_directory_uri() ) . '/assets/css/navigation-reset.css', array(), '1.0.0' );
		wp_enqueue_style( 'gf-navigation-reset' );
		
		wp_register_style( 'gf-navigation-style', esc_url( get_template_directory_uri() ) . '/assets/css/navigation-style.css', array(), '1.0.0' );
		wp_enqueue_style( 'gf-navigation-style' );

		wp_register_style( 'gf-font', esc_url( 'https://fonts.googleapis.com/css?family=Open+Sans:400,800,700|Merriweather:400,700' ), array(), '' );
		wp_enqueue_style( 'gf-font' );			
		
		//enqueue scripts
		
		wp_enqueue_script( 'jquery' );
		
		wp_register_script( 'gf-modernizr', esc_url( get_template_directory_uri() ) . '/assets/js/modernizr.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'gf-modernizr' );

		wp_register_script( 'gf-navigation-main', esc_url( get_template_directory_uri() ) . '/assets/js/navigation-main.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'gf-navigation-main' );		
		
	});

	add_action( 'login_enqueue_scripts', function () {
		
		wp_register_style( 'gf-login-style', esc_url( get_stylesheet_directory_uri()) . '/assets/css/login.css', array(), time() );
		wp_enqueue_style( 'gf-login-style' );
	});
	
	add_filter( 'login_headerurl', function ($url){
		
		return home_url();
	});
	
	add_action( 'comment_form_before',	function(){
		
		if ( get_option( 'thread_comments' ) ) { 
		
			wp_enqueue_script( 'comment-reply' );
		
		}
	});
	
	add_filter( 'the_title', function( $title ){
		
		if ( $title == '' ){
			
			return '&rarr;';
		} 
		else{
			
			return $title;
		}
	});
	
	add_filter( 'wp_title',	function ( $title ){
		
		return $title . esc_attr( get_bloginfo( 'name' ) );
	});
	
	add_action( 'widgets_init', function (){
		
		register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'glass-forever' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
		
		register_sidebar( array (
		'name' => __( 'Footer Widget Area', 'glass-forever' ),
		'id' => 'footer-widget-area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		) );		
	});
	
	function glass_forever_custom_pings( $comment ){
		
		$GLOBALS['comment'] = $comment;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
		<?php 
	}

	add_filter( 'get_comments_number',	function( $count ){
		
		if ( !is_admin() ) {
			
			global $id;
			
			$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
			
			return count( $comments_by_type['comment'] );
		} 
		else {
			
			return $count;	
		}
	});
