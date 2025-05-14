<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/riviera.ico" />
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="wrap" class="boxed">
			<header class="style-4 <?php echo (is_home() || is_page("puerto-aventuras"))? "header-home header-home-fix" : "" ?>" >
				<div class="top-bar">
					<div class="container clearfix ctop">
						<div class="slidedown">
							<div class="eight columns hleft">
								<div class="social orden">
									<a href="https://www.instagram.com/riviera_charters?r=nametag"><i class="social_icon-instagram s-18"></i></a>
									<a href="https://www.facebook.com/RivieraChartersMx/?ti=as"><i class="social_icon-facebook s-18"></i></a>
									<a href="https://www.pinterest.com.mx/Riviera_Charters/"><i class="social_icon-pinterest s-18"></i></a>
								</div>
							</div>
							<div class="eight columns hright">
								<div class="phone-mail">
									<a href="tel:+13235225452"><i class="icon-phone"></i>+1 (323) 522-5452</a>
									<a href="mailto:rivieracharters@gmail.com"><i class="icon-envelope-alt"></i>rivieracharters@gmail.com</a>
									<a href="https://wa.me/c/5219981566101"><i class=fab fa-whatsapp></i>Book Now</a>
								</div><!-- End phone-mail -->
							</div><!-- End social-icons -->
						</div><!-- End slidedown -->
					</div><!-- End Container -->
				</div><!-- End top-bar -->
				<div class="main-header">
					<div class="container clearfix ctop">
						<a href="#" class="down-button"><i class="icon-angle-down"></i></a><!-- this appear on small devices -->
						<div class="one-third column">
							<div class="logo">
								<a href="/">
									<img src="<?php bloginfo('stylesheet_directory');?>/img/riviera-charters-logo.png" alt="Riviera Charters" />
								</a>
							</div>
						</div>
						<div class="two-thirds column mhb">
							<?php 

								$menu_name = 'header-menu';
								$locations = get_nav_menu_locations();
								  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
								  $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
								?>

								<nav  id="menu" class="navigation" role="navigation">
									<a href="#">Show navigation</a>
								<ul id="nav">
								    <?php
								    $count = 0;
								    $submenu = false;
								    foreach( $menuitems as $item ):
								        $link = $item->url;
								        $title = $item->title;
								        // item does not have a parent so menu_item_parent equals 0 (false)
								        if ( !$item->menu_item_parent ):
								        // save this id for later comparison with sub-menu items
								        $parent_id = $item->ID;
								    ?>

								    <li>
								        <a href="<?php echo $link; ?>" class="title">
								            <?php echo $title; ?>
								        </a>
								    <?php endif; ?>

								        <?php if ( $parent_id == $item->menu_item_parent ): ?>

								            <?php if ( !$submenu ): $submenu = true; ?>
								            <ul>
								            <?php endif; ?>

								                <li>
								                    <a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a>
								                </li>

								            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
								            </ul>
								            <?php $submenu = false; endif; ?>

								        <?php endif; ?>
										<?php 
											
										?>		
								    <?php if((isset($menuitems[ $count + 1 ]->menu_item_parent) && !empty($menuitems[ $count + 1 ]->menu_item_parent)  )): if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
								    </li>                           
								    <?php $submenu = false; endif;endif; ?>

								<?php $count++; endforeach; ?>

								</ul>
								</nav>
						</div><!-- End Menu -->
					</div><!-- End Container -->
				</div><!-- End main-header -->
			</header><!-- <<< End Header >>> -->