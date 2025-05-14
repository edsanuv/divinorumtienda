<?php 
add_action( 'init', 'cursosDiv' );
function cursosDiv() {
	register_post_type( 'curso',
		array(
			'labels' => array(
				'name' => __( 'Cursos Divinorum' ),
				'singular_name' => __( 'Cursos Divinorum' )
				),
			'public' => true,
			'has_archive' => true,
			'supports'           => array( 'title','editor', 'author', 'thumbnail','excerpt' )
			)
		);
}

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu Divinorum' ),
    )
  );
}

add_action( 'init', 'register_my_menus' );


// Agregamos los campos adicionales a Tu Perfil y Editar Usuario
function add_custom_fields_to_users( $user ) {
	$cdvar =  get_the_author_meta( 'curso_dv', $user->ID ) ;
	$curso_dv =  maybe_unserialize($cdvar);
	$curso_dv = (is_array($curso_dv))?$curso_dv:[$curso_dv];
	$args = array(
		'post_type' => 'curso'
	);
	$cursos_query = new WP_Query( $args );?>
	<h3>Campos adicionales</h3>
	<table class="form-table">
	  <tr>
		<th><label for="curso_dv">Curso</label></th>
		<td>
		<?php
 
			// The Loop
			if ( $cursos_query->have_posts() ) {
				
				while ( $cursos_query->have_posts() ) {
					
					$cursos_query->the_post();?>
					<label for="curso_dv">
						<input type="checkbox" name="curso_dv[]" value="<?php the_ID()?>" <?php echo ( in_array((string)get_the_ID(), $curso_dv) || (string)get_the_ID() == $curso_dv)? 'checked="checked"':''; ?> /> <?php the_title()?>
					</label>
				<?php }
				
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
		</td>
		</tr>
	  
	</table>
  <?php }
  add_action( 'show_user_profile', 'add_custom_fields_to_users' );
  add_action( 'edit_user_profile', 'add_custom_fields_to_users' );
  
  add_action( 'personal_options_update', 'save_user_fields' );
  add_action( 'edit_user_profile_update', 'save_user_fields' );




// Guardamos los campos adicionales en base de datos
function save_user_fields ($user_id) {

    update_user_meta($user_id, 'curso_dv', maybe_serialize($_POST['curso_dv']));
  
}

function new_modify_user_table( $column ) {
    $column['cursos'] = 'Cursos';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );



function new_modify_user_table_row( $val, $column_name, $user_id ) {
    
	switch ($column_name) {
        case 'cursos' :
			$cdvar =  get_the_author_meta( 'curso_dv', $user_id ) ;
			$curso_dv =  maybe_unserialize($cdvar);
			$ids=[];
			$titles = []; 
			foreach ($curso_dv as $key => $value) {
				array_push($ids,(int)$value);
			}
			if(sizeof($ids)>0){
				$args = array(
					'post_type' => 'curso',
					'post__in' => $ids
				);
				
				$the_cursos = new WP_Query($args);
				foreach ($the_cursos->posts as $p){
					array_push($titles,$p->post_title);
				}
				$cursos = implode(" -- ",$titles);
				return $cursos;
			}else{
				return ;
			}
            break;
        default:
    }
    return $return;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );




//Acceso prohibido a admin de suscriptores
function restrict_access_admin_panel(){
	global $current_user;
	if ($current_user->user_level <  4) {
			wp_redirect( get_bloginfo('url') );
			exit;
	}
}
add_action('admin_init', 'restrict_access_admin_panel', 1);




/*
**** Register meta box(es) ****
*/
function sidebar_custom() {
	add_meta_box( 'mi-meta-box-id', __( 'Sidebar', 'Divinorum' ), 'curso_sidebar_callback', 'curso' );
}
add_action( 'add_meta_boxes', 'sidebar_custom' );


/*
**** Meta box display callback ****
*/
function curso_sidebar_callback( $post ) {
	
	$meta_sidebar = get_post_meta( $post->ID, 'meta_sidebar', true );
	wp_editor( $meta_sidebar, 'sidebar', array(
		'wpautop'       => true,
		'media_buttons' => false,
		'textarea_name' => 'meta_sidebar',
		'textarea_rows' => 10,
		'teeny'         => true
	) );
	// Usaremos este nonce field más adelante cuando guardemos en twp_save_meta_box()
	
}

add_action( 'save_post', 'afterSavePostDv' );
function afterSavePostDv($post_id)
{
    if( isset( $_POST['meta_sidebar'] ) && $_POST['meta_sidebar'] != '' ) {
		update_post_meta( $post_id, 'meta_sidebar', $_POST['meta_sidebar'] );
	} else {
		
		//delete_post_meta( $post_id, 'meta_sidebar' );
	}
}








