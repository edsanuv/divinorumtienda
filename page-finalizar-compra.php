<?php
/**
 * Template Name: Finalizar Compra WooCommerce
 */
get_header(); ?>

<main class="site-main py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-10">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="text-center mb-4 fw-bold text-primary">Finaliza tu compra</h1>
                        
                        <!-- WooCommerce Checkout Shortcode -->
                        <div class="woocommerce-checkout-wrap">
                            <?php echo do_shortcode('[woocommerce_checkout]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
