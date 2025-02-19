<?php
function mg_custom_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    // Menambahkan tag rel="prev" dan rel="next"
    if ($paged > 1) {
        echo '<link rel="prev" href="' . get_pagenum_link($paged - 1) . '" />';
    }
    if ($paged < $pages) {
        echo '<link rel="next" href="' . get_pagenum_link($paged + 1) . '" />';
    }

    if (1 != $pages) {
        echo '<ul class="page-numbers">';
        if ($paged > 1 && $showitems < $pages) echo '<li><a class="page-numbers" href="' . get_pagenum_link($paged - 1) . '"><i class="icofont-long-arrow-right"></i></a></li>';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo '<li><a class="page-numbers" href="' . get_pagenum_link(1) . '">1</a></li>';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo '<li><span class="page-link bg-white border-0 text-dark">...</span></li>';

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? '<li class="page-item current"><a class="page-numbers current" href="#currentPage">' . $i . "</a></li>" : '<li class="page-item"><a class="page-numbers" href="' . get_pagenum_link($i) . '">' . $i . "</a> </li>";
            }
        }

        if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo '<li><span class="page-numbers bg-white border-0 text-dark">...</span></li>';
        if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo '<li><a class="page-numbers" href="' . get_pagenum_link($pages) . '">' . $pages . '</a></li>';
        if ($paged < $pages && $showitems < $pages) echo '<li><a class="page-numbers" href="' . get_pagenum_link($paged + 1) . '"><i class="fa fa-chevron-right"></i></a></li>';
        echo "</ul>\n";
        echo '<div class="d-flex justify-content-center w-100 py-2">';
        echo '<div class="mr-1"><b class="mr-1">'.$paged. '</b></div>';
        echo '<div class="ml-1"> Dari <span class="text-secondary">' . $wp_query->max_num_pages . '</span> Halaman</div>';
        echo '</div>';
    }
}
