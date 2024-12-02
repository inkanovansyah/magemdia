<div class="tp-offcanvas-area">
                <div class="tpoffcanvas">
                    <div class="tpoffcanvas__close-btn">
                        <button class="close-btn"><i class="icofont-close"></i></button>
                    </div>
                    <div class="tpoffcanvas__logo offcanvas-logo">
                        <a href="index.html">
                        <img src="<?php echo get_template_directory_uri() .'/assets/media/logo.svg'?>" alt="Logo">
                        </a>
                    </div>
                    <div class="tpoffcanvas__text offcanvas-content">
                        <div class="main-canvas-inner">
                            <div class="canvas-bar-post-list">
                               <!-- Isi keranjang akan dimuat di sini -->
                                <?php echo do_shortcode('[woocommerce_cart]'); ?>

                            </div>
                            <div class="panel-nav-social">
                                <a href="#"><i class="icofont-facebook"></i></a>
                                <a href="#"><i class="icofont-twitter"></i></a>
                                <a href="#"><i class="icofont-instagram"></i></a>
                                <a href="#"><i class="icofont-linkedin"></i></a>
                                <a href="#"><i class="icofont-youtube"></i></a>
                            </div>
                        </div>
                        <div class="mobile-canvas-content">
                            <div class="canvas-nav-menu-wrapper">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="body-overlay"></div>
            <!-- tp-offcanvus-area-end -->
            <div class="post-single-area mt-60">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-lg-2 single-blog-content">
                            
                            <div class="mb-4">
                                <h5>Categori</h5>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Powder Stick
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Sachet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Packs
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Merchandise
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Bundle
                                </label>
                            </div>

                        </div> -->
                        <div class="col-lg-12 single-blog-content">
                            <div class="mb-4">
                                <a href="<?php echo wc_get_cart_url().'/order'?>" class="tp-header__bars" style="color: white;">
                                    Keranjang
                                    (<?php echo WC()->cart->get_cart_contents_count(); ?>)
                                    <span class="fas fa-shopping-cart"></span> 
                                </a>
                            </div>
                            <div class="row">
                            <?php
                                $products = wc_get_products(array(
                                    'limit' => 9, // Ambil 9 produk
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => 'asset-digital'
                                        )
                                    )
                                ));
                                foreach ($products as $product) {
                                    ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="card border-0 rounded-3 shadow-sm h-100" style="width: 18rem;">
                                            <?php echo $product->get_image('woocommerce_thumbnail', array('class' => 'card-img-top rounded-top-3')); ?>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-10">
                                                        <h5 class="card-title text-dark"><?php echo $product->get_name(); ?></h5>
                                                        <p class="card-text text-muted mb-1">
                                                            <?php
                                                            $rating_count = $product->get_rating_count();
                                                            if ($rating_count > 0) {
                                                                $average_rating = $product->get_average_rating();
                                                                for ($i = 0; $i < floor($average_rating); $i++) {
                                                                    echo '<i class="bi bi-star-fill text-warning"></i>';
                                                                }
                                                                if ($average_rating - floor($average_rating) >= 0.5) {
                                                                    echo '<i class="bi bi-star-half text-warning"></i>';
                                                                }
                                                            } else {
                                                                echo '<i class="bi bi-star text-muted"></i> Not rated yet';
                                                            }
                                                            echo ' (' . $rating_count . ')';
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-2 text-end">
                                                        <i class="bi bi-bookmark-plus fs-4 text-dark"></i>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <?php
                                                        if ($product->is_on_sale()) {
                                                            $regular_price = $product->get_regular_price();
                                                            $sale_price = $product->get_sale_price();
                                                            echo '<h5 class="text-danger"><del>' . wc_price($regular_price) . '</del></h5>';
                                                            echo '<h5 class="text-success">' . wc_price($sale_price) . '</h5>';
                                                        } else {
                                                            echo '<h5 class="text-dark">' . $product->get_price_html() . '</h5>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="btn btn-custom px-4">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
          
