<?php
/**
 * Template Name: Página Carrito WooCommerce
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
    </div>
</main>

<?php get_footer(); ?>
