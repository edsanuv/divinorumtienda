<?php 

function theme_riviera_style() {
    wp_register_style( 'bootstrap-grid', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", false, '1.0.0' );
    wp_register_style( 'fontello', get_bloginfo('stylesheet_directory')."/css/fontello.css", false, '1.0.0' );
    wp_register_style( 'style', get_bloginfo('stylesheet_directory')."/css/style.css", false, '1.0.0' );
    wp_register_style( 'responsive', get_bloginfo('stylesheet_directory')."/css/responsive.css", false, '1.0.0' );

    wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1' );
    wp_register_style( 'styles', get_bloginfo('stylesheet_url'), false, '1.0.8' );
    
    wp_enqueue_style('bootstrap-grid');
    wp_enqueue_style('fontello');
    wp_enqueue_style('style');
    wp_enqueue_style('responsive');
    
    wp_enqueue_style( 'jquery-ui' );
	wp_enqueue_style( 'styles' );

    
}

function theme_riviera_script() {

    wp_register_script('jquery-ui',"https://code.jquery.com/ui/1.12.1/jquery-ui.js", false, '1.12.1');
    
    

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('jquery-ui');
    

	$pack = array(
		'url' => get_bloginfo('url'),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'templateurl' => get_bloginfo('stylesheet_directory')
	);
	wp_localize_script( 'custom', 'pack', $pack );
}

add_action( 'wp_enqueue_scripts', 'theme_riviera_style' );
add_action( 'wp_enqueue_scripts', 'theme_riviera_script' );


