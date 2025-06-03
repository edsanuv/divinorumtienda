<?php get_header();?>
<div class="full-image home">
	<img src="https://rivieracharters.rentals/wp-content/uploads/2020/02/yatch-for-rent-cancun-mayan-riviera-charters-mexico-scaled.jpg" class=" wp-post-image pcdiplay" alt="" >
	<img src="<?php bloginfo('stylesheet_directory');?>/img/cellfront.jpg" class="wp-post-image movilediplay" alt="" >
</div>
<div class="container-overback">
	<?php $npost = 0; if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>
			<?php if($npost%3 == 0){ ?><div class="row"><?php } ?>
				<div class="co-4">
					<div class="card">
						<div class="price">
							<label>from</label>
							<br>
							<p>$<?php echo get_post_meta(get_the_ID(), 'price_from', true); ?> <sub>USD</sub></p>
						</div>
						<div class="image-pack">
							<?php echo get_the_post_thumbnail($boats->post->ID,'yate'); ?>	
						</div>
						<h4><?php the_title()?></h4>
						<h5>Includes:</h5>
						<ul>
							<?php for ($i=1; $i <= 10; $i++) {  ?>
								<?php $txt =  get_post_meta(get_the_ID(), 'include'.$i, true); ?>
								
								<?php if (!empty($txt)){ ?>
									<li>
										<?php echo $txt; ?>
									</li>
								<?php } ?>
							<?php } ?>
						</ul>
						<div class="su-list su-list-style-">
							<p>Choose your yacht:</p>
							<div class="su-table">
							<?php echo get_post_meta(get_the_ID(), 'table', true); ?>
							</div>
						</div>
						<a class="btn btn-moreinfo" href="<?php the_permalink() ?>" >More info</a>
					</div>
				</div>
			<?php if($npost%3 == 2){ ?></div><?php } ?>
		<?php $npost++; endwhile; ?>
		<?php if(($npost-1)%3 != 2){ ?></div><?php } ?>
    <?php endif; ?>
</div>
<?php get_footer();?>