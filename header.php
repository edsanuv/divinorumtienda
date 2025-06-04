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
            <!-- Botón Hamburguesa para móviles -->
<button id="menu-toggle" class="menu-toggle" aria-controls="menu" aria-expanded="false">
	<span class="hamburger"></span>
</button>

						<!-- Modifica solo el menú -->
<div class="menu-holder">
  <div class="menu-wrap">
    <div class="nav-item">
      <nav id="main-navigation" class="main-navigation">
        <ul id="menu" class="clearfix">
          <li class="current">
            <a href="/">Inicio</a>
          </li>
          <li>
            <a href="http://divinorum.com.mx/about_us">¿Quiénes somos?</a>
            <div class="sub-menu-wrap">
              <ul>
                <li><a href="http://divinorum.com.mx/about_us">Nosotros</a></li>
              </ul>
            </div>
          </li>
                        <!-- <li><a href="events_list.php">Cursos y talleres</a> -->
                       <li><a href="http://divinorum.com.mx/courses">Cursos y talleres</a>
                        </li>
                        <!-- <li><a href="challenges.html">Servicios</a> -->
                        <li><a href="https://divinorum.com.mx/services/single_page/spa">Servicios</a> 
                          <!-- <div class="sub-menu-wrap">
                            <ul>
                              <li><a href="blog_single.html">Spa cannábico</a></li>
                              <li><a href="blog_single.html">Terapia cannábica integral</a></li>
                              <li><a href="blog_single.html">Nebulización con terpenos</a></li>
                            </ul>
                          </div> -->
                        </li>

                        <li><a href="tienda/">Tienda en linea</a>
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
                        <li>
                           <?php if ( function_exists( 'WC' ) ) : ?>
 <div class="cart-header" style="position: relative;">
    <a href="<?php echo wc_get_cart_url(); ?>" title="Ver carrito" class="cart-link">
        <span class="cart-icon">🛒</span>
        <span class="cart-text">CARRITO (<span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)</span>
    </a>
    <div class="mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>
</div>
<?php endif; ?>
                       </li>
                      </ul>
                    </nav>
                    <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->
                    <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->
                  </div>
              
              </div>
					</div>
				</div>
			</header>
			<!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->