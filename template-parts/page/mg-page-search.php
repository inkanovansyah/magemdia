<?php

/**
 * @author inka novansyah
 */



$searchValue = get_query_var('s');
$current_page = get_query_var('paged');
$current_page = max(1, $current_page);

$per_page = 8;
$offset_start = 0;
$offset = ($current_page - 1) * $per_page + $offset_start;


?>

<?php if (!preg_match('/\b(dating|viagra|cialis|porn|fuck)\b/i', $searchValue)) : ?>
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
  <div class="theme-blog-page-area mb-80">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <?php
              $args = array(
                's' => $searchValue,
                'posts_per_page' => $per_page,
                'paged' => $current_page,
                'offset' => $offset,
              );
              $search_query = new WP_Query($args);

              if ($search_query->have_posts()) :
                while ($search_query->have_posts()) : $search_query->the_post();
              ?>
                  <article class="post-block-style-wrapper post-block-template-two most-read-block-list">
                    <div class="post-block-style-inner post-block-list-style-inner">
                      <div class="post-block-media-wrap">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
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
                            <?php echo get_the_date('M d, Y'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                  <?php
                endwhile;
                else :
                  echo '<div class="col-lg-12"><p>No articles found matching your search.</p></div>';
                endif;
                wp_reset_postdata();
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
        </div>
        <div class="col-lg-4">
          <div class="sidebar blog-sidebar">
            <div class="section-title">
              <h2 class="title-block">
                Popular on Magecine
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
  <?php else : ?>
    <div class="container" style="min-height: 70vh;margin-top: 64px;display:flex;align-items:center">
      <div class="row w-100">
        <div class="col-12 text-center">
        <h1 style="font-weight: bold;">FORBIDEN KEYWORD</h1>
        </div>
      </div>
    </div>
  <?php endif ?>