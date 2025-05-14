<?php

/********************
*
* Javascript & ccs
*
***/

include 'raki-libs/jscss.php';

/********************
*
* Riviera Custom fields
*
***/

include 'raki-libs/CustomField.php';


include 'raki-libs/CursosDivinorum.php';

/*******************************
*
* Add thumbnails to divinorum
*
***/


add_image_size( 'curso', 600, 380, true);


if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );


add_filter( 'show_admin_bar', '__return_false' );

/**
 * Allow HTML in term (category, tag) descriptions
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		add_filter( $filter, 'wp_filter_post_kses' );
	}
}
 
foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt).'...';
  } else {
  $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 50);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	return $excerpt;
}

function wp_acceso_contenido_privado(){
	global $wp_roles;
	$role = get_role('subscriber');
	$role->add_cap('read_private_pages');
	$role->add_cap('read_private_posts');
}

// Llamada a nuestra función.
add_action ( 'admin_init', 'wp_acceso_contenido_privado' );


// [priceriviera ]
function priceriviera_func( $atts ) {
	$a = shortcode_atts( array(
		'colums' => 'four',
		'hours' => '',
		'price' => '',
		'id' => ''
	), $atts );
	$anchor ="<div class='".$a['colums']." columns'><a class='fancybox fancybox.iframe btnexpand' href='".get_permalink((int)$a['id'])."'>".
	$a['hours']."<br>".
	$a['price'].
	"</a></div>";
 
	return $anchor;
}
add_shortcode( 'priceriviera', 'priceriviera_func' );

function videodiv_func( $atts ) {
	$a = shortcode_atts( array(
		'url' => '#',
	), $atts );
	$vid = '<div class="content-element">
				<video width="100%" height="Auto" controls controlslist="nodownload">
					<source src="'.$a['url'].'" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>';
	return $vid;
}

add_shortcode( 'dvideo', 'videodiv_func' );


function secctiondiv_func( $atts,$content ) {
	$a = shortcode_atts( array(
		'titulo' => '#',
	), $atts );
	$seccion = '<div class="content-element">
                        <div class="table-type-1 recent-order responsive-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>'.$a['titulo'].'</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>' .do_shortcode (  $content ) . '
                                </tbody>
                            </table>
                        </div>
                    </div>';
	return $seccion;
}

add_shortcode( 'dseccion', 'secctiondiv_func' );



function descargadiv_func( $atts ) {
	$a = shortcode_atts( array(
		'titulo' => '#',
		'url' =>''
	), $atts );
	$descarga = '<tr>
		<td>'.$a['titulo'].'</td>
		<td><a class="info-btn" href="'.$a['url'].'" >Descargar</a></td>
    </tr>';
	return $descarga;
}

add_shortcode( 'ddescarga', 'descargadiv_func' );





function main_func( $atts,$content ) {
	$main = '<main id="main" class="col-lg-9 col-md-12">'.do_shortcode (  $content ).'</main>';
	return $main;
}

add_shortcode( 'principal', 'main_func' );



function custom_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
	}
	add_filter('mce_buttons_2', 'custom_mce_buttons_2');
	
	function my_mce_before_init_insert_formats( $init_array ) {
	// Definimos nuestros estilos en el array
	$style_formats = array(
	array(
	'title' => 'Enlace', // Nombre del estilo
	'selector' => 'a', // Selector: Aplica el estilo a una etiqueta HTML
	'classes' => 'enlace', //Clase CSS
	),
	array(
	'title' => 'Recuadro', // Nombre del estilo
	'block' => 'div', //Block: Nuevo elemento bloque al que aplicar el estilo
	'classes' => 'recuadro', //Clase CSS
	'wrapper' => true
	),
	array(
	'title' => 'Texto Verde', // Nombre del estilo
	'inline' => 'span', // Inline: Nuevo elemento inline al que aplicar el estilo
	'classes' => 'texto-verde', //Clase CSS
	),
	);
	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


	/********
	 * 
	 * 
	 * 
	 * 
	 */

	function dcms_new_user_email( $wp_new_user_email, $user, $blogname ) {
		$headers = array('From: Divinorum <contacto@divinorum.com.mx>');
		$subject = sprintf( 'Te has registrado en [%s].', $blogname );
	
		$wp_new_user_email['headers'] = $headers;
		$wp_new_user_email['subject'] = $subject;
	
		return $wp_new_user_email;
	}

//Uso del Hook
add_action( 'rest_api_init', function () {
	register_rest_route( '/dv', '/posts', array(
		'methods' => 'GET',
		'callback' => 'listpost',
		) 
	);
	register_rest_route( '/dv', '/post/(?P<post_id>\d+)', array(
		'methods' => 'GET',
		'callback' => 'getpost',
		) 
	);


});
	
//Función Callback
function listpost( ) {
	$args = array(
		'post_type' => 'post',
	);
	$the_query = new WP_Query( $args );
	$response = [];
	// The Loop
	$i=0;
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$response[$i]=(object)array();
			$response[$i]->ID =  get_the_ID();
			$response[$i]->title =  get_the_title();
			$response[$i]->excerpt = get_the_excerpt();
			$response[$i]->image = get_the_post_thumbnail(get_the_ID(),'medium', array('class' => ''));
			// $response[$i]->category =  get_category( get_the_ID() )->name;
			$response[$i]->author = get_the_author_meta( 'nicename', $the_query->post->post_author );
			$response[$i]->date = get_the_date();
			$i++;
		}
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	return $response;
}

function getpost($data){
	$post_id = $data['post_id'];
	$args = array(
		'post_type' => 'post',
		'p' 	=> $post_id
	);
	$the_query = new WP_Query( $args );
	$response = (object)array();;
	// The Loop
	$i=0;
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$response->ID =  get_the_ID();
			$response->title =  get_the_title();
			$response->content = get_the_content();
			$response->image = get_the_post_thumbnail(get_the_ID());
			$response->category =  get_category( get_the_ID() )->name;
			$response->author = get_the_author_meta( 'nicename', $the_query->post->post_author );
			$response->date = get_the_date();
		}
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	return $response;

}

add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
});

add_action( 'wp_footer', 'woocommerce_ajax_add_to_cart_script', 99 );

add_action('wp_footer', function () {
    echo '<pre>';
    print_r(WC()->cart->get_cart());
    echo '</pre>';
});

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );