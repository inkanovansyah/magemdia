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
            <section class="ads-area mt-70 mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="ads-caption d-none">Advertisement</h3>
                            <div class="ads-image">
                                <a href="post-single.html">
                                <img src="<?php echo get_template_directory_uri() .'/assets/media/ads-full-1.png'?>" alt="Ads">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="post-single-area mt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 single-blog-content">
                        <?php
                            // Mendapatkan ID posting
                            $post_id = get_the_ID();
                            // Mendapatkan informasi detail posting
                            $post_title = get_the_title($post_id);
                            $post_content = apply_filters('the_content', get_the_content(null, false, $post_id));
                            $post_date = get_the_date('M d, Y', $post_id); // Menampilkan tahun juga
                            $post_author_id = get_the_author_meta('ID');
                            $post_author_name = get_the_author();
                            $post_author_url = get_author_posts_url($post_author_id);
                        ?>
                        <div class="post-single-wrapper">
                            <div class="post-cat-box">
                                <?php echo get_the_category_list(', ', '', $post_id); ?>
                            </div>
                        

                            <h1 class="post-title">
                                <?php echo $post_title; ?>
                            </h1>
                            <div class="post-meta-author-box">
                                <?php
                                    $tags = get_the_tags();
                                    if ($tags) {
                                        foreach ($tags as $tag) {
                                            echo '<a href="#">' . $tag->name . '</a>';
                                        }
                                    }
                                ?>
                             </div>
                            <div class="post-bottom-meta-list post-meta-wrapper">
                                <div class="post-left-details-meta">
                                    <div class="post-meta-author-box">
                                        By <a href="<?php echo $post_author_url; ?>"><?php echo $post_author_name; ?></a>
                                    </div>
                                    <div class="post-meta-date-box">
                                        <?php echo $post_date; ?>
                                    </div>
                                </div>
                                <div class="post-meta-social">
                                    <a href="<?php echo get_permalink($post_id); ?>"><i class="icofont-link"></i></a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post_id); ?>"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink($post_id); ?>"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink($post_id); ?>"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://api.whatsapp.com/send?text=<?php echo get_permalink($post_id); ?>"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                            <div class="post-featured-image">
                                <?php
                                    // Memeriksa apakah posting memiliki gambar unggulan
                                    if (has_post_thumbnail($post_id)) {
                                        the_post_thumbnail('medium');
                                    } else {
                                        // Jika tidak, tampilkan gambar default
                                        echo '<img src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="Default Image">';
                                    }
                                ?>
                            </div>
                            <!-- Konten posting -->
                            <div class="post-content">
                                <?php echo $post_content; ?>
                            </div>
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
                                    <div class="comment-respond">
                                            <!-- <form action="" method="post">
                                                <input type="hidden" name="action" value="submit_reader_post">
                                                <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="message">Leave a Reply</label>
                                                            <textarea id="message" name="reader_post_content"></textarea>
                                                            <label for="message">Nama</label>
                                                            <input class="form-control" type="text" placeholder="Default input">
                                                            <label for="message">Email</label>
                                                            <input class="form-control" type="email" placeholder="Default input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input name="submit" type="submit" id="submit" class="theme-submit-btn" value="Post Comment">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> -->
                               
                                            <div class="comment-list">
                                                <h4 class="title mt-4">Comment</h4>
                                                <?php
                                                    // Get comments
                                                    comment_form(array(
                                                        'title_reply' => '',
                                                        'fields' => array(
                                                            'author' => '<div class="row"><div class="col-lg-4 col-md-12"><div class="form-group"><label for="author">' . __('Your Name') . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></div></div>',
                                                            'email' => '<div class="col-lg-4 col-md-12"><div class="form-group"><label for="email">' . __('Your Email') . '</label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></div></div>',
                                                            'url' => '<div class="col-lg-4 col-md-12"><div class="form-group"><label for="url">' . __('Your Website') . '</label><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div></div></div>',
                                                        ),
                                                        'comment_field' => '<div class="row"><div class="col-lg-12"><div class="form-group"><label for="comment">' . __('Leave a Reply') . '</label><textarea id="comment" name="comment" rows="8" aria-required="true"></textarea></div></div></div>',
                                                        'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __('Your email address will not be published.') . '</span> ' . __('Required fields are marked ') . '<span class="required">*</span></p>',
                                                        'comment_notes_after' => '',
                                                        'class_submit' => 'theme-submit-btn',
                                                        'label_submit' => __('Post Comment'),
                                                        'submit_button' => '<div class="col-lg-12"><div class="form-submit"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div></div>',
                                                        'submit_field' => '<div class="row">%1$s %2$s</div>',
                                                        'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" /> <label for="wp-comment-cookies-consent">' . __('Save my name, email, and website in this browser for the next time I comment.') . '</label></p>',
                                                    ));
                                                    // Loop through comments
                                                    // Memeriksa apakah ada komentar
                                                    $comments = get_comments(array(
                                                        'post_id' => get_the_ID(), // ID postingan saat ini
                                                        'status'  => 'approve' // Hanya ambil komentar yang disetujui
                                                    ));


                                                    if($comments) {
                                                        // Loop melalui setiap komentar
                                                        foreach ($comments as $comment) { ?>
                                                            <div class="comment mt-4">
                                                                <div class="comment-author">
                                                                    <?php
                                                                    // Menampilkan nama pengguna yang mengomentari
                                                                        $comment_author = get_comment_author($comment->comment_ID);
                                                                        echo '<span class="comment-author-name" style="font-weight: bold; color: #3CFFD0;">' . $comment_author . '</span>';
                                                                    ?>
                                                                    <span class="comment-date"><?php echo get_comment_date('F j, Y', $comment->comment_ID); ?></span>
                                                                </div>
                                                                <div class="comment-content mt-2">
                                                                    <p><?php echo $comment->comment_content; ?></p>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    } else {
                                                       // Jika tidak ada komentar, tampilkan pesan
                                                        echo '<p class="mt-3">tidak ada komentar comments found.</p>';
                                                    }
                                                ?>
                                                <!-- Tambahkan komentar-komentar lainnya di sini -->
                                            </div>
                                        <!-- 
                                            <div class="comment-list">
                                                <h4 class="title mt-4">Comments</h4>
                                                <div class="comment  mt-4">
                                                    <div class="comment-author">
                                                        <span class="comment-date">April 20, 2024</span>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>This is a comment.</p>
                                                    </div>
                                                </div>
                                                
                                            </div> -->
                                    </div>
                                    <!-- Tampilan komentar -->
                                    <!-- End Comment Respond  -->
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
                                        'offset'                 => 6, // Jumlah posting yang ingin di-skip dari awal
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
                                    <div class="google-adsense-widget mt-40">
                                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1429656230503295"
                                            crossorigin="anonymous"></script>
                                        <ins class="adsbygoogle"
                                            style="display:block"
                                            data-ad-format="fluid"
                                            data-ad-layout-key="-fa+1o-1r-wv+1td"
                                            data-ad-client="ca-pub-1429656230503295"
                                            data-ad-slot="1259500603"></ins>
                                        <script>
                                            (adsbygoogle = window.adsbygoogle || []).push({});
                                        </script>
                                    </div>
                                <div class="ads-widget mt-40">
                                    <a href="post-single.html">
                                        <img src="<?php echo get_template_directory_uri() .'/assets/media/ads-sidebar-1.png'?>" alt="Advertisement">
                                    </a>
                                </div>
                                <div class="google-adsense-widget mt-40">
                                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1429656230503295"
                                        crossorigin="anonymous"></script>
                                            <!-- Horizontal iklan -->
                                            <ins class="adsbygoogle"
                                                style="display:block"
                                                data-ad-client="ca-pub-1429656230503295"
                                                data-ad-slot="2889491757"
                                                data-ad-format="auto"
                                                data-full-width-responsive="true">
                                            </ins>
                                    <script>
                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>
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