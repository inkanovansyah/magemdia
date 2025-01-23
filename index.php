<!DOCTYPE html>
<?php
wp_head();
get_header();
?>
    <?php
        if (is_front_page()) {
                get_template_part('template-parts/page/mg-page', 'home');
            } else if (is_page('store-merchent')) {
                get_template_part('template-parts/page/mg-page-category', 'storemerchent');
            } else if (is_page('asset-digital')) {
                get_template_part('template-parts/page/mg-page', 'category');
            } else if (is_page('order')) {
                get_template_part('template-parts/page/mg-page', 'order');
            } else if (is_page('payment')) {
                get_template_part('template-parts/page/mg-page', 'payment');
            } else if (is_page()) {
                get_template_part('template-parts/page/mg-page', 'page');
            } else if (is_single()) {
                get_template_part('template-parts/page/mg-page', 'singel');
            } else if (is_search()) {
                get_template_part('template-parts/page/mg-page', 'search');
            } else if(is_category()){
                if (is_category('movie-news')){
                    get_template_part('template-parts/page/mg-page-category', 'movie-news');
                } else if(is_category('tv-news')){
                    get_template_part('template-parts/page/mg-page-category', 'tv-news');
                } else if(is_category('reviews')){
                    get_template_part('template-parts/page/mg-page-category', 'reviews');
                } else if(is_category('interview')){
                    get_template_part('template-parts/page/mg-page-category', 'interview');
                } 
            } else if (is_tag()){
                get_template_part('template-parts/page/mg-page', 'tag');
            } else if (is_author()){
                get_template_part('template-parts/page/mg-page', 'author');
            } else {
                get_template_part('template-parts/page/mg-page', 'fourofour');
            }
    ?>
<?php
get_footer();
?>