<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Bijouxs
  * @since Bijouxs 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo" class="Gothic720BT-RomanB">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info">
				&copy; 2010 - <?php echo date( 'Y' ); ?> Bijouxs
			</div><!-- #site-info -->

			<div id="site-generator">
			designed by
				<a href="http://www.hidesignhouse.com" target="_blank" rel="generator">
					hidesign
				</a>
			</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7372893-23']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
