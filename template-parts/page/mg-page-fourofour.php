<?php

/**
 * @author inka novansyah
 */
?>
<div class="vg_navbar_container--divider">
    <h1 class="d-none">404 Halaman tidak ditemukan</h1>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <?php echo do_shortcode(get_theme_mod('mg_theme_customizer_control_header_ads')) ?>
        </div>
    </div>
</div>
<main class="vg--main-wrapper">
    <div class="container mt-4 ">
        <div class="row mb-4">
            <div class="col-12 text-center pt-3">
                <h1 class="font-os-bold mb-0" style="font-size:32px">Halaman Tidak Ditemukan / <br> Halaman Masih Dalam Pengembangan</h1>
            </div>
            <div class="col-12 text-center">
                <h3 class="fs-14">Mungkin Anda tertarik dengan artikel ini</h3>
            </div>
        </div>
        <div class="row">
            <?php
            $recentQuery = new WP_Query(array('posts_per_page' => 6, 'post__not_in' => get_option('sticky_posts')));

            while ($recentQuery->have_posts()) { ?>
                <?php $recentQuery->the_post() ?>
                <div class="col-lg-4 mb-4">
                    <div style="position: relative;border-radius: 16px;overflow: hidden;">
                        <div class="d-flex align-items-start w-100" style="position: absolute;top: 8px;left: 16px;">
                            <div class="py-2">
                                <?php

                                foreach (get_the_category() as $cat) {
                                    echo '  <a href="' . get_category_link($cat) . '" class="vg_pill_cat">' . $cat->name . '</a>';
                                };
                                ?>
                            </div>
                        </div>
                        <a href="<?php the_permalink() ?>">
                            <figure class="mb-0">
                                <?php the_post_thumbnail('small', array('class' => 'img-fluid w-100 rounded_16px')); ?>
                            </figure>
                        </a>

                        <div style="left: 0;right: 0;bottom: 0;background:linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);;position: absolute;display: flex;padding: 24px 24px;flex-direction: column;">
                            <h3 class="h5 font-os-bold mb-0">
                                <a class="text-white" href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h3>
                            <div>
                                <a class="text-white fs-12" href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                                    <?php echo get_the_author() ?>
                                </a>
                                <span class="px-1 text-white fs-12">
                                    -
                                </span>
                                <span class="text-white fs-12">
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            <?php }
            wp_reset_query() ?>
        </div>
    </div>
</main>