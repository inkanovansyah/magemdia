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
            </div>
            <div class="body-overlay"></div>
            <!-- tp-offcanvus-area-end -->
            <div class="post-single-area mt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 single-blog-content">
                            <div class="post-block-style-inner">
                                <div class="post-block-media-wrap location">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.9183733507127!2d106.6743468!3d-6.2294772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fbd64ab483bd%3A0x585a5b9c6622b549!2sKunciran%2C%20Kec.%20Pinang%2C%20Kota%20Tangerang%2C%20Banten!5e0!3m2!1sen!2sbd!4v1672491880233!5m2!1sen!2sbd"  allowfullscreen="" aria-label="Ridgeland" loading="lazy"></iframe>
                                </div>
                                    <?php
                                        // Mendapatkan ID posting
                                        $post_id = get_the_ID();

                                        // Mendapatkan informasi detail posting
                                        $post_title = get_the_title($post_id);
                                        $post_content = get_the_content(null, false, $post_id);
                                        $post_date = get_the_date('M d', $post_id);
                                        $post_author = get_the_author($post_id);

                                        // Menampilkan informasi posting
                                    ?>
                                    <div class="post-single-wrapper">
                                        <div class="post-cat-box">
                                            <a href="<?php echo get_permalink($post_id); ?>"><?php echo get_the_category_list(', ', '', $post_id); ?></a>
                                        </div>
                                        <h1 class="post-title">
                                        <?php echo $post_title; ?>
                                        </h1>
                                        <div class="post-bottom-meta-list post-meta-wrapper">
                                            <div class="post-left-details-meta">
                                                <div class="post-meta-author-box">
                                                    By <a href="#"><?php echo $post_author; ?></a>
                                                </div>
                                                <div class="post-meta-date-box">
                                                    <?php echo $post_date; ?>
                                                </div>
                                            </div>
                                            <div class="post-meta-social">
                                                <a href="#"><i class="icofont-link"></i></a>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                        <div class="post-featured-image">
                                        <?php
                                            // Memeriksa apakah posting memiliki gambar unggulan
                                            if (has_post_thumbnail($post_id)) {
                                                echo get_the_post_thumbnail($post_id, 'medium');
                                            } else {
                                                // Jika tidak, tampilkan gambar default
                                                echo '<img src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="Default Image">';
                                            }
                                        ?>
                                        </div>
                                        <p><?php echo $post_content; ?></p>
                                    </div>
                                <div class="theme-blog-details">
                                    <div class="author-bio-wrap">
                                        <div class="author-thumbnail">
                                            <a href="#"> <?php echo get_avatar(get_the_author_meta('user_email'), 20); ?></a>
                                        </div>
                                        <div class="author-body">
                                            <h5 class="title">
                                            <?php the_author(); ?>
                                            </h5>
                                            <p class="author-inner-text">  <?php echo get_the_author_meta('description'); ?></p>
                                            <div class="social-share-author">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="theme-comment-area">
                                        <!-- Start Comment Respond  -->
                                        <!-- <div class="comment-respond">
                                            <h4 class="title">Post a comment</h4>
                                            <form action="#">
                                                <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">Your Name</label>
                                                            <input id="name" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">Your Email</label>
                                                            <input id="email" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="form-group">
                                                            <label for="website">Your Website</label>
                                                            <input id="website" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="message">Leave a Reply</label>
                                                            <textarea id="message" name="message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p class="comment-form-cookies-consent">
                                                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                                            <label for="wp-comment-cookies-consent">Save my name, email, and
                                                            website in this browser for the next time I comment.</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input name="submit" type="submit" id="submit" class="theme-submit-btn" value="Post Comment">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> -->
                                        <!-- End Comment Respond  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar blog-sidebar">
                                <div class="section-title">
                                    <h2 class="title-block">
                                        Popular on Mage Media
                                    </h2>
                                </div>
                                <?php
                                    // WP_Query arguments
                                    $args = array(
                                        'post_type'              => 'post', // or 'any' if you want to include pages as well
                                        'post_status'            => 'publish',
                                        'posts_per_page'         => 5, // Number of posts to show
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
                                <div class="ads-widget mt-40">
                                    <a href="post-single.html">
                                        <img src="<?php echo get_template_directory_uri() .'/assets/media/ads-sidebar.png'?>" alt="Advertisement">
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="popular-posts-column-area related-posts-wrapper mt-60 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="section-title">
                            <h2 class="title-block">
                                Related Posts
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        global $post; // Make sure you have access to the global post object

                        // Get current post's tags and categories
                        $tags = wp_get_post_tags($post->ID, array('fields' => 'ids'));
                        $categories = wp_get_post_categories($post->ID, array('fields' => 'ids'));
                        
                        // Prepare the query arguments
                        $args = array(
                            'post_type' => 'post', // Change to your specific post type if needed
                            'posts_per_page' => 3, // Adjust the number of posts as needed
                            'post__not_in' => array($post->ID), // Exclude the current post
                            'tag__in' => $tags, // Filter by the same tags
                            'category__in' => $categories, // Filter by the same categories
                            'orderby' => 'date', // Order by date or another parameter
                            'order' => 'DESC', // Order direction
                        );
                        
                        $related_posts = new WP_Query($args);
                        
                        if ($related_posts->have_posts()) : 
                            while ($related_posts->have_posts()) : $related_posts->the_post();
                            ?>
                            <div class="col-lg-4">
                                <article class="post-block-style-wrapper post-block-template-one post-block-template-medium mb-24">
                                    <div class="post-block-style-inner">
                                        <div class="post-block-media-wrap">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="post-block-content-wrap">
                                            <div class="post-item-title">
                                                <h2 class="post-title">
                                                    <a href="<?php the_permalink(); ?>"> 
                                                    <?php
                                                        $title = get_the_title();
                                                        echo strlen($title) > 30 ? substr($title, 0, 30) . '...' : $title;
                                                        ?>
                                                    </a>
                                                </h2>
                                            </div>
                                            <div class="post-excerpt-box">
                                                <p>
                                                <?php
                                                    $excerpt = get_the_excerpt();
                                                    echo strlen($excerpt) > 30 ? substr($excerpt, 0, 30) . '...' : $excerpt;
                                                ?>
                                                </p>
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
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No related posts found.</p>';
                        endif;
                    ?>
                    </div>
                </div>
            </section>