<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plutonWp
 */
?>
<footer id="colophon" class="site-footer">
    <div class="footer">
        <P> <?php
			echo '&copy;' . get_theme_mod( 'copywright_text' );
			?>
            <a href="<?php echo get_theme_mod( 'website_link' ); ?>"><?php echo get_theme_mod( 'author' ); ?></a></P>
        <!--            <p>&copy; 2013 Theme by <a href="http://www.graphberry.com">GraphBerry</a>, <a href="http://goo.gl/NM84K2">Documentation</a></p>-->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
