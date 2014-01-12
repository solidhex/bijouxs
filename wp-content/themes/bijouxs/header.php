<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Bijouxs
  * @since Bijouxs 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_front_page() || is_page_template( 'cookbook.php' ) ): ?>
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/jquery.mCustomScrollbar.css" type="text/css">
<?php endif ?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory') ?>/MyFontsWebfontsKit.css">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory') ?>/js/bijouxs.js"></script>
<?php if ( is_product() ): ?>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/jquery.bxslider.css" type="text/css">

<?php endif ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34285436-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed wrapper">
	<header>
		<div class="pipe">
			<a href="<?php bloginfo( 'url' ); ?>"><img id="logo" role="presentation" src="<?php bloginfo( 'template_directory' ); ?>/images/logo.png" width="312" height="83" alt="Bijouxs Logo" title="Bijouxs | Little Treats from the Kitchen"></a>
			<?php echo get_search_form(); ?>
		</div>
		<nav role="navigation" class="site-nav">
			<div class="pipe">
				<ul class="Gothic720BT-RomanB">
				    <li><a href="<?php bloginfo( 'url' ); ?>" <?php if ( is_front_page() ) { echo " class='current'"; } ?>>home</a></li>
				    <li><a href="<?php echo get_permalink( 3752 ); ?>"<?php if ( is_home() || (is_single() && !is_singular('product') && !in_category('recipes')) ) { echo " class='current'"; } ?>>blog</a></li>
				    <li><a href="<?php echo get_category_link( 6 ); ?>"<?php if (in_category( 'recipes' )) { echo "class='current'"; } ?>>recipes</a></li>
				    <li><a href="<?php echo get_first_cookbook(); ?>"<?php if ( is_page_template('cookbook.php') ) { echo " class='current'"; } ?>>cookbook</a></li>
				    <li><a href="<?php echo get_page_link( 3853 ); ?>"<?php if ( is_woocommerce() || is_checkout() || is_cart() ) { echo " class='current'"; } ?>>shop</a></li>
				    <li><a href="<?php echo get_page_link( 2 ); ?>"<?php if (is_page( 'about' )) { echo " class='current'"; } ?>>about</a></li>
				    <li><a href="<?php echo get_page_link( 6 ); ?>"<?php if (is_page( 'contact' )) { echo " class='current'"; } ?>>contact</a></li>
				</ul>
				<div class="sharing-is-caring">
					<a href="https://www.facebook.com/pages/Bijouxs-Little-Kitchen-Jewels/128354523888133" rel="external" id="share-fb"></a>
					<a href="https://twitter.com/bijouxs_com" rel="external" id="share-twitter"></a>
					<a href="http://www.pinterest.com/bijouxs_com/" rel="external" id="share-pinterest"></a>
					<a href="#" rel="external" id="share-picture"></a>
					<a href="#" rel="external" id="share-vimeo"></a>
				</div>
			</div>
		</nav>

		<nav role="navigation" class="site-nav gluey">
			<div class="pipe">
				<a href="<?php bloginfo( 'url' ); ?>" id="static-logo"><img src="<?php bloginfo( 'template_directory' ); ?>/images/static-logo.png" width="123" height="26" alt="Smaller Bijouxs Logo" title="Bijouxs
					 Little Treats from the Kitchen"></a>
				<ul class="Gothic720BT-RomanB">
				    <li><a href="<?php bloginfo( 'url' ); ?>" <?php if ( is_front_page() ) { echo " class='current'"; } ?>>home</a></li>
				    <li><a href="<?php echo get_permalink( 3752 ); ?>"<?php if ( is_home() || (is_single() && !is_singular('product') && !in_category('recipes')) ) { echo " class='current'"; } ?>>blog</a></li>
				    <li><a href="<?php echo get_category_link( 6 ); ?>"<?php if (in_category( 'recipes' )) { echo "class='current'"; } ?>>recipes</a></li>
				    <li><a href="<?php echo get_first_cookbook(); ?>"<?php if ( is_page_template('cookbook.php') ) { echo " class='current'"; } ?>>cookbook</a></li>
				    <li><a href="<?php echo get_page_link( 3853 ); ?>"<?php if ( is_woocommerce() || is_checkout() || is_cart() ) { echo " class='current'"; } ?>>shop</a></li>
				    <li><a href="<?php echo get_page_link( 2 ); ?>"<?php if (is_page( 'about' )) { echo " class='current'"; } ?>>about</a></li>
				    <li><a href="<?php echo get_page_link( 6 ); ?>"<?php if (is_page( 'contact' )) { echo " class='current'"; } ?>>contact</a></li>
				</ul>
				<div class="sharing-is-caring">
					<a href="https://www.facebook.com/pages/Bijouxs-Little-Kitchen-Jewels/128354523888133" rel="external" id="share-fb"></a>
					<a href="https://twitter.com/bijouxs_com" rel="external" id="share-twitter"></a>
					<a href="http://www.pinterest.com/bijouxs_com/" rel="external" id="share-pinterest"></a>
					<a href="#" rel="external" id="share-picture"></a>
					<a href="#" rel="external" id="share-vimeo"></a>
				</div>
			</div>
		</nav>
	</header>
	<?php if ( is_front_page() ): ?>
		<section class="slider">
			<?php
				$posts = get_posts('numberposts=12');
				foreach ($posts as $post) {
					echo get_attached_images( $post->ID, "carousel", TRUE, FALSE, TRUE );
				}
			?>
		</section>

	<?php elseif ( is_page_template('cookbook.php') ): ?>
		<section class="slider">
			<?php echo get_attached_images( $post->ID, "carousel" ); ?>
		</section>
	<?php endif ?>

	<div id="main" role="main">