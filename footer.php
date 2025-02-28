    <div>
        <footer class="theme-footer-area">
            <div class="footer-top pt-20 pb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="footer-widget widget">
                                <div class="footer-logo">
                                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() .'/assets/media/logo.svg'?>" alt="Logo"></a>
                                </div>
                                <div class="footer-social">
                                    <a href="<?php echo get_option('facebook_url'); ?>" target="_blank"><i class="icofont-facebook"></i></a>
                                    <a href="<?php echo get_option('twitter_url'); ?>" target="_blank"><i class="icofont-twitter"></i></a>
                                    <a href="<?php echo get_option('instagram_url'); ?>" target="_blank"><i class="icofont-instagram"></i></a>
                                    <a href="<?php echo get_option('youtube_url'); ?>" target="_blank"><i class="icofont-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copyright-text">
                                <p>Copyright ©  <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All rights reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-menu">
                                <ul class="footer-nav">
                                    <li><a href="<?php echo home_url();?>/privacy-policy">Privacy Policy</a></li>
                                    <li><a href="<?php echo home_url();?>/about">About</a></li>
                                    <li><a href="<?php echo home_url();?>/contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <span class="scrolltotop"><i class="ri-arrow-up-s-line"></i></span>
    </div>
    <?php wp_footer() ?>
</body>