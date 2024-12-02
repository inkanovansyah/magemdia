<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h2><?php esc_html_e( 'Checkout', 'woocommerce' ); ?></h2>

            <?php
            // Cek apakah keranjang kosong
            if ( mg_is_cart_empty() ) {
                echo '<p>' . esc_html__( 'Your cart is currently empty.', 'woocommerce' ) . '</p>';
                return;
            }

            // Tampilkan form checkout WooCommerce
            woocommerce_checkout();
            ?>
        </div>

        <div class="col-md-4">
            <div class="order-summary bg-light p-3 rounded">
                <h4><?php esc_html_e( 'Order Summary', 'woocommerce' ); ?></h4>
                <ul class="list-group">
                    <?php
                    $order_summary = mg_get_order_summary();
                    foreach ( $order_summary['items'] as $item ) :
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo esc_html( $item['name'] ); ?>
                            <span><?php echo $item['price']; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <hr>
                <p class="d-flex justify-content-between">
                    <span><?php esc_html_e( 'Total', 'woocommerce' ); ?>:</span>
                    <strong><?php echo $order_summary['total']; ?></strong>
                </p>
            </div>
        </div>
    </div>
</div>
