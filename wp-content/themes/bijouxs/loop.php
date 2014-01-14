<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Bijouxs
  * @since Bijouxs 1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php
 	global $query_string;
	query_posts($query_string . '&cat=-7'); ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	  <div class="header-hentry"></div>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
    <div class="footer-hentry"></div>
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php
	while ( have_posts() ) : the_post();
?>

<?php /* How to display posts in the Gallery category. */ ?>
	<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
    <div class="header-hentry"></div>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-meta">
				<?php twentyten_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="gallery-thumb">
							<?php var_dump($image_img_tag); ?>
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'twentyten' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								$total_images
							); ?></em></p>
				<?php endif; ?>
						<?php the_excerpt(); ?>
<?php endif; ?>
			</div><!-- .entry-content -->

			<div class="entry-utility">
				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'twentyten'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'twentyten' ); ?>"><?php _e( 'More Galleries', 'twentyten' ); ?></a>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->
<div class="footer-hentry"></div>
<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) : ?>
      <div class="header-hentry"></div>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

			<div class="entry-utility">
				<?php twentyten_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->
<div class="footer-hentry"></div>
<?php /* How to display all other posts. */ ?>

	<?php else : ?>
      <div class="header-hentry"></div>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="post-numbering">
        <?php  $mykey_values = get_post_custom_values('number');
        if (isset($mykey_values)){
			foreach ( $mykey_values as $key => $value ) {
			echo "<span class='pval'>N<sup>o</sup></span><span class='pval' style='position: relative; left: -6px; top: 2px; font-size:30px'>.</span><span class='pval'>".$value."</span>";
			}
		}



		?>
        </div>
			<?php if ( in_category( 'recipes' )) {?>
						<div class="talk-bubble" onclick="window.open('<?php echo get_permalink(296); ?>?rid=<?php the_ID(); ?>', 'recipe', 'scrollbars=yes,toolbar=no,resizable=yes,width=596,height=600, screenX=100, screenY=100'); return false;">
						Recipe Card
						</div>
			<?php } ?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-meta">
			<!--	<?php twentyten_posted_on(); ?>-->
			</div><!-- .entry-meta -->


			<div class="entry-content">
			<?php the_content("<br /><span>Continue reading</span> " . get_the_title('', '', false) . "&raquo;");?>

				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->


			<div class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
                	<div class="comments-link"><?php comments_popup_link( __( '0 Comments', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></div>

<div class="comments-share" id="<?php the_ID(); ?>"><a href="#share-item-<?php the_ID();?>" class="sharelink">+ SHARE</a>

	<div class="share-container share-item-<?php the_ID();?>" id="<?php the_ID(); ?>" style="top:0;">
			<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>">facebook</a><a class="twitter" href="http://twitter.com/home?status=<?php the_title();?>%20-%20http://www.bijouxs.com/?p=<?php the_ID();?>">twitter</a><a href="mailto:?subject=<?php the_title();?>&body=<?php the_permalink(); ?>">email</a>
			</div>
	</div>
					<span class="cat-links">
						<?php twentyten_posted_on(); ?>
					</span>

				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
					  |	<?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
				<?php endif; ?>

				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->
<div class="footer-hentry"></div>
		<?php comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span>&larr; Older posts</span>', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( '<span>Newer posts &rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>

<div id="related-posts">
	<h3 class="still-hungry">Still Hungry?</h3>

    <div id="rp-container">
		<?php
    		if (is_front_page()) {
    			$lastposts = get_posts('numberposts=4&orderby=rand&cat=-7');
    		} else {
				$thiscat = get_query_var('cat');
    			$lastposts = get_posts('numberposts=4&cat='.$thiscat.'&orderby=rand');
    		}

			foreach ($lastposts as $post) {
				setup_postdata($post);
		?>
			<div class="hungry">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_attached_images( $post->ID, "thumbnail", TRUE ); ?></a>
				<div class="hungry_overlay" style="display: none;"><div class="overlay_inset"><?php the_title(); ?></div></div>
			</div>
		<?php
			}

    	?>
    </div>
</div>