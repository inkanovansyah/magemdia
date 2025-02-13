    <div>
        <footer class="theme-footer-area">
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
                                    <li><a href="#">Terms of Use</a></li>
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