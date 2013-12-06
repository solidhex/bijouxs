<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Bijouxs
  * @since Bijouxs 1.0
 */

get_header(); ?>
SINGLE VIEW?
		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				 <div class="header-hentry"></div>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					 <div class="post-numbering">
        <?php  $mykey_values = get_post_custom_values('number');
		foreach ( $mykey_values as $key => $value ) {
   	    	echo "<span class='pval'>N<sup>o</sup></span><span class='pval' style='position: relative; left: -6px; top: 2px; font-size:30px'>.</span><span class='pval'>".$value."</span>";
  		}




		?>
        </div>
                     <?php if ( in_category( 'recipes' )) {?>
								<div class="talk-bubble" onclick="window.open('<?php echo get_permalink(296); ?>?rid=<?php the_ID(); ?>', 'recipe', 'scrollbars=yes,toolbar=no,resizable=yes,width=596,height=600, screenX=100, screenY=100'); return false;">
								Recipe Card
								</div>
					<?php } ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<!--<?php twentyten_posted_on(); ?>-->
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<div id="as_always">
							<span>As always, enjoy.</span> <img src="<?php echo get_bloginfo('template_directory'); ?>/images/b_.png" width="22" height="22" alt="B " />
							<?php if ( in_category( 'recipes' )) {?>
										<div class="talk-bubble" id="talk-bubble-bottom" onclick="window.open('<?php echo get_permalink(296); ?>?rid=<?php the_ID(); ?>', 'recipe', 'scrollbars=yes,toolbar=no,resizable=yes,width=596,height=600, screenX=100, screenY=100'); return false;">
										Recipe Card
										</div>
							<?php } ?>
							<div style="clear: both;"></div>
						</div>
					</div><!-- .entry-content -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">

					</div><!-- .entry-utility -->

					<div id="post_footer">
						<div id="cats_comments_link">
							<div id="comment_count"><?php comments_number('0 comments', '1 comment', '% comments'); ?></div>
							<span class="the_date"><?php the_date(); ?> &nbsp;|&nbsp; </span><?php the_category(', '); ?>
						</div>
						<div class="comments-share" id="<?php the_ID(); ?>"><a href="#share-item-<?php the_ID();?>" class="sharelink">+ SHARE</a>

							<div class="share-container share-item-<?php the_ID();?>" id="<?php the_ID(); ?>" style="top:0; line-height: 18px;">
									<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>">facebook</a><a class="twitter" href="http://twitter.com/home?status=<?php the_title();?>%20-%20http://www.bijouxs.com/?p=<?php the_ID();?>">twitter</a><a href="mailto:?subject=<?php the_title();?>&body=<?php the_permalink(); ?>">email</a>
									</div>
							</div>
					</div>

				<div id="comments">
					<?php comments_template(); ?>
				</div>

                </div><!-- #post-## -->
                <div class="footer-hentry"></div>
<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span>' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title</span>' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '<span>%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

<?php endwhile; // end of the loop. ?>
<script type="text/javascript" charset="utf-8">
	$(function() {

		$("div.comments-share").hover(function() {
							$(this).children("div.share-container").show();
						}, function() {
								$(this).children("div.share-container").hide();
		});
	});
</script>
<div id="related-posts">
	<h3 class="still-hungry">Still Hungry?</h3>

    <div id="rp-container">
		<?php
    		if (is_front_page()) {
    			$lastposts = get_posts('numberposts=4&orderby=rand');
    		} else {
				$thiscat = get_query_var('cat');
    			$lastposts = get_posts('numberposts=4&cat='.$thiscat.'&orderby=rand&cat=-7');
    		}

			foreach ($lastposts as $post) {
				setup_postdata($post);
		?>
			<div class="hungry <?php echo $class; ?>">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_attached_images( $post->ID, "thumbnail", TRUE ); ?></a>
				<div class="hungry_overlay" style="display: none;"><div class="overlay_inset"><?php the_title(); ?></div></div>
			</div>
		<?php
			}

    	?>
    </div>
</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
