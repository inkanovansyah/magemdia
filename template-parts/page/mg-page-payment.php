<?php
// Pastikan semua global WooCommerce tersedia
    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }
    get_header('shop');

    // Kustomisasi pembayaran
    ?>
    <div class="woocommerce">
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <h3>Pilih Metode Pembayaran</h3>
            <div>
                <!-- Daftar metode pembayaran via Xendit -->
                <input type="radio" id="xendit_ovo" name="payment_method" value="xendit_ovo">
                <label for="xendit_ovo">OVO</label><br>
                <input type="radio" id="xendit_dana" name="payment_method" value="xendit_dana">
                <label for="xendit_dana">DANA</label><br>
                <input type="radio" id="xendit_bca" name="payment_method" value="xendit_bca">
                <label for="xendit_bca">BCA Virtual Account</label>
            </div>
            <button type="submit" class="button alt">Bayar Sekarang</button>
            <input type="hidden" name="action" value="custom_xendit_payment_process">
        </form>
    </div>
    <?php
    get_footer('shop');
?>
