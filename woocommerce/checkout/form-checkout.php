<?php
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_checkout_form', $checkout );

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <?php if ( $checkout->get_checkout_fields() ) : ?>
        <div id="customer_details">
            <?php do_action( 'woocommerce_checkout_billing' ); ?>
            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
        </div>
    <?php endif; ?>

    <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

    <div id="order_review">
        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
    </div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
