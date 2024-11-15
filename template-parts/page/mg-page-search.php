<?php

/**
 * @author Muhammad Randa Syafridamara
 */



$searchValue = get_query_var('s');
$current_page = get_query_var('paged');
$current_page = max(1, $current_page);

$per_page = 8;
$offset_start = 0;
$offset = ($current_page - 1) * $per_page + $offset_start;


?>

<?php if (!preg_match('/\b(dating|viagra|cialis|porn|fuck)\b/i', $searchValue)) : ?>
  <div class="vg_navbar_container--divider">
  </div>
  <div class="container mt-5 mb-4">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <?php echo do_shortcode(get_theme_mod('vg_theme_customizer_control_header_ads'));  ?>
      </div>
    </div>
  </div>
  <main class="vg--main-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-3 mx-auto order-0 order-lg-1">
          <div class="row">
            <div class="col-12">
              <h1 class="h5">Hasil Pencarian <span class="color-vg-red font-os-bold">"<?php echo get_search_query() ?>"</span></h1>
            </div>
            <div class="col-12">
              <div class="vg_list-news-small--wrapper">
                <div class="vg_list-news-small--wrapper__article-list-container">
                  <?php
                  $catPostQuery = new WP_Query(array(
                    'posts_per_page' => $per_page,
                    'offset' => $offset,
                    'paged' => $current_page,
                    's' => $searchValue,
                  ));
                  if ($catPostQuery->have_posts()) {
                    while ($catPostQuery->have_posts()) { ?>
                      <?php $catPostQuery->the_post() ?>
                      <div class="vg_list-news-small--wrapper__article">
                        <div class="word_container">
                          <h3 class="font-os-bold fs-18">
                            <a href="<?php the_permalink() ?>">
                              <?php the_title() ?>
                            </a>
                          </h3>
                          <div class="mb-3">
                            <?php

                            foreach (get_the_category() as $cat) {
                              echo '  <a href="' . get_category_link($cat) . '" class="vg_pill_cat" style="font-size:12px!important">' . $cat->name . '</a>';
                            };
                            ?>
                          </div>
                          <small>
                            <a class="fs-12" href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                              <?php echo get_the_author() ?>
                            </a>
                            <span class="px-1 fs-12">
                              -
                            </span>
                            <span class="fs-12">
                              <?php echo get_the_date(); ?>
                            </span>
                          </small>
                        </div>
                        <div class="image_container">
                          <figure class="mb-0">
                            <a href="<?php the_permalink() ?>">
                              <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid w-100 rounded_16px')); ?>
                            </a>
                          </figure>
                        </div>
                      </div>
                  <?php }
                  } else {
                    echo 'pencarian tidak ditemukan';
                  }
                  wp_reset_query();
                  ?>
                </div>

              </div>
            </div>
            <div class="col-12">
              <?php vg_custom_pagination() ?>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3 order-2 order-lg-2">
          <div class="row">
            <div class="col-12">
              <div class="vg_list-news-small--wrapper">
                <div class="vg_list-news-small--wrapper__title-container">
                  <div class="vg_accent type__circle hi2"></div>
                  <h3 class="font-weight-bold mb-0" style="font-size: 24px;">BERITA TERKINI</h3>
                </div>

                <div class="vg_list-news-small--wrapper__article-list-container">
                  <?php $popularQeuerySingle = new WP_Query(array(
                    'posts_per_page' => 5,
                    'offset' => rand(1, 32),
                    'orderby' => array(
                      'date' => 'DESC',
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
                <?php echo do_shortcode(get_theme_mod('vg_theme_customizer_control_sidebar_ads_2'))  ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
<?php else : ?>
  <div class="container" style="min-height: 70vh;margin-top: 64px;display:flex;align-items:center">
    <div class="row w-100">
      <div class="col-12 text-center">
      <h1 style="font-weight: bold;">FORBIDEN KEYWORD</h1>
      </div>
    </div>
  </div>
<?php endif ?>