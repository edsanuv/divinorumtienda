<?php 


add_action( 'init', 'tourchart_section' );

function tourchart_section() {
	register_post_type( 'tourchart',
		array(
			'labels' => array(
				'name' => __( 'Tourcharts' ),
				'singular_name' => __( 'Tourcharts' )
				),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title','thumbnail','editor','page-attributes','excerpt'),
			)
		);
}


add_action('add_meta_boxes', 'tourchart');

function tourchart() {
    add_meta_box( 'contourcharts', __('Options tourchart'), 'tourchart_meta_box', 'tourchart', 'normal', 'high', array( 'arg' => 'value') );
}

function tourchart_meta_box( $post, $args = array() ) {
	$arg = (object)array(
			(object)array(
				'title'		=> 'Datos',
				'col' 		=> 1,
				'fields' 	=> (object)array(
					(object)array(
						'key'	=>	'currency',
						'text'	=>	'Currency',
						'type'	=>	'select',
						'opt'	=> (object)array(
								(object)array(
									'value'	=>	'usd',
									'text'	=>	'USD',
								),
								(object)array(
									'value'	=>	'mxd',
									'text'	=>	'MXD',
								)
							)
					),
					(object)array(
						'key'	=>	'price_adults',
						'text'	=>	'Price Adults',
						'type'	=>	'text'
					),
					(object)array(
						'key'	=>	'price_child',
						'text'	=>	'Price Child',
						'type'	=>	'text'
					),
					(object)array(
						'key'	=>	'duration',
						'text'	=>	'Duration',
						'type'	=>	'text'
					),
					(object)array(
						'key'	=>	'available',
						'text'	=>	'Available',
						'type'	=>	'text'
					),
				),
			),
		);
	$_id=(int)$post->ID;
	if(is_int($_id) && $_id!=0)
		$field = new CustomFieldGrups($arg,$_id);
	else
		$field = new CustomFieldGrups($arg);
	$field->render();
}

function update_tourchart_meta_box( $post_ID ) {
	$arg = (object)array(
			(object)array(
				'title'		=> 'Datos',
				'col' 		=> 1,
				'fields' 	=> (object)array(
					(object)array(
						'key'	=>	'currency',
						'text'	=>	'Currency',
						'type'	=>	'select',
						'opt'	=> (object)array(
								(object)array(
									'value'	=>	'usd',
									'text'	=>	'USD',
								),
								(object)array(
									'value'	=>	'mxn',
									'text'	=>	'MXN',
								)
							)
					),
					(object)array(
						'key'	=>	'price_adults',
						'text'	=>	'Price Adults',
						'type'	=>	'text'
					),
					(object)array(
						'key'	=>	'price_child',
						'text'	=>	'Price Child',
						'type'	=>	'text'
					),
					(object)array(
						'key'	=>	'duration',
						'text'	=>	'Duration',
						'type'	=>	'text'
					),
					(object)array(
						'key'	=>	'available',
						'text'	=>	'Available',
						'type'	=>	'text'
					),
				),
			),
		);
	$_id=(int)$post_ID;
	if(is_int($_id) && $_id!=0)
		$field = new CustomFieldGrups($arg,$_id);
	else
		$field = new CustomFieldGrups($arg);

	$field->update();
}

add_action('post_updated','update_tourchart_meta_box');

add_action( 'init', 'create_category_tax' );

function create_category_tax() {
	register_taxonomy(
		'categorytourchart',
		'tourchart',
		array(
			'label' => __( 'Category Tourchart' ),
			'rewrite' => array( 'slug' => 'yacht_rentals' ),
			'hierarchical' => true,
		)
	);
}


add_action( 'init', 'create_tag_tax' );

function create_tag_tax() {
	register_taxonomy(
		'tagtourchart',
		'tourchart',
		array(
			'label' => __( 'Tag Tourchart' ),
			'rewrite' => array( 'slug' => 'tag_tourchart' ),
			'hierarchical' => true,
		)
	);
}

function categorias_add_new_meta_fields(){
	?>
	<div>
		<label for="term_meta[imagen]">
			<input type="text" name="term_meta[imagen]" size="36" id="upload_image" value=""><br>
			<input id="upload_image_button" type="button" class='button button-primary' value="Subir Imagen" />
			<br/><i>Introduce una URL o establece una imagen para este campo.</i>
		</label>
	</div>
	<?php
}

add_action( 'categorytourchart_add_form_fields', 'categorias_add_new_meta_fields', 10, 2 );



function categorias_edit_meta_fields($term){
	$t_id = $term->term_id;
 
	$term_meta = get_option("taxonomy_$t_id");
	?>
		<tr valign="top" class='form-field'>
			<th scope="row">Subir imagen</th>
			<td>
				<label for="upload_image">
				    <input id="upload_image" type="text" size="36" name="term_meta[imagen]" value="<?php if( esc_attr( $term_meta['imagen'] ) != "") echo esc_attr( $term_meta['imagen'] ) ; ?>" />
				    <p><input id="upload_image_button" type="button" class='button button-primary' style='width: 100px' value="Subir Imagen" />
				    <i>Introduce una URL o establece una imagen para este campo.</i></p>
				</label>
				<p><?php if( esc_attr( $term_meta['imagen'] ) != "" ) echo "<table><tr><td><i><strong>Imagen actual</strong></i>:</td><td> <img src='".esc_attr( $term_meta['imagen'] )."'></td></tr></table>"; ?></p>
			</td>
		</tr>
	<?php
}

add_action( 'categorytourchart_edit_form_fields', 'categorias_edit_meta_fields', 10, 2 );




function categorias_save_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_categorytourchart', 'categorias_save_custom_meta', 10, 2 );  
add_action( 'create_categorytourchart', 'categorias_save_custom_meta', 10, 2 );


add_action('admin_enqueue_scripts', 'admin_scripts');
 
function admin_scripts() {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'categorytourchart') {
        wp_enqueue_media();
        wp_register_script('taxonomyimg-js','/wp-content/themes/tourchart/libs-raki/js/taxonomyimg.js', array('jquery')); 
        wp_enqueue_script('taxonomyimg-js');
    }
}




add_filter('pll_get_post_types', 'mi_pll_con_custom_post_types');
function mi_pll_con_custom_post_types($types) {
    return array_merge($types, array('tourchart' => 'tourchart'));
}