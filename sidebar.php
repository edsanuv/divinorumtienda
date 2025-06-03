<div class="widget">
	<ul class="followers">
		<li>
			<a href="https://www.instagram.com/riviera_charters?r=nametag"><i class="social_icon-instagram s-18 white"></i></a>
			<h4></h4> <span>Fans</span>
		</li>
		<li>
		<a href="https://www.facebook.com/RivieraChartersMx/?ti=as"><i class="social_icon-facebook s-18 white"></i></a>
			<h4></h4> <span>Followers</span>
		</li>
		<li>
			<a href="#"><i class="social_icon-youtube s-18 white"></i></a>
			<h4></h4> <span>Fans</span>
		</li>
		<li><a href="https://www.pinterest.com.mx/PrivateChartersCancun/?eq=private%20charters&etslf=15964"><i class="social_icon-pinterest s-18 white"></i></a> 
			<h4></h4> <span>Rss Feed</span>
		</li>
	</ul>
</div>

<div class="widget search">
	<h3 class="title bottom-1">Search</h3><!-- Title Widget -->
	<form action="<?php echo home_url(); ?>" id="search-form" method="get">
		<input type="text" class="text-search" name ="s" value="Search in blog" onblur="if(this.value == '') { this.value = 'Search in blog'; }" onfocus="if(this.value == 'Search in blog') { this.value = ''; }">
		<input type="submit" value="" class="submit-search">
     </form>
</div>
<div class="widget categories">
	<h3 class="title bottom-1">Charters</h3><!-- Title Widget -->
	<ul class="arrow-list">
		<?php 
			$args = array( 'hide_empty=0' );
			$terms = get_terms( 'charters_group', $args );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$count = count( $terms );
				$i = 0;
				foreach ( $terms as $term ) {
					echo "<li><a href='".get_term_link( $term )."'>".$term->name."</a></li>"; 
				}
			}
		?>	
	</ul><!-- End arrow-list -->
</div>
<div class="widget categories">
	<div id="instagraminsert">
	</div>
</div>
<div class="fb-page" data-href="https://www.facebook.com/RivieraChartersMx" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/RivieraChartersMx" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/RivieraChartersMx">RivieraCharters</a></blockquote></div>
<div id="sidebar-primary" class="sidebar">



    <?php dynamic_sidebar( 'primary' ); ?>
</div>