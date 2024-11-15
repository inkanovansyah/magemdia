<div class="container">
    <div class="mt-4">
        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <?php
            do_action( 'woocommerce_before_cart_table' );
            ?>

            <div class="table-responsive">
                <table class="woocommerce-cart-form__contents table">
                    <thead class="thead-light bg-white"> <!-- Tambahkan kelas bg-white untuk membuat latar belakang header menjadi putih -->
                        <tr>
                            <th><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                            <th><?php esc_html_e( 'Name', 'woocommerce' ); ?></th>
                            <th><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                            <th><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                            <th><?php esc_html_e( 'Action', 'woocommerce' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
                                ?>
                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                    <td class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( ! $_product->is_visible() ) {
                                            echo wp_kses_post( $thumbnail );
                                        } else {
                                            printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), wp_kses_post( $thumbnail ) );
                                        }
                                        ?>
                                    </td>
                                    <td class="product-name text-white" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>"> <!-- Tambahkan kelas text-white untuk membuat teks menjadi putih -->
                                        <?php
                                        if ( ! $_product->is_visible() ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }
                                        ?>
                                    </td>
                                    <td class="product-price text-white" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>"> <!-- Tambahkan kelas text-white untuk membuat teks menjadi putih -->
                                        <?php
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ) );
                                        ?>
                                    </td>
                                    <td class="product-quantity text-white" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"> <!-- Tambahkan kelas text-white untuk membuat teks menjadi putih -->
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_quantity', sprintf(
                                            '<input type="number" class="form-control qty" step="%s" min="%s" max="%s" name="cart[%s][qty]" value="%s" title="%s" size="4" pattern="%s" inputmode="%s" />',
                                            esc_attr( apply_filters( 'woocommerce_quantity_input_step', '1', $_product ) ),
                                            esc_attr( apply_filters( 'woocommerce_quantity_input_min', '0', $_product ) ),
                                            esc_attr( apply_filters( 'woocommerce_quantity_input_max', '', $_product ) ),
                                            esc_attr( $cart_item_key ),
                                            esc_attr( $cart_item['quantity'] ),
                                            esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ),
                                            esc_attr( apply_filters( 'woocommerce_quantity_input_pattern', '([0-9]+)', $_product ) ),
                                            esc_attr( apply_filters( 'woocommerce_quantity_input_inputmode', 'numeric', $_product ) )
                                        ), $cart_item, $cart_item_key );
                                        ?>
                                    </td>
                                    <td class="product-remove text-white" data-title="<?php esc_attr_e( 'Action', 'woocommerce' ); ?>"> <!-- Tambahkan kelas text-white untuk membuat teks menjadi putih -->
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                            '<a href="%s" class="remove icofont-close" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                            esc_attr( $cart_item['product_id'] ),
                                            esc_attr( $_product->get_sku() )
                                        ), $cart_item_key );
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="cart-total float-right"> <!-- Tambahkan kelas float-right untuk memindahkan elemen ke kanan -->
                <?php
                // Mendapatkan total belanja termasuk biaya pengiriman
                $totals = WC()->cart->get_totals();
                $total = isset( $totals['total'] ) ? $totals['total'] : '';
                $shipping_total = isset($totals['shipping_total']) ? $totals['shipping_total'] : '';
                ?>
                <h4>Total Belanja: <?php echo $total; ?></h4>
                <p>Biaya Pengiriman: <?php echo $shipping_total; ?></p>
            </div>

            <?php
                do_action( 'woocommerce_cart_contents' );
            ?>

            <div class="cart-actions float-right"> <!-- Tambahkan kelas float-right untuk memindahkan elemen ke kanan -->
                <?php do_action( 'woocommerce_cart_actions' ); ?>

                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                <button type="submit" class="btn btn-primary update-cart" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                <?php do_action( 'woocommerce_cart_actions' ); ?>
                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

                <button type="submit" class="btn btn-success proceed-checkout" name="proceed" value="<?php esc_attr_e( 'Proceed to checkout', 'woocommerce' ); ?>"><?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?></button>
            </div>
            
            <?php do_action( 'woocommerce_after_cart_table' ); ?>
        </form>
    </div>
</div>

