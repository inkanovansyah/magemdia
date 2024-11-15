 <!-- tp-offcanvus-area-start -->
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
                                <?php
                                    // WP_Query arguments
                                    $args = array(
                                        'post_type'              => 'post', // or 'any' if you want to include pages as well
                                        'post_status'            => 'publish',
                                        'posts_per_page'         => 4, // Number of posts to show
                                        'ignore_sticky_posts'    => 1,
                                    );

                                    // The Query                                            
                                    $query = new WP_Query($args);

                                    // The Loop
                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                            
                                            // Assuming you have set a featured image for each post
                                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                            // If you have a custom field for the content title, replace 'your_custom_field_key' with the actual key
                                            $content_title = get_post_meta(get_the_ID(), 'your_custom_field_key', true);
                                            ?>

                                            <article class="post-block-style-wrapper post-block-template-two most-read-block-list">
                                                <div class="post-block-style-inner post-block-list-style-inner">
                                                    <div class="post-block-media-wrap">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div>
                                                    <div class="post-block-content-wrap">
                                                        <div class="post-item-title">
                                                            <h2 class="post-title">
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-bottom-meta-list">
                                                            <div class="post-meta-author-box">
                                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                                            </div>
                                                            <div class="post-meta-date-box">
                                                                <?php echo get_the_date(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>

                                            <?php
                                        }
                                        /* Restore original Post Data */
                                        wp_reset_postdata();
                                    } else {
                                        // No posts found
                                    }
                                ?>
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
            <div class="body-overlay"></div>
            <!-- tp-offcanvus-area-end -->
            <div class="theme-breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner">
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="theme-blog-page-area mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                    <?php
                                    $author_id = get_query_var('author');
                                    $author_slug = get_query_var('author_name');
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $args = array(
                                        'category_name'     => 'movie-malem-minggu', // Ganti 'nama-kategori' dengan slug kategori yang diinginkan
                                        'posts_per_page'    => 6, // Menampilkan 6 posting
                                        'orderby'           => 'date', // Mengurutkan berdasarkan tanggal
                                        'order'             => 'DESC', // Dalam urutan menurun (descending)
                                        'paged'             => $paged,
                                    );

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :
                                        while ($query->have_posts()) : $query->the_post(); ?>
                                           <div class="col-lg-4">
                                            <article class="post-block-style-wrapper post-block-template-one post-block-template-medium mb-24">
                                                <div class="post-block-style-inner">
                                                    <div class="post-block-media-wrap">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php
                                                            if (has_post_thumbnail()) {
                                                                the_post_thumbnail('thumbnail');
                                                            } else {
                                                                echo '<img src="' . get_template_directory_uri() . '/assets/media/default-thumbnail.jpg" alt="Post title">';
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div class="post-block-content-wrap">
                                                        <div class="post-item-title">
                                                            <h2 class="post-title">
                                                                <a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(), 0, 60); ?><?= strlen(get_the_title()) > 30 ? '...' : ''; ?></a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-excerpt-box">
                                                            <p><?php echo substr(get_the_excerpt(), 0, 30); ?><?= strlen(get_the_excerpt()) > 70 ? '...' : ''; ?></p>
                                                        </div>
                                                        <div class="post-bottom-meta-list">
                                                            <div class="post-meta-author-box">
                                                                By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                                            </div>
                                                            <div class="post-meta-date-box">
                                                                <?php echo get_the_date(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            </div>
                                        <?php endwhile;
                                        wp_reset_postdata();
                                    else :
                                        echo 'Tidak ada posting yang ditemukan.';
                                endif;
                            ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="blog-pagination-area mt-40">
                                        <?php mg_custom_pagination(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>