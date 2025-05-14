<?php get_header(); ?>
<div class="breadcrumbs-wrap">
	<div class="container">
		<h1 class="page-title">
			<?php echo single_term_title(); ?>
		</h1>
	</div>
</div>
<div id="content" class="page-content-wrap">
    <div class="container wide2">
        
        <!-- Isotope -->
		<div class="isotope three-collumn clearfix entry-box" data-isotope-options='{"itemSelector" : ".item","layoutMode" : "masonry","transitionDuration":"0.7s","masonry" : {"columnWidth":".item"}}'>
			
			<!-- Isotope item -->
			<div class="item category_2">
			
				
					<?php while ( have_posts() ) { the_post(); ?>
					<div class="entry">
						<!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
						<div class="thumbnail-attachment">
							<a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail(get_the_ID(),'curso', array('class' => '')); ?></a>
							<div class="entry-label"><?php echo  get_category( get_the_ID() )->name ?></div>
						</div>
							
							<!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
						<div class="entry-body">
					
							<h5 class="entry-title"><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h5>
							<div class="entry-meta">
							
								<time class="entry-date" datetime="2018-11-18"><?php the_date()?></time>
								<span>por</span>
								<a href="" class="entry-cat"><?php global $post; $author_id = $post->post_author;echo  get_the_author_meta( 'nicename', $author_id );?></a>
					
							</div>
							<p><?php ?></p>
			
							<div class="flex-row justify-content-between">
								
								<a href="<?php echo get_permalink() ?>" class="btn btn-small btn-style-4">Read more</a>
			
								<a href="<?php echo get_permalink() ?>" class="entry-icon"><i class="licon-share"></i></a>
			
							</div>
					
						</div>
					
						
					</div>
					<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>
