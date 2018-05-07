<?php
/**
 * The template for displaying the footer
 *
 * PHP version 7
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */
?>
</div><!-- .site-content -->
<?php include (TEMPLATEPATH . '/templates/widgets/clinics-address.php'); ?>
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12 logo-container">
                    <span class="logo">
                        <a href="<?php echo home_url(); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </span>
                    <div class="social-links">
                        <a class="social-link" href="http://www.facebook.com" target="_blank" rel="nofollow">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                        <a class="social-link" href="http://www.instagram.com" target="_blank" rel="nofollow">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 footer-menu">
                     <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
                </div>
                <div class='col-sm-offset-1 col-sm-4 col-xs-12  footer-newsletter'>
                    <?php include locate_template("templates/newsletter/newsletter.php"); ?>
                </div>
            </div>
        </div>
    </div><!-- .site-info -->
    <div class="copyright">
        <span><?php _e("&copy;2018 ELIXIR - All right reserved");?></span>
    </div>
</footer><!-- .site-footer -->
</div><!-- .site -->
<?php wp_footer(); ?>
</body>
</html>
