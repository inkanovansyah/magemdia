<?php
// Breadcrumbs
function mg_custom_breadcrumbs()
{
    // Settings
    $breadcrums_class   = 'breadcrumb bg-transparent px-0 mb-0';
    $home_title         = get_bloginfo();
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
    $prefix = 'Archive: '; // Contoh prefix

    // Get the query & post information
    global $post, $wp_query;
    // Do not display on the homepage
    if (!is_front_page()) {
        // Build the breadcrums
        echo '<ul class="' . $breadcrums_class . '">';
        // Home page
        echo '<li class="breadcrumb-item"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
            echo '<li class="breadcrumb-item">' . post_type_archive_title($prefix, false) . '</li>';
        } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if ($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="breadcrumb-item item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="breadcrumb-item active d-none d-lg-block">' . $custom_tax_name . '</li>';
        } else if (is_single()) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if ($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="breadcrumb-item item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }
            // Get post category info
            $category = get_the_category();
            if (!empty($category)) {
                // Get last category post is in
                $category_values = array_values($category); // Simpan hasil array_values ke variabel
                $last_category = end($category_values); // Gunakan variabel tersebut di fungsi end()
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                $cat_parents = explode(',', $get_cat_parents);
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach ($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb-item">' . $parents . '</li>';
                }
            }
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
            }
            // Check if the post is in a category
            if (!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb-item active d-none d-md-inline item-' . $post->ID . '">' . get_the_title() . '</li>';
            } else if (!empty($cat_id)) {
                echo '<li class="breadcrumb-item active d-none d-md-inline breadcrumb-item-' . $cat_id . ' breadcrumb-item-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="breadcrumb-item active d-none d-md-inline item-' . $post->ID . '">' . get_the_title() . '</li>';
            } else {
                echo '<li class="breadcrumb-item active d-none d-md-inline item-' . $post->ID . '">' . get_the_title() . '</li>';
            }
        } else if (is_category()) {
            // Category page
            echo '<li class="breadcrumb-item active breadcrumb-item">' . single_cat_title('', false) . '</li>';
        } else if (is_page()) {
            // Standard page
            if ($post->post_parent) {
                // If child page, get parents 
                $anc = get_post_ancestors($post->ID);
                // Get parents in the right order
                $anc = array_reverse($anc);
                // Parent page loop
                if (!isset($parents)) $parents = null;
                foreach ($anc as $ancestor) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                // Display parent pages
                echo $parents;
                // Current page
                echo '<li class="breadcrumb-item active item-' . $post->ID . '">' . get_the_title() . '</li>';
            } else {
                // Just display current page if not parents
                echo '<li class="breadcrumb-item active item-' . $post->ID . '">' . get_the_title() . '</li>';
            }
        } else if (is_tag()) {
            // Tag page
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms($taxonomy, $args);
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
            // Display the tag name
            echo '<li class="breadcrumb-item active item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '">' . $get_term_name . '</li>';
        } elseif (is_day()) {
            // Day archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            // Day display
            echo '<li class="breadcrumb-item active item-' . get_the_time('j') . '">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';
        } else if (is_month()) {
            // Month Archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
        } else if (is_year()) {
            // Display year archive
            echo '<li class="breadcrumb-item active breadcrumb-item active-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
        } else if (is_author()) {
           // Get the author ID from query var (if on author archive)
           global $author;
            $userdata = get_userdata($author);
            // Display author name
            echo '<li class="breadcrumb-item active breadcrumb-item active-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
        } else if (get_query_var('paged')) {
            // Paginated archives
            echo '<li class="breadcrumb-item active breadcrumb-item active-' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</li>';
        } else if (is_search()) {
            // Search results page
            echo '<li class="breadcrumb-item active breadcrumb-item active-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
        } elseif (is_404()) {
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
        echo '</ul>';
    }
}