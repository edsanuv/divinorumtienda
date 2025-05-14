<?php get_header();?>
<?php $user =  wp_get_current_user();?>
<?php if (is_user_logged_in()) { ?>
	<div class="breadcrumbs-wrap" style="padding: 64px 0;">
		<div class="container">
			<h1 class="page-title">Cursos de <?php echo $user->user_email;?></h1>
			<?php wp_loginout( home_url() );?>
		</div>
	</div>
	<div id="content" class="page-content-wrap">
		<div class="container wide2">
			<div class="isotope three-collumn clearfix entry-box" data-isotope-options='{"itemSelector" : ".item","layoutMode" : "masonry","transitionDuration":"0.7s","masonry" : {"columnWidth":".item"}}'>

				<?php
				$args = array(
					'post_type' => 'curso',
					'post_author' => $user->ID
				);
				
				$the_cursos = new WP_Query($args);
				
				while ($the_cursos->have_posts()) { $the_cursos->the_post();?>
				<!-- Isotope item -->
					<div class="item category_2">
						<div class="entry">
							<!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
							<div class="thumbnail-attachment">
								<?php the_post_thumbnail( 'post-thumbnail');?>
								<div class="entry-label">Curso</div>
							</div>
							<!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
							<div class="entry-body">
								<h5 class="entry-title"><a href="#"><?php the_title(); ?></a></h5>
								<div class="entry-meta">
									<time class="entry-date">Registrado desde: <?php echo wp_date( get_option( 'date_format' ), strtotime($user->user_registered));  ?></time>
								</div>
								<p><?php the_excerpt();?> </p>
								<div class="flex-row justify-content-between">
									<a href="<?php the_permalink(); ?>" class="btn btn-small btn-style-4">Entrar</a>
								</div>
							</div>
						</div>
					</div>
					
				<?php } ?>
			</div>
		</div>
	</div>
<?php }else { ?>
	<div id="content">
		<div class="container">
			<div class="container-form">
				<h4 class="title">Login</h4>
				<?php 
					$args = array(
						'redirect' => "/", 
						'form_id' => 'loginform-custom',
						'label_username' => __( 'Correo' ),
						'label_password' => __( 'Password' ),
						'label_remember' => __( 'Recuerdame' ),
						'label_log_in' => __( 'Log In custom text' ),
						'remember' => false
					);
					wp_login_form( $args); 
				?>
			</div>
		</div>
	</div>
	

<?php }?>
<?php get_footer();?>
<style>
	.item.category_2 {
		float: left;
	}
	.container-form {
		width: 100%;
		max-width: 752px;
		padding: 50px;
		margin: 100px auto;
		border-radius: 10px;
		border: 2px solid #45b29d;
	}
	.container-form input[type=submit] {
		color: #fff;
		background: #e883ae;
		padding: 10px 30px;
		letter-spacing: 0.5px;
		font-size: 16px;
		border: 1px solid #ffe484;
		color: #ffe484;
		border-radius: 0.25rem;
	}
</style>