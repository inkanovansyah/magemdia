            <div class="theme-breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner">
                                <?php mg_custom_breadcrumbs() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="theme-blog-page-area mb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="author-bio-wrap">
                                        <div class="author-thumbnail">
                                            <a href="#"> <?php echo get_avatar(get_the_author_meta('user_email'), 20); ?></a>
                                        </div>
                                        <div class="author-body">
                                            <h5 class="title">
                                            <?php the_author(); ?>
                                            </h5>
                                            <p class="author-inner-text">  <?php echo get_the_author_meta('description'); ?></p>
                                            <?php
                                                // Ambil informasi penulis
                                                $author = get_queried_object(); 
                                                $author_id = $author->ID;
                                                // Ambil link media sosial dari user meta
                                                $facebook = get_the_author_meta('facebook', $author_id);
                                                $instagram = get_the_author_meta('instagram', $author_id);
                                                $twitter = get_the_author_meta('twitter', $author_id);
                                                $linkedin = get_the_author_meta('linkedin', $author_id);
                                            ?>

                                                <div class="social-share-author">
                                                    <?php if ($facebook) : ?>
                                                        <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ($instagram) : ?>
                                                        <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                                            <i class="fab fa-instagram"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ($twitter) : ?>
                                                        <a href="<?php echo esc_url($twitter); ?>" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ($linkedin) : ?>
                                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                                            <i class="fab fa-linkedin-in"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                        </div>
                                    </div>
                                    <?php
                                        // Fetch the author ID or slug from the query vars
                                        $author_id = get_query_var('author');
                                        $author_slug = get_query_var('author_name');
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                        $args = array(
                                            'post_type'      => 'post',
                                            'posts_per_page' => 7,
                                            'paged'          => $paged,
                                            'orderby'        => 'date',
                                            'order'          => 'DESC',
                                        );
                                        if ($author_id) {
                                            $args['author'] = $author_id; // Use author ID if available
                                        } elseif ($author_slug) {
                                            $args['author_name'] = $author_slug; // Use author slug if available
                                        }
                                        $the_query = new WP_Query($args);
                                        if ($the_query->have_posts()) :
                                            while ($the_query->have_posts()) : $the_query->the_post();
                                    ?>
                                            <article class="post-block-style-wrapper post-block-template-four">
                                                <div class="post-block-style-inner post-block-list-style-inner">
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
                                        endwhile;
                                        else :
                                    ?>
                                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                                    <?php
                                        endif;
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="blog-pagination-area mt-40">
                                        <?php mg_custom_pagination(); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="blog-pagination-area mt-40">
                                        <ul class="page-numbers">
                                            <li><span aria-current="page" class="page-numbers current">1</span></li>
                                            <li><a class="page-numbers" href="javascript:void(0)">2</a></li>
                                            <li><a class="next page-numbers" href="javascript:void(0)"><i class="icofont-long-arrow-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar blog-sidebar">
                                <div class="section-title">
                                    <h2 class="title-block">
                                        Popular on MAGEMEDIA
                                    </h2>
                                </div>
                                <?php
                                    $args = array(
                                        'post_type'      => 'post', 
                                        'posts_per_page' => 6,
                                        'meta_key'       => 'post_views_count',
                                        'orderby'        => 'meta_value_num',
                                        'order'          => 'DESC',
                                        'category_name'  => 'movie-malem-minggu', // Change this to the desired category
                                    );

                                    $the_query = new WP_Query($args);

                                    if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) : $the_query->the_post();

                                            // Get the full title of the post
                                            $full_title = get_the_title();

                                            // Truncate the title to a shorter length if it exceeds 32 characters
                                            $short_title = mb_strlen($full_title) > 32 ? mb_substr($full_title, 0, 28) . ' [..]' : $full_title;
                                            ?>
                                            <article class="post-block-style-wrapper post-block-template-two most-read-block-list">
                                                <div class="post-block-style-inner post-block-list-style-inner">
                                                    <div class="post-block-media-wrap">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div>
                                                    <div class="post-block-content-wrap">
                                                        <div class="post-item-title">
                                                            <h2 class="post-title">
                                                                <a href="<?php the_permalink(); ?>"><?php echo $short_title; ?></a>
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
                        </div>
                    </div>
                </div>
            </div>