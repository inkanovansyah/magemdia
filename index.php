<!DOCTYPE html>
<?php
wp_head();

get_header();


?>
    <?php
        if (is_front_page()) {
                get_template_part('template-parts/page/mg-page', 'home');
            } else if (is_single()) {
                get_template_part('template-parts/page/mg-page', 'singel');
            } else if(is_page()){
                get_template_part('template-parts/page/mg-page', 'page');
            } else if (is_search()) {
                get_template_part('template-parts/page/mg-page', 'search');
            } else if(is_category()){
                if (is_category('store-merchent')){
                    get_template_part('template-parts/page/mg-page-category', 'storemerchent');
                } else if (is_category('asset-digital')){
                    get_template_part('template-parts/page/mg-page', 'category');
                } else if(is_category('jalan-jalan-murah')){
                    get_template_part('template-parts/page/mg-page-category', 'jalan-jalan');
                } else if(is_category('movie-malem-minggu')){
                    get_template_part('template-parts/page/mg-page-category', 'movie');
                } else if(is_category('rakit-pc-lu')){
                    get_template_part('template-parts/page/mg-page-category', 'rakit-pc');
                } else if(is_category('front-end')){
                    get_template_part('template-parts/page/mg-page-category', 'front-end');
                }  else if(is_category('order')){
                    get_template_part('template-parts/page/mg-page', 'order');
                }  else if(is_category('payment')){
                    get_template_part('template-parts/page/mg-page', 'payment');}
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