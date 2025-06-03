<?php
/**
 * The Template for displaying product archives (shop page).
 * Compatible with WooCommerce.
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<div class="container">
    <main class="site-main" role="main">

        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( woocommerce_product_loop() ) : ?>

            <?php do_action( 'woocommerce_before_shop_loop' ); ?>

           <div class="row">
    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>
        <div class="col-md-4 mb-4">
            <?php wc_get_template_part( 'content', 'product' ); ?>
        </div>
    <?php endwhile; ?>
</div>


            <?php do_action( 'woocommerce_after_shop_loop' ); ?>

        <?php else : ?>
            <?php do_action( 'woocommerce_no_products_found' ); ?>
        <?php endif; ?>

    </main>
</div>

<?php
get_footer( 'shop' );
