<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<div class="container py-5">
    <?php while ( have_posts() ) : the_post(); global $product; ?>

    <div class="row">
        <!-- Imagen del producto -->
        <div class="col-md-6 mb-4">
            <?php woocommerce_show_product_images(); ?>
        </div>

        <!-- Información del producto -->
        <div class="col-md-6">
            <h1 class="mb-3"><?php the_title(); ?></h1>

            <div class="mb-3">
                <?php woocommerce_template_single_price(); ?>
            </div>

            <div class="mb-4">
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div>

            <div class="mb-3">
                <?php woocommerce_template_single_meta(); ?>
            </div>
        </div>
    </div>

    <!-- Descripción completa -->
    <div class="row mt-5">
        <div class="col-12">
            <h4>Descripción</h4>
            <div class="product-description">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php endwhile; ?>
</div>

<?php get_footer( 'shop' ); ?>
