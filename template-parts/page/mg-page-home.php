<?php

/**
 * @author Inka Novansyah
 */
//check sticky
// $stickyS = get_option('sticky_posts');
?>
        <!-- Site Wrapper -->
        <d id="main-wrapper" class="main-wrapper">
            <div class="tp-offcanvas-area">
                <div class="tpoffcanvas">
                    <div class="tpoffcanvas__close-btn">
                        <button class="close-btn"><i class="icofont-close"></i></button>
                    </div>
                    <div class="tpoffcanvas__logo offcanvas-logo">
                        <a href="#">
                        <img src="<?php echo get_template_directory_uri() .'/assets/media/logo.svg'?>" alt="Logo">
                        </a>
                    </div>
                    <div class="tpoffcanvas__text offcanvas-content">
                        <div class="main-canvas-inner">
                            <div class="canvas-bar-post-list">
                                <?php
                                  // WP_Query arguments
                                    $args = array(
                                      'post_type'           => 'post',  // Tipe post yang ingin ditampilkan
                                      'post_status'         => 'publish',  // Status post harus "publish"
                                      'posts_per_page'      => 4,  // Batasan jumlah posting yang ditampilkan
                                      'ignore_sticky_posts' => 1,  // Mengabaikan sticky posts
                                      'fields'              => 'ids',  // Hanya ambil ID untuk efisiensi
                                    );
                                  // Transient cache untuk menyimpan hasil query selama 1 jam
                                    $cached_posts = get_transient('latest_posts_cache');
                                    if (false === $cached_posts) {
                                      // Jika cache tidak tersedia, lakukan query
                                        $cached_posts = get_posts($args);
                                      // Menyimpan hasil query dalam cache untuk 1 jam
                                        set_transient('latest_posts_cache', $cached_posts, HOUR_IN_SECONDS);
                                    }
                                    if ($cached_posts) :
                                        foreach ($cached_posts as $post_id) :
                                            // Mengambil gambar unggulan untuk post
                                            $image_url = get_the_post_thumbnail_url($post_id, 'full') ?: get_template_directory_uri() . '/assets/media/default.jpg';
                                            
                                            // Mengambil judul dan link untuk post
                                            $title     = get_the_title($post_id);
                                            $permalink = get_permalink($post_id);
                                        ?>
                                        <article class="post-block-style-wrapper post-block-template-two most-read-block-list">
                                            <div class="post-block-style-inner post-block-list-style-inner">
                                                <div class="post-block-media-wrap">
                                                    <a href="<?php echo esc_url($permalink); ?>">
                                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
                                                    </a>
                                                </div>
                                                <div class="post-block-content-wrap">
                                                    <div class="post-item-title">
                                                        <h2 class="post-title">
                                                            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
                                                        </h2>
                                                    </div>
                                                    <div class="post-bottom-meta-list">
                                                        <div class="post-meta-author-box">
                                                            <a href="<?php echo esc_url(get_author_posts_url(get_post_field('post_author', $post_id))); ?>">
                                                                <?php echo esc_html(get_the_author_meta('display_name', get_post_field('post_author', $post_id))); ?>
                                                            </a>
                                                        </div>
                                                        <div class="post-meta-date-box">
                                                            <?php echo esc_html(get_the_date('M d', $post_id)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endforeach;
                                        endif;
                                    ?>
                            </div>
                            <div class="panel-nav-social">
                            <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_whatsapp')) ?>"><i class="icofont-whatsapp"></i></a>
                                <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_instagram')) ?>"><i class="icofont-instagram"></i></a>
                                <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_facebook')) ?>"><i class="icofont-facebook"></i></a>
                                <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_twitter')) ?>"><i class="icofont-twitter"></i></a>
                                <a href="<?php echo esc_url(get_theme_mod('mg_theme_customizer_control_socialmedia_youtube')) ?>"><i class="icofont-brand-youtube"></i></a>
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
            <!-- Advertisement-area-start -->
            <section class="ads-area mt-20 mb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="ads-caption d-none">Advertisement</h3>
                            <div class="ads-image">
                                <a href="post-single.html">
                                <?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_header_ads')) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Advertisement-area-end -->
            <section class="blog-hero-area mt-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <?php
                                // WP_Query arguments
                                $args = array(
                                    'posts_per_page' => 4, // Limit to 4 posts
                                    'fields'         => 'ids', // Only retrieve post IDs for efficiency
                                );
                                
                                // Lakukan query langsung tanpa cache
                                $posts = get_posts($args);
                                
                                if ($posts) :
                                    foreach ($posts as $post_id) :
                                        // Mengambil gambar unggulan untuk post
                                        $image_url = get_the_post_thumbnail_url($post_id, 'full') ?: get_template_directory_uri() . '/assets/media/team-mate.jpg'; // Fallback image
                                        
                                        // Mengambil judul dan link untuk post
                                        $title     = get_the_title($post_id);
                                        $short_title = mb_strlen($title) > 32 ? mb_substr($title, 0, 32) . '[..]' : $title;
                                        $permalink = get_permalink($post_id);
                                ?>
                                        <article class="post-block-style-wrapper post-block-template-one post-block-template-small">
                                            <div class="post-block-style-inner">
                                                <div class="post-block-media-wrap">
                                                    <a href="<?php echo esc_url($permalink); ?>">
                                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($short_title); ?>">
                                                    </a>
                                                </div>
                                                <div class="post-block-content-wrap">
                                                    <div class="post-item-title">
                                                        <h2 class="post-title">
                                                            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($short_title); ?></a>
                                                        </h2>
                                                    </div>
                                                    <div class="post-bottom-meta-list">
                                                        <div class="post-meta-author-box">
                                                            By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID', get_post_field('post_author', $post_id)))); ?>"><?php echo get_the_author_meta('display_name', get_post_field('post_author', $post_id)); ?></a>
                                                        </div>
                                                        <div class="post-meta-date-box">
                                                            <?php echo get_the_date(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                <?php
                                    endforeach;
                                endif;
                            ?>
                        </div>
                        <div class="col-lg-6">
                        <?php
                            $args = array(
                                'posts_per_page' => 2,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'offset' => 4 // Jumlah posting yang ingin di-skip dari awal
                            );
                            $the_query = new WP_Query($args);
                            if ($the_query->have_posts()) : 
                                while ($the_query->have_posts()) : $the_query->the_post();
                                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    if (!$image_url) {
                                        $image_url = get_template_directory_uri() . '/assets/media/default.jpg'; // Fallback image URL
                                    }
                                    $title = get_the_title();
                                    $short_title = mb_strlen($title) > 32 ? mb_substr($title, 0, 32) . '[..]' : $title;
                                    $original_excerpt = get_the_excerpt();
                                    $excerpt = mb_strlen($original_excerpt) > 40 ? mb_substr($original_excerpt, 0, 200) . ".." : $original_excerpt;
                            ?>
                            <article class="post-block-style-wrapper post-block-template-one sm-mt-24">
                                <div class="post-block-style-inner">
                                    <div class="post-block-media-wrap">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($short_title); ?>">
                                        </a>
                                    </div>
                                    <div class="post-block-content-wrap">
                                        <div class="post-item-title">
                                            <h2 class="post-title">
                                                <a href="<?php the_permalink(); ?>"><?php echo $short_title; ?></a>
                                            </h2>
                                        </div>
                                        <div class="post-excerpt-box">
                                            <p><?php echo $excerpt;?></p>
                                        </div>
                                        <div class="post-bottom-meta-list">
                                            <div class="post-meta-author-box">
                                                By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                                            </div>
                                            <div class="post-meta-date-box">
                                                <?php echo get_the_date(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>No posts found.</p>';
                            endif;
                        ?>
                        </div>
                        <div class="col-lg-3">
                            <div class="section-title sm-mt-24">
                                <h2 class="title-block">
                                    Pilihan Hari ini
                                </h2>
                            </div>
                            <div class="post-block-template-two-wrapper">
                            <?php
                                $args = array(
                                    'post_type'      => 'post', // Change to 'any' or other post type if needed
                                    'posts_per_page' => 5,
                                    'meta_key'       => 'post_views_count',
                                    'orderby'        => 'meta_value_num',
                                    'order'          => 'DESC', // Changed to DESC for highest view count
                                );
                                $the_query = new WP_Query($args);
                                if ($the_query->have_posts()) :
                                    while ($the_query->have_posts()) : $the_query->the_post();
                                        // Get the full title of the post
                                        $full_title = get_the_title();
                                        // Truncate the title to a shorter length if it exceeds 32 characters
                                        $short_title = mb_strlen($full_title) > 32 ? mb_substr($full_title, 0, 28) . ' [..]' : $full_title;
                                        ?>
                                        <article class="post-block-style-wrapper post-block-template-two">
                                            <div class="post-block-style-inner post-block-list-style-inner">
                                                <div class="post-block-media-wrap">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
                                                    </a>
                                                </div>
                                                <div class="post-block-content-wrap">
                                                    <div class="post-category-box">
                                                        <a class="post-cat-item" href="<?php echo esc_url(get_category_link(get_the_category()[0]->term_id)); ?>"><?php echo get_the_category()[0]->name; ?></a>
                                                    </div>
                                                    <div class="post-item-title">
                                                        <h2 class="post-title">
                                                            <a href="<?php the_permalink(); ?>"><?php echo $short_title;?></a>
                                                        </h2>
                                                    </div>
                                                    <div class="post-bottom-meta-list">
                                                        <div class="post-meta-author-box">
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                                        </div>
                                                        <div class="post-meta-date-box">
                                                            <?php echo get_the_date('M d'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else : ?>
                                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="ads-widget mt-40">
                                <?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_sidebar_ads_1')) ?>
                            </div>
                            <!-- start imd  -->
                                <?php if (get_theme_mod('mg_theme_customizer_control_home_widget_1')) : ?>
                                    <section class=" mt-20 mb-20">
                                        <div class="container">
                                            <h3 class="ads-caption d-none">Advertisement</h3>
                                        </div>
                                        <div>
                                        <?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_home_widget_1')) ?>
                                        </div>
                                    </section>
                                <?php endif ?> 
                            <!-- end imdb -->
                        </div>
                    </div>
                </div> 
            </section>
            <section class="blog-hero-area mt-30">
                <div class="container">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title-block">
                                Movie PlayNow Bioskop
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                <div class="movie-slider" id="movie-slider">
                    <!-- Movie cards will be dynamically added here -->
                </div>
                    <!-- <div class="row">
                            <div class="swiper">
                                <div class="swiper-wrapper" id="movie-widget"> -->
                                            <!-- Cards will be dynamically inserted here -->
                                <!-- </div> -->
                                <!-- Add Pagination -->
                                <!-- <div class="swiper-pagination"></div> -->
                                <!-- Add Navigation -->
                                <!-- <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div> -->
                </div>
            </section>
            <div class="section-divider mt-20 mb-20"></div>
            <section class="ads-area mt-20 mb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="ads-caption d-none">Advertisement</h3>
                            <div class="ads-image">
                                <?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_header_ads')) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="most-popular-area mt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title-block">
                                    Movie Netflix Trending 
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-50">
                        <div class="col-lg-5">
                            <?php
                                // Query for the most commented post
                                $args = array(
                                   'tag' => 'netflix-trending', // Fetch posts from the "movie-malem-minggu" category
                                    'posts_per_page' => 1,
                                    'meta_key' => 'post_views_count',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                );
                                $popular_post = new WP_Query($args);
                                if ($popular_post->have_posts()): while ($popular_post->have_posts()): $popular_post->the_post();
                            ?>
                            <article class="post-block-style-wrapper post-block-template-one custom-spacing">
                                <div class="post-block-style-inner">
                                    <div class="post-block-media-wrap">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                    </div>
                                    <div class="post-block-content-wrap">
                                        <div class="post-item-title">
                                            <h2 class="post-title">
                                                <a href="<?php the_permalink(); ?>">  <?php echo substr(get_the_title(), 0, 60); ?><?= strlen(get_the_title()) > 30 ? '...' : ''; ?></a>
                                            </h2>
                                        </div>
                                        <div class="post-excerpt-box">
                                            <p>
                                                <?php echo substr(get_the_excerpt(), 0, 30); ?><?= strlen(get_the_excerpt()) > 70 ? '...' : ''; ?>
                                            </p>
                                        </div>
                                        <div class="post-bottom-meta-list">
                                            <div class="post-meta-author-box">
                                                By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                            </div>
                                            <div class="post-meta-date-box">
                                                <?php echo get_the_date('M d'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                                endwhile; endif;
                                wp_reset_postdata();
                            ?>
                        </div>
                        <div class="col-lg-7">
                            <?php
                                // Adjust the query to fetch the next set of popular posts, excluding the most commented post
                                $args['posts_per_page'] = 2; // Get the next two popular posts
                                $args['offset'] = 1; // Skip the most popular post
                                $more_popular_posts = new WP_Query($args);
                                if ($more_popular_posts->have_posts()): while ($more_popular_posts->have_posts()): $more_popular_posts->the_post();
                            ?>
                            <article class="post-block-style-wrapper post-block-template-four">
                                <div class="post-block-style-inner post-block-list-style-inner">
                                    <div class="post-block-content-wrap">
                                        <div class="post-item-title">
                                            <h2 class="post-title">
                                                <a href="<?php the_permalink(); ?>">  <?php echo substr(get_the_title(), 0, 60); ?><?= strlen(get_the_title()) > 30 ? '...' : ''; ?></a>
                                            </h2>
                                        </div>
                                        <div class="post-excerpt-box">
                                        <p href="<?php the_permalink(); ?>">  <?php echo substr(get_the_title(), 0, 60); ?><?= strlen(get_the_title()) > 70 ? '...' : ''; ?></p>
                                        </div>
                                        <div class="post-bottom-meta-list">
                                            <div class="post-meta-author-box">
                                                By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                            </div>
                                            <div class="post-meta-date-box">
                                                <?php echo get_the_date('M d'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-block-media-wrap">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <?php
                                endwhile; endif;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title-block">
                                    Anime Netflix
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row divider-border">
                    <?php
                        $args = array(
                            'post_type'      => 'post',           // Tipe post standar
                            'posts_per_page' => 3,                // Menampilkan 3 postingan
                            'tag'            => 'anime-netflix',  // Ganti dengan slug tag yang diinginkan
                            'orderby'        => 'meta_value_num', // Mengurutkan berdasarkan meta_value (views count)
                            'meta_key'       => 'post_views_count', // Key untuk views count
                            'order'          => 'DESC',           // Urutkan dari yang terbanyak
                            'post_status'    => 'publish',        // Hanya post yang dipublikasikan
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            $counter = 1;
                            while ($query->have_posts()) : $query->the_post();
                        ?>
                            <div class="col-lg-4">
                                <div class="post-block-template-three-wrapper popular-post-block-bottom-wrapper">
                                    <article class="post-block-style-wrapper post-block-template-three">
                                        <div class="post-block-style-inner post-block-list-style-inner-three">
                                            <div class="post-block-number-wrap">
                                                <span class="post-number-counter"><?php echo $counter; ?></span>
                                            </div>
                                            <div class="post-block-content-wrap">
                                                <div class="post-item-title">
                                                    <h2 class="post-title">
                                                        <a href="<?php the_permalink(); ?>"><?php 
                                                            $title = get_the_title();
                                                            echo strlen($title) > 18 ? substr($title, 0, 30) . ".." : $title;
                                                        ?>
                                                        </a>
                                                    </h2>
                                                </div>
                                                <div class="post-bottom-meta-list">
                                                    <div class="post-meta-author-box">
                                                        By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                                    </div>
                                                    <div class="post-meta-date-box">
                                                        <?php echo get_the_date('M d'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        <?php
                            $counter++;
                            endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <section class="most-popular-area pt-40 pb-40 mt-40">
                <div class="container">
                    <?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_home_socialmedia_feed')) ?>
                </div>
            </section>
            <section class="video-posts-area pt-40 pb-40 mt-40">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="section-title">
                                <h2 class="title-block">
                                    On Videos
                                </h2>
                            </div>
                            <?php
                                // Query untuk mengambil satu post dari post type "video"
                                $args = array(
                                    'post_type'      => 'video', // Nama post type
                                    'posts_per_page' => 1,       // Jumlah post yang ingin ditampilkan
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post(); ?>
                                        <article class="post-block-style-wrapper post-block-template-one post-block-video">
                                            <div class="post-block-style-inner">
                                                <div class="post-block-video-thumb">
                                                    <div class="post-block-media-wrap">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php if (has_post_thumbnail()) {
                                                                the_post_thumbnail('medium'); // Ukuran thumbnail
                                                            } ?>
                                                        </a>
                                                    </div>
                                                    <div class="video-play-icon-wrap">
                                                        <a href="<?php the_permalink(); ?>" class="theme-play-btn video-play-btn"></a>
                                                    </div>
                                                </div>
                                                <div class="post-block-content-wrap">
                                                    <div class="post-item-title">
                                                        <h2 class="post-title">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                    </div>
                                                    <div class="post-excerpt-box">
                                                        <p><?php the_excerpt(); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                else : ?>
                                    <p><?php esc_html_e('No posts found.'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-5">
                            <div class="section-btn text-end">
                                <a href="https://www.youtube.com/@magemedia-uy3rp"><span>+</span>Videos MAGE</a>
                            </div>
                            <?php
                                // Query untuk mengambil post dari kategori "video-mage" dengan offset satu post
                                $args = array(
                                    'post_type'      => 'video',
                                    'posts_per_page' => 3,            // Jumlah post yang ingin ditampilkan
                                    'offset'         => 1,            // Melewatkan post pertama
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post(); ?>
                                        <article class="post-block-style-wrapper post-block-template-two post-video-list">
                                            <div class="post-block-style-inner post-block-list-style-inner">
                                                <div class="post-block-media-wrap">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php if (has_post_thumbnail()) {
                                                            the_post_thumbnail('medium'); // Ukuran thumbnail
                                                        } ?>
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
                                                            <?php the_time('M j'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                    else : ?>
                                <p><?php esc_html_e('No posts found.'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <div class="section-divider mt-60 mb-60"></div>
            <section class="articles-grid-section mt-60 mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title-block">
                                    Event Bocah Popcorn Movie
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        // Query untuk mengambil post dari post type "film_event" dengan urutan DESC berdasarkan tanggal
                        $args = array(
                            'post_type'      => 'film_event', // Nama post type
                            'posts_per_page' => 4,            // Jumlah post per halaman
                            'orderby'        => 'date',       // Urutkan berdasarkan tanggal
                            'order'          => 'DESC',       // Urutan DESC (terbaru ke terlama)
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col-lg-3">
                                    <article class="post-block-style-wrapper post-block-template-one post-block-template-small">
                                        <div class="post-block-style-inner">
                                            <div class="post-block-media-wrap">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if (has_post_thumbnail()) {
                                                        the_post_thumbnail('medium', array('alt' => get_the_title())); // Thumbnail dengan alt text
                                                    } else { ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/media/camera.jpg" alt="Post title">
                                                    <?php } ?>
                                                </a>
                                            </div>
                                            <div class="post-block-content-wrap">
                                                <div class="post-item-title">
                                                    <h2 class="post-title">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h2>
                                                </div>
                                                <div class="post-excerpt-box">
                                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                                </div>
                                                <div class="post-bottom-meta-list">
                                                    <div class="post-meta-author-box">
                                                        By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                                    </div>
                                                    <div class="post-meta-date-box">
                                                        <?php echo get_the_date('M j'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); // Reset post data
                        else : ?>
                            <div class="col-lg-12">
                                <p><?php esc_html_e('No posts found.'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <div class="section-divider mt-60 mb-60"></div>                    
            <section class="articles-grid-section mt-60 mb-60">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="section-title">
                                <h2 class="title-block">
                                    Follow Sosial Media Kami Banyak Yang Seru Disini
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <!-- Bagian Atas -->
                        <div class="col-md-3 mb-20 p-4">
                            <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_whatsapp')) ?>" class="social-box" target="_blank">
                                <i class="icofont-whatsapp p-2"></i> Ikuti WA Channel magecine
                            </a>
                        </div>
                        <div class="col-md-3 mb-20 p-4">
                            <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_instagram')) ?>" class="social-box" target="_blank">
                                <i class="icofont-instagram p-2"></i> Follow Instagram magecine
                            </a>
                        </div>
                        <div class="col-md-3 mb-20 p-4">
                            <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_facebook')) ?>" class="social-box" target="_blank">
                                <i class="icofont-facebook p-2"></i> Follow facebook magecine
                            </a>
                        </div>
                        <div class="col-md-3 mb-20 p-4">
                            <a href="<?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_socialmedia_twitter')) ?>" class="social-box" target="_blank">
                                <i class="icofont-twitter p-2"></i> Follow magecine di x
                            </a>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap text-center">
                            <div class="col-md-3 mb-3 p-4">
                                <a href="<?php echo esc_url(get_theme_mod('mg_theme_customizer_control_socialmedia_youtube')) ?>" class="social-box d-block text-white" target="_blank">
                                    <i class="icofont-brand-youtube p-2"></i> Ikuti Channel magecine di YouTube
                                </a>
                            </div>
                            <div class="col-md-3 mb-3 p-4">
                                <a href="<?php echo esc_url(get_theme_mod('mg_theme_customizer_control_socialmedia_tiktok')) ?>" class="social-box d-block text-white" target="_blank">
                                    <i class="icofont-tiktok p-2"></i> Follow Tiktok di magecine
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>