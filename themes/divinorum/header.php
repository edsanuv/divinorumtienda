<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CPrata" rel="stylesheet">

	<title>Divinorum</title>

	<meta charset="utf-8">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


 	<link rel="stylesheet" href="font/demo-files/demo.css">
	<link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.css">
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/riviera.ico" />
	<?php wp_head(); ?>
</head>

<body>

	<!-- <div class="loader"></div> -->
		<!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

		<div id="wrapper" class="wrapper-container">
			<!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->
			<nav id="mobile-advanced" class="mobile-advanced"></nav>
			<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
			<header id="header" class="header sticky-header sticky">
				<!-- searchform -->
				<div class="searchform-wrap">
					<div class="vc-child h-inherit">
						<form class="search-form">
							<button type="submit" class="search-button"></button>
							<div class="wrapper">
								<input type="text" name="search" placeholder="Start typing...">
							</div>
						</form>
						<button class="close-search-form"></button>
					</div>
				</div>
				<!-- top-header -->
				<div class="top-header">
					<div class="flex-row align-items-center justify-content-between">
						<!-- logo -->
						<div class="logo-wrap">
							<a href="index.php" class="logo"><img src="<?php bloginfo('stylesheet_directory');?>/images/logo.png" alt=""></a>
						</div>
						<!-- - - - - - - - - - - - / Mobile Menu - - - - - - - - - - - - - -->
						 <!--main menu-->
              <div class="menu-holder">
                <div class="menu-wrap">
                  <div class="nav-item">
                    <!-- - - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - - - -->
                    <nav id="main-navigation" class="main-navigation">
                      <ul id="menu" class="clearfix">
                        <?php
    if ( WC()->cart->get_cart_contents_count() > 0 ) {
        echo '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    }
?>
                        <li class="current">
                          <a href="/">Inicio</a>
                        </li>
                        <li>
                          <a  href="http://divinorum.com.mx/about_us">¿Quiénes somos?</a>
                            <!--sub menu-->
                            <div class="sub-menu-wrap">
                            <ul>
                            <li><a href="http://divinorum.com.mx/about_us">Nosotros</a></li>
                              <!-- <li><a href="about_us.php">Nosotros</a></li> -->
                              <!-- <li><a href="team.php">¿Con quién nos capacitamos?</a></li>
                              <li><a href="team.php">¿Con quién colaboramos?</a></li> -->
                            </ul>
                          </div>
                        </li>
                        <!-- <li><a href="events_list.php">Cursos y talleres</a> -->
                       <li><a href="http://divinorum.com.mx/courses">Cursos y talleres</a>
                        </li>
                        <!-- <li><a href="challenges.html">Servicios</a> -->
                        <li><a href="https://divinorum.com.mx/services/single_page/spa">Servicios</a> 
                          <div class="sub-menu-wrap">
                            <!-- <ul>
                              <li><a href="blog_single.html">Spa cannábico</a></li>
                              <li><a href="blog_single.html">Terapia cannábica integral</a></li>
                              <li><a href="blog_single.html">Nebulización con terpenos</a></li>
                            </ul> -->
                          </div>
                        </li>

                        <li><a href="https://divinorumboutiqueherbal.alegratienda.com/">Tienda en linea</a>
                          <!--sub menu-->
                          <!-- <div class="sub-menu-wrap">
                            <ul>
                              <li><a href="shop_category.html">Category Page</a></li>
                              <li><a href="shop_single.html">Single Product Page</a></li>
                              <li><a href="shop_cart.html">Cart</a></li>
                              <li><a href="shop_checkout.html">Checkout</a></li>
                              <li><a href="shop_account.html">My Account</a></li>
                            </ul>
                          </div> -->
                        </li>
                      </ul>
                    </nav>
                    <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->
                    <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->
                  </div>
                <!-- search button -->
                <div class="search-holder"><button type="button" class="search-button"></button></div>
                <!-- account button -->
                <button type="button" class="account popup-btn-login"></button>
                <!-- shop button -->
                <!-- <div class="shop-cart">
                  <button class="sc-cart-btn dropdown-invoker"><span class="licon-cart"></span></button>
                  <div class="shopping-cart dropdown-window">
                    <div class="products-holder">
                      <div class="product">
                        <button class="item-close"></button>
                        <a href="#" class="product-image">
                          <img src="images/78x78_img1.jpg" alt="">
                        </a>
                        <div class="product-description">
                          <h6 class="product-title"><a href="#">Non Slip Yoga Mat</a></h6>
                          <span class="product-price">1x$19.95</span>
                        </div>
                      </div>
                      <div class="product">
                        <button class="item-close"></button>
                        <a href="#" class="product-image">
                        
                          <img src="images/78x78_img2.jpg" alt="">
                        </a>
                        <div class="product-description">
                          <h6 class="product-title"><a href="#">Light Hard Foam Yoga Blocks</a></h6>
                          <span class="product-price">1x$11.35</span>
                        </div>
                      </div>
                    </div>
                    <div class="sc-footer">
                      <div class="subtotal">Subtotal: <span class="total-price">$35.68</span></div>
                      <div class="vr-btns-set">
                        <a href="#" class="btn btn-small">View Cart</a>
                        <a href="#" class="btn btn-small btn-style-3">Checkout</a>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#" class="btn btn-big btn-style-3">Book Now</a> -->
              </div>
					</div>
				</div>
			</header>
			<!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->