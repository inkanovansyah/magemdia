<?php
$pageTagID = get_queried_object()->term_id;

$current_page = get_query_var('paged');
$current_page = max(1, $current_page);

$per_page = 8;
$offset_start = 3;
$offset = ($current_page - 1) * $per_page + $offset_start;

?>
<div class="vg_navbar_container--divider">
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <?php echo do_shortcode(get_theme_mod('vg_theme_customizer_control_header_ads')); ?>
        </div>
    </div>
</div>
<main class="vg--main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php vg_custom_breadcrumbs() ?>
            </div>
            <div class="col-12">
                <div class="d-flex align-items-strecth mb-3">
                    <div class="align-self-center">
                        <span class="vg_accent type__bar hi3"></span>
                    </div>
                    <div class="d-flex align-items-center w-100">
                        <h1 class="font-weight-bold mb-0 mr-4" style="font-size: 32px;"><?php echo single_cat_title() ?></h1>
                    </div>
                </div>
            </div>

            <!-- ris desktop-->
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-lg-8">
                    <div class="row">
                        <!-- heading -->
                        <div class="col-12 mb-4">
                            <div class="swiper-container categoryHeadlineSwiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    $catPostQuery = new WP_Query(array('posts_per_page' => 3, 'tag_id' => $pageTagID));
                                    while ($catPostQuery->have_posts()) {
                                    ?>
                                        <?php $catPostQuery->the_post() ?>
                                        <div class="swiper-slide">
                                            <div style="position: relative;border-radius: 16px;overflow: hidden;">
                                                <a href="<?php the_permalink() ?>">
                                                    <figure class="mb-0">
                                                        <?php the_post_thumbnail('small', array('class' => 'img-fluid w-100 rounded_16px')); ?>
                                                    </figure>
                                                </a>

                                                <div style="left: 0;right: 0;bottom: 0;background:linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);;position: absolute;display: flex;padding: 24px 24px;flex-direction: column;">
                                                    <div class="d-flex align-items-start w-100">
                                                        <div class="py-2">
                                                            <?php

                                                            foreach (get_the_category() as $cat) {
                                                                echo '  <a href="' . get_category_link($cat) . '" class="vg_pill_cat">' . $cat->name . '</a>';
                                                            };
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <h3 class="h5 font-os-bold mb-0 mb-md-3">
                                                        <a class="text-white" href="<?php the_permalink() ?>">
                                                            <?php the_title() ?>
                                                        </a>
                                                    </h3>

                                                    <div class="d-flex align-items-strecth mb-2 text-white">

                                                        <a class="text-white" href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                                                            <?php echo get_the_author() ?>
                                                        </a>
                                                        <span class="px-1 text-white">
                                                            -
                                                        </span>
                                                        <span class="text-white">
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
                            <div class="vg_swiper-scroll--pnbtn prevBtn categoryHeadlineSwiperprev">
                                <i class="fa fa-chevron-left"></i>
                            </div>
                            <div class="vg_swiper-scroll--pnbtn nextBtn categoryHeadlineSwipernext">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </div>
                        <!-- end heading -->

                        <!-- berita terkini -->
                        <div class="col-12">
                            <div class="d-flex align-items-strecth mb-3">
                                <div class="d-flex align-items-center w-100">
                                    <h3 class="font-weight-bold mb-0 mr-4" style="font-size: 24px;"></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        $catPostQuery = new WP_Query(array(
                            'posts_per_page' => $per_page,
                            'offset' => $offset,
                            'paged' => $current_page,
                            'tag_id' => $pageTagID,
                        ));

                        while ($catPostQuery->have_posts()) {
                        ?>
                            <?php $catPostQuery->the_post() ?>
                            <div class="col-lg-6 mb-4">
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
                        <!-- end berita terkini -->
                        <?php vg_custom_pagination() ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- end ris desktop -->


            <!-- Start RIS mobile -->
            <?php if (wp_is_mobile()) : ?>
                <div class="col-lg-8">
                    <div class="row">
                        <!-- heading -->
                        <div class="col-12 mb-4">
                            <div class="swiper-container categoryHeadlineSwiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    $catPostQuery = new WP_Query(array('posts_per_page' => 3, 'tag_id' => $pageTagID));
                                    while ($catPostQuery->have_posts()) {
                                    ?>
                                        <?php $catPostQuery->the_post() ?>
                                        <div class="swiper-slide">
                                            <div style="position: relative;border-radius: 16px;overflow: hidden;">
                                                <a href="<?php the_permalink() ?>">
                                                    <figure class="mb-0">
                                                        <?php the_post_thumbnail('small', array('class' => 'img-fluid w-100 rounded_16px')); ?>
                                                    </figure>
                                                </a>

                                                <div style="left: 0;right: 0;bottom: 0;background:linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);;position: absolute;display: flex;padding: 24px 24px;flex-direction: column;">
                                                    <div class="d-flex align-items-start w-100">
                                                        <div class="py-2">
                                                            <?php

                                                            foreach (get_the_category() as $cat) {
                                                                echo '  <a href="' . get_category_link($cat) . '" class="vg_pill_cat">' . $cat->name . '</a>';
                                                            };
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <h3 class="h5 font-os-bold mb-0 mb-md-3">
                                                        <a class="text-white" href="<?php the_permalink() ?>">
                                                            <?php the_title() ?>
                                                        </a>
                                                    </h3>

                                                    <div class="d-flex align-items-strecth mb-2 text-white">

                                                        <a class="text-white" href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                                                            <?php echo get_the_author() ?>
                                                        </a>
                                                        <span class="px-1 text-white">
                                                            -
                                                        </span>
                                                        <span class="text-white">
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
                            <div class="vg_swiper-scroll--pnbtn prevBtn categoryHeadlineSwiperprev">
                                <i class="fa fa-chevron-left"></i>
                            </div>
                            <div class="vg_swiper-scroll--pnbtn nextBtn categoryHeadlineSwipernext">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </div>
                        <!-- end heading -->
                        <div class="col-12 mb-4">
                            <div class="vg_list-news-small--wrapper">
                                <div class="vg_list-news-small--wrapper__article-list-container">
                                    <?php $latestMobileCat = new WP_Query(array(
                                        'posts_per_page' => $per_page,
                                        'offset' => $offset,
                                        'paged' => $current_page,
                                        'tag_id' => $pageTagID,
                                    ));
                                    while ($latestMobileCat->have_posts()) { ?>
                                        <?php $latestMobileCat->the_post() ?>
                                        <div class="vg_list-news-small--wrapper__article">
                                            <div class="word_container">
                                                <h3 class="font-os-bold mb-1 fs-14">
                                                    <a href="<?php the_permalink() ?>">
                                                        <?php the_title() ?>
                                                    </a>
                                                </h3>
                                                <div class="fs-12">

                                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"> <?php the_author(); ?></a>
                                                    <span class="px-1">
                                                        -
                                                    </span>
                                                    <span>
                                                        <?php echo get_the_date() ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="image_container">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <figure class="mb-0">
                                                            <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid w-100 rounded-lg')); ?>
                                                            <figcaption class="mb-0 small text-secondary text-center d-none" style="font-size: 14px!important;">
                                                                <?php the_post_thumbnail_caption() ?>
                                                            </figcaption>
                                                        </figure>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>

                                    <?php }
                                    wp_reset_query()  ?>
                                </div>
                            </div>
                            <?php vg_custom_pagination() ?>
                            <div class="card shadow-sm border-0 mb-3 overflow-hidden">
                                <?php echo get_theme_mod('vg_theme_customizer_control_sidebar_ads_1'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- end RIS mobile -->



            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="vg_list-news-small--wrapper">

                            <div class="vg_list-news-small--wrapper__title-container">
                                <div class="vg_accent type__circle hi2"></div>
                                <h3 class="font-weight-bold mb-0" style="font-size: 24px;">BERITA POPULER</h3>
                            </div>

                            <div class="vg_list-news-small--wrapper__article-list-container">
                                <?php $popularQeuerySingle = new WP_Query(array(
                                    'posts_per_page' => 5,
                                    'offset' => rand(1, 5),
                                    'meta_key' => 'post_views_count',
                                    'orderby' => array(
                                        'date' => 'DESC',
                                        'meta_value_num' => 'DESC',
                                    )
                                ));
                                while ($popularQeuerySingle->have_posts()) { ?>
                                    <?php $popularQeuerySingle->the_post() ?>
                                    <div class="vg_list-news-small--wrapper__article">
                                        <div class="word_container">
                                            <h3 class="font-os-bold mb-1 fs-14">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_title() ?>
                                                </a>
                                            </h3>
                                            <div class="fs-12">

                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"> <?php the_author(); ?></a>
                                                <span class="px-1">
                                                    -
                                                </span>
                                                <span>
                                                    <?php echo get_the_date() ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="image_container">
                                            <a href="<?php the_permalink() ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <figure class="mb-0">
                                                        <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid w-100 rounded-lg')); ?>
                                                        <figcaption class="mb-0 small text-secondary text-center d-none" style="font-size: 14px!important;">
                                                            <?php the_post_thumbnail_caption() ?>
                                                        </figcaption>
                                                    </figure>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>

                                <?php }
                                wp_reset_query()  ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row" style="position: sticky;top: 128px;">
                    <div class="col-12">
                        <div class="card shadow-sm border-0 mb-3">
                            <?php echo do_shortcode(get_theme_mod('vg_theme_customizer_control_sidebar_ads_2')); ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</main>