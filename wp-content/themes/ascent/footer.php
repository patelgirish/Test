<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package ascent
 */
?>
        </div><!-- close .*-inner (main-content) -->
    </div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container animated fadeInLeft">
        <div class="row">
            <div class="site-footer-inner col-sm-12 clearfix">
            <?php get_sidebar( 'footer' ); ?>
            </div>
        </div>
    </div><!-- close .container -->
    <div id="footer-info">
        <div class="container">
            <div class="site-info">
                <?php do_action( 'ascent_credits' ); ?>
                <a href="https://www.sternandwise.com/" title="<?php esc_attr_e( 'A Management Consulting Firm', 'S&W' ); ?>" ><?php printf( __( '&copy; 2019 S&W. All rights reserved', 'S&W' ), 'S&W' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( __( '%1$s  ', 'S&W' ), 'By'); ?><a href="<?php echo esc_url( __( 'https://www.sternandwise.com/', 'S&W' ) ); ?>" target="_blank"><?php printf( __( 'Stern & Wise Management Consulting', 'S&W' ), 'Stern & Wise' ); ?></a>
            </div><!-- close .site-info -->
        </div>
    </div>
</footer><!-- close #colophon -->
<?php if(of_get_option('enable_scroll_to_top')): ?>
    <a href="#top" id="scroll-top"></a>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
