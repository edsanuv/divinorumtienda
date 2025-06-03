<?php get_header();?>


<?php while ( have_posts() ) { the_post(); ?>

<div class="page-title archive">
	<div class="container clearfix">
		<div class="sixteen columns"> 
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div><!-- End Page title -->
<!--div class="full-image">
	<?php/* echo get_the_post_thumbnail($boats->post->ID,'full', array('class' => '')); */?>
</div-->
<div class="container main-content clearfix">
	<!-- Start Posts -->
	<div class="eleven columns bottom-3">
		
		<!-- ==================== Single Post ==================== -->
		
		<div class="post single style-1">

			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="related-posts bottom-3">
			<h3 class="title bottom-1">Charts</h3><!-- Title Post -->
			<?php displaycharts_func() ?>
      	</div>
      	<div class="comment-form top-4">
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v4.0&appId=1406215839678059&autoLogAppEvents=1"></script>
		</div>
     </div>
	

	<div class="five columns sidebar bottom-3">
		<?php get_sidebar(); ?>
	</div>
</div>


<?php } ?>

<?php get_footer();