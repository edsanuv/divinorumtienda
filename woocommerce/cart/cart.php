<?php
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<section class="woocommerce-cart-section">
    <div class="container">
        <h1 class="cart_totals calculated_shipping"><?php esc_html_e( 'Tu carrito', 'woocommerce' ); ?></h1>

        <?php wc_print_notices(); ?>

        <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>

            <p class="return-to-shop">
    <a class="button continue-shopping" href="<?php echo wc_get_page_permalink( 'shop' ); ?>">
        ← Seguir comprando
    </a>
</p>

            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <?php do_action( 'woocommerce_before_cart_table' ); ?>

                <table class="shop_table shop_table_responsive cart">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail"><?php esc_html_e( 'Producto', 'woocommerce' ); ?></th>
                            <th class="product-name">&nbsp;</th>
                            <th class="product-price"><?php esc_html_e( 'Precio', 'woocommerce' ); ?></th>
                            <th class="product-quantity">
  <?php echo function_exists('esc_html_e') ? esc_html_e( 'Cantidad', 'woocommerce' ) : 'Cantidad'; ?>
</th>
                            <th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = $cart_item['product_id'];

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                <td class="product-remove">
                                    <?php
                                        echo apply_filters(
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">×</a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                esc_html__( 'Eliminar este producto', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() )
                                            ),
                                            $cart_item_key
                                        );
                                    ?>
                                </td>

                                <td class="product-thumbnail">
                                    <?php
                                        $thumbnail = $_product->get_image();
                                        echo $product_permalink ? '<a href="' . esc_url( $product_permalink ) . '">' . $thumbnail . '</a>' : $thumbnail;
                                    ?>
                                </td>

                                <td class="product-name" data-title="<?php esc_attr_e( 'Producto', 'woocommerce' ); ?>">
                                    <?php
                                        echo $product_permalink ? '<a href="' . esc_url( $product_permalink ) . '">' . $_product->get_name() . '</a>' : $_product->get_name();
                                        echo wc_get_formatted_cart_item_data( $cart_item ); // extra data
                                    ?>
                                </td>

                                <td class="product-price" data-title="<?php esc_attr_e( 'Precio', 'woocommerce' ); ?>">
                                    <?php echo wc_price( $_product->get_price() ); ?>
                                </td>

                                <td class="product-quantity" data-title="<?php esc_attr_e( 'Cantidad', 'woocommerce' ); ?>">
                                    <?php
                                        if ( $_product->is_sold_individually() ) {
                                            echo '1';
                                        } else {
                                            woocommerce_quantity_input(
                                                array(
                                                    'input_name'  => "cart[{$cart_item_key}][qty]",
                                                    'input_value' => $cart_item['quantity'],
                                                    'min_value'   => '0',
                                                    'max_value'   => $_product->get_max_purchase_quantity(),
                                                ),
                                                $_product,
                                                false
                                            );  
                                        }
                                    ?>
                                </td>

                                <td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                    <?php echo WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ); ?>
                                </td>
                            </tr>
                        <?php endif; endforeach; ?>

                        <?php do_action( 'woocommerce_cart_contents' ); ?>

                        <tr>
                            <td colspan="6" class="actions">
                                <div class="cart-actions-wrapper">
                                    <input type="submit" class="button update-cart-button" name="update_cart" value="<?php esc_attr_e( 'Actualizar carrito', 'woocommerce' ); ?>" />
                                    <?php do_action( 'woocommerce_cart_actions' ); ?>
                                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                                </div>
                            </td>
                        </tr>

                        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                    </tbody>
                </table>

                <?php do_action( 'woocommerce_after_cart_table' ); ?>
            </form>

            <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
            <div class="cart-collaterals">
                <?php
                    do_action( 'woocommerce_cart_collaterals' );
                ?>
            </div>

        <?php else : ?>
            <p class="woocommerce-empty-cart"><?php esc_html_e( 'Tu carrito está vacío.', 'woocommerce' ); ?></p>
            <p><a class="button" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Volver a la tienda', 'woocommerce' ); ?></a></p>
        <?php endif; ?>
    </div>
</section>

<?php do_action( 'woocommerce_after_cart' ); ?>
