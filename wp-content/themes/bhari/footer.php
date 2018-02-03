<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bhari
 */

?>
    <?php bhari_content_bottom(); ?>
    </div><!-- #content -->
    <?php bhari_content_after(); ?>

    <?php bhari_footer_before(); ?>
    <footer id="colophon" class="site-footer" role="contentinfo">
    <?php bhari_footer_top(); ?>

        <div class="site-info">
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'bhari')); ?>">
                <?php printf(esc_html__('Proudly powered by %s', 'bhari'), 'WordPress'); ?>
            </a>
            <span class="sep"> <?php _e('|', 'bhari'); ?> </span>
            <?php printf(esc_html__('Theme: %1$s', 'bhari'), '<a href="http://maheshwaghmare.wordpress.com/" rel="designer">Bhari</a>'); ?>
        </div><!-- .site-info -->

    <?php bhari_footer_bottom(); ?>
    </footer><!-- #colophon -->
    <?php bhari_footer_after(); ?>

</div><!-- #page -->

<?php bhari_body_bottom(); ?>
<?php wp_footer(); ?>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?f93df4aef54645476cc9febff1fccd55";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>
