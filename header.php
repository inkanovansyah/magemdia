<!DOCTYPE html>
<?php
  
?>

<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       

            <!-- Meta Description dari Yoast -->
       
        <?php
        wp_head();
        ?>
       
        <!-- Meta Data -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/media/favicon.png">
        <title><?php wp_title('MAGE-MEDIA', '|', true, 'right'); ?></title>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-97QB49NB8E"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-97QB49NB8E');
        </script>
        
    </head>

    <body>
    <!-- Site Preloader -->
        <div id="preloader">
            <div class="spinner">
            <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    <!-- Start Header -->
        <header id="theme-header-one" class="theme-header-main header-style-one sticky-top">
            <div class="theme-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="logo theme-logo">
                                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() .'/assets/media/logo.svg'?>" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="nav-menu-wrapper">
                                <div class="mainmenu">
                                    <nav class="nav-main-wrap">
                                        <?php
                                            if ( has_nav_menu( 'primary' ) ) {
                                                wp_nav_menu( array(
                                                    'theme_location' => 'primary',
                                                    'menu_class'     => 'theme-navigation-wrap theme-main-menu', // Sesuaikan dengan kelas CSS Anda
                                                    'walker'         => new mg_nav_walker(),
                                                ));
                                            }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="header-right-wrapper">
                                <div class="header_search_wrap">
                                    <div class="search-icon theme-search-custom-iconn">
                                        <i class="icofont-search-1"></i>
                                    </div>
                                    <div id="theme-serach-box_Inner">
                                        <div class="theme-serach-box_inner_wrapper d-flex align-items-center">
                                            <form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <div class="form-group">
                                                    <input type="text" class="search-input" name="s" id="popup-search" placeholder="Type keywords here....." value="<?php echo get_search_query(); ?>" />
                                                </div>
                                                <button type="submit" id="serach-popup-btn-box" class="search-button submit-btn"><i class="icofont-search-1"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-subscribe">
                                    <a href="#" class="subscribe-btn">Portofolio MALESGERAK</a>
                                </div>
                                <div class="header-burger-menu">
                                    <div class="burger-nav-bar">
                                        <a class="tp-header__bars tp-menu-bar" href="#">
                                            <i class="ri-menu-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
                    <!-- tp-offcanvus-area-start -->