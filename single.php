<?php get_header();?>
<?php while ( have_posts() ) { the_post(); ?>

	<div class="breadcrumbs-wrap no-title">
      	<div class="container">
		</div>
    </div>
	<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
    <div id="content" class="page-content-wrap">
		<div class="container">
			<div class="row">
				<main id="main" class="col-lg-8 col-md-12">
					<div class="content-element3">
						<div class="entry-box single-entry">
                			<!-- - - - - - - - - - - - - - Entry body - - - - - - - - - - - - - - - - -->
                			<div class="entry-body content-element4">
								<h1 class="entry-title"><a href="#"><?php the_title(); ?></a></h1>
								<div class="entry-meta">
									<time class="entry-date" datetime="2018-11-18"><?php the_date()?></time>
									<span>, publicado por</span>
									<a href="#" class="entry-cat"><?php global $post; $author_id = $post->post_author;echo  get_the_author_meta( 'nicename', $author_id );?></a>
								</div>
							</div>
							<!-- Entry -->
							<div class="entry">
								<div class="label-top"><?php echo  get_category( get_the_ID() )->name ?></div>
								<!-- - - - - - - - - - - - - - Entry attachment - - - - - - - - - - - - - - - - -->
								<div class="thumbnail-attachment">
									<?php echo get_the_post_thumbnail(get_the_ID(),'curso', array('class' => '')); ?>
								</div>
								<div class="entry-body">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</main>
				<aside id="sidebar" class="col-lg-4 col-md-12">
					<?php get_sidebar(); ?>
				</aside>
			</div>		
		</div>
	</div>
<?php } ?>

<?php get_footer();