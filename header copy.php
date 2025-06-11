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
	   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/riviera.ico" />
	 <style>
        /* Estilos personalizados */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        
        .navbar-brand img {
            height: 40px;
        }
        
        .nav-link {
            color: #333;
            font-weight: 500;
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            color: #fff;
            background-color: #45b29d;
        }
        
        .cart-link {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .cart-count {
            margin-left: 5px;
        }
        
        /* Estilos para el menú desplegable en móviles */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                padding: 20px 0;
                background-color: #fff;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
                margin-top: 15px;
                border-radius: 8px;
            }
            
            .nav-item {
                margin: 5px 0;
            }
            
            .nav-link {
                margin: 0;
                padding: 10px 20px;
            }
            
            .navbar-toggler {
                border: none;
                padding: 5px 10px;
            }
            
            .navbar-toggler:focus {
                box-shadow: none;
            }
        }
        
        /* Mini carrito */
        .mini-cart {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            width: 300px;
            background: white;
            border: 1px solid #ddd;
            padding: 15px;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .cart-header:hover .mini-cart {
            display: block;
        }
        
        /* Ajuste para el admin bar de WordPress */
        body.admin-bar .navbar.fixed-top {
            top: 32px;
        }
        
        @media (max-width: 782px) {
            body.admin-bar .navbar.fixed-top {
                top: 46px;
            }
        }
    </style>


	<?php wp_head(); ?>
</head>

<body>

    <!-- Bootstrap JS y Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Opcional: Cerrar el menú al hacer clic en un enlace en móviles
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 992) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                            toggle: false
                        });
                        bsCollapse.hide();
                    }
                });
            });
        });
    </script>

	<!-- <div class="loader"></div> -->
		<!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

		<div id="wrapper" class="wrapper-container">
			<!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->
			<nav id="mobile-advanced" class="mobile-advanced"></nav>
			<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
			<header id="header" class="header sticky-header sticky">
				<!-- searchform -->
				<!-- <div class="searchform-wrap">
					<div class="vc-child h-inherit">
						<form class="search-form">
							<button type="submit" class="search-button"></button>
							<div class="wrapper">
								<input type="text" name="search" placeholder="Start typing...">
							</div>
						</form>
						<button class="close-search-form"></button>
					</div>
				</div> -->
				<!-- top-header -->
				<div class="top-header">
					<div class="flex-row align-items-center justify-content-between">
						<!-- logo -->
						<div class="logo-wrap">
							<a href="index.php" class="logo"><img src="<?php bloginfo('stylesheet_directory');?>/images/logo.png" alt=""></a>
						</div>
						<!-- - - - - - - - - - - - / Mobile Menu - - - - - - - - - - - - - -->
<!-- Botón Hamburguesa para móviles -->
      <button id="menu-toggle" class="menu-toggle" aria-label="Abrir menú">
        <span class="hamburger">
		</span>
      </button>

					<div id="menu-wrap" class="menu-wrap">
        <nav id="main-navigation" class="main-navigation">
          <ul id="menu" class="clearfix">
            <li><a href="/">Inicio</a></li>
            <li><a href="http://divinorum.com.mx/about_us">¿Quiénes somos?</a></li>
            <li><a href="http://divinorum.com.mx/about_us">Nosotros</a></li>
            <li><a href="http://divinorum.com.mx/courses">Cursos y talleres</a></li>
            <li><a href="https://divinorum.com.mx/services/single_page/spa">Servicios</a></li>
            <li><a href="/tienda/">Tienda en línea</a></li>
            <li>
              <?php if ( function_exists( 'WC' ) ) : ?>
              <div class="cart-header">
                <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link">
                  🛒 CARRITO (<span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)
                </a>
                <div class="mini-cart"><?php woocommerce_mini_cart(); ?></div>
              </div>
              <?php endif; ?>
            </li>
          </ul>
        </nav>
      </div>
</div>
				</div>
			</header>
			<!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->

