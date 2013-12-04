<?php
/**
 * @package WordPress
 * @subpackage Twenty_Ten
 */

/*
Template Name: Video
*/

get_header();

?>

<div id="container">
	<div id="content" role="main">
		<div class="content_box_extend" style="margin-bottom: 24px;">
			<div class="content_box_bottom">
				<div class="content_box_top">
					<h2 id="hdr_video_page">Video</h2>
					<div id="video_intro">
							<h3 id="hdr_bijouxs_bites">Bijouxs Bites</h3>
							<p>A while ago I had a really great time filming some cooking videos for Eat, Drink or Die, a cooking internet channel. The show is titled &quot;What&#x27;s for Dinner Tonight?&quot; and the take away are short videos with great recipes you can prepare easily. You can watch the videos below and view the recipe card for more details.</p>
					</div>
				</div>
			</div>
		</div>
		<?php if (have_posts()): ?>
			<?php 
				query_posts('cat=7' . '&paged=' . $paged);
				global $more;
				$more = 0;
				while (have_posts()): the_post(); ?>
				      <div class="header-hentry"></div>

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				        <div class="post_numbering_bites">
				        <?php  $mykey_values = get_post_custom_values('number');
						foreach ( $mykey_values as $key => $value ) {
				    	echo "<span class='post_number_val'>".$value."</span>"; 
				  		}




						?>
				        </div>
							<?php if ( in_category( 'recipes' )) {?> 
										<div class="talk-bubble" onclick="window.open('<?php echo get_permalink(296); ?>?rid=<?php the_ID(); ?>', 'recipe', 'scrollbars=yes,toolbar=no,resizable=yes,width=596,height=600, screenX=100, screenY=100'); return false;">
										Recipe Card
										</div>
							<?php } ?>
				<h2 class="entry-title"><?php the_title(); ?></h2>

							<div class="entry-meta">
							<!--	<?php twentyten_posted_on(); ?>-->
							</div><!-- .entry-meta -->


							<div class="entry-content">
							<?php the_content("<br /><span>Continue reading</span> " . get_the_title('', '', false) . "&raquo;");?>

								<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
								<div class="enjoy">
									<em>Enjoy!</em><img src="<?php echo get_bloginfo('template_directory'); ?>/images/b_.png" width="22" height="22" alt="" />
								</div>
								<div class="comments-share" id="<?php the_ID(); ?>">
																<a href="#share-item-<?php the_ID();?>" class="sharelink">+ SHARE</a>

																<div class="share-container share-item-<?php the_ID();?>" id="<?php the_ID(); ?>" style="top:0; line-height: 18px;"><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>">facebook</a><a class="twitter" href="http://twitter.com/home?status=<?php the_title();?>%20-%20http://www.bijouxs.com/?p=<?php the_ID();?>">twitter</a><a href="mailto:?subject=<?php the_title();?>&body=<?php the_permalink(); ?>">email</a></div>
																</div>
							</div><!-- .entry-content -->
						</div><!-- #post-## -->
				<div class="footer-hentry"></div>
				<?php endwhile; ?>
				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
								<div id="nav-below" class="navigation">
									<div class="nav-previous"><?php next_posts_link( __( '<span>&larr; Older posts</span>', 'twentyten' ) ); ?></div>
									<div class="nav-next"><?php previous_posts_link( __( '<span>Newer posts &rarr;</span>', 'twentyten' ) ); ?></div>
								</div><!-- #nav-below -->
				<?php endif; ?>
			<?php else: ?>
			No videos have been uploaded yet. Check back soon!
		<?php endif ?>
		<?php
			/*
			<div class="content_box_extend">
				<div class="content_box_bottom">
					<div class="content_box_top">
							<?php if (have_posts()): ?>
								<?php 
									query_posts('cat=7');
									while(have_posts()): the_post(); 
								?>
									<?php the_content(); ?>
									<div id="enjoy">
										<em>Enjoy!</em><img src="<?php echo get_bloginfo('template_directory'); ?>/images/b_.png" width="22" height="22" alt="" />
									</div>
								<?php endwhile; else: ?>
									No content yet for this page.
							<?php endif ?>
					</div>
				</div>
			</div>
			*/
		?>
		
	</div><!-- #content -->
</div><!-- #container -->
<script type="text/javascript" charset="utf-8">
	$(function() {
				$("div.comments-share").hover(function() {
							$(this).children("div.share-container").show();
						}, function() {
								$(this).children("div.share-container").hide();
				});
			});
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>