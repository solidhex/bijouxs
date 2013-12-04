<?php
/**
 * @package WordPress
 * @subpackage Bijouxs
 */

/*
Template Name: About
*/

get_header();

?>

<div id="container">
	<div id="content" role="main">
		<div class="content_box_extend">
			<div class="content_box_bottom">
				<div class="content_box_top">
					<h2 id="hdr_about_bijouxs">About Bijouxs</h2>
					<img id="about_image" src="<?php echo get_bloginfo('template_directory'); ?>/images/about_bijouxs.jpg" width="679" height="475" alt="About Bijouxs" />
					<div class="gutter">
						<?php if (have_posts()): ?>
							<?php while(have_posts()): the_post(); ?>
								<?php the_content(); ?>
								<div id="enjoy">
									<em>Enjoy!</em><img src="<?php echo get_bloginfo('template_directory'); ?>/images/b_.png" width="22" height="22" alt="" />
								</div>
							<?php endwhile; else: ?>
								No content yet for this page.
						<?php endif ?>

						<?php
							$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
							foreach($pagekids as $childPage){ ?>
								<div class="about_sections">
									<div class="about_thumb"><?php echo get_attached_images($childPage->ID, 'large', TRUE, '', '' ); ?></div>
									<div class="about_text">
										<?php echo $childPage->post_content ?>
									</div>
								</div>
							<?php } ?>

						<script type="text/javascript" charset="utf-8">
							$(function() {
								$("div.about_sections").each(function(i) {
									if (i == 1) {
										$(this).css({'margin-bottom': '32px', 'margin-top' : '28px'});
									};
									if (i == 2) {
										$(this).css({'padding-bottom' : '32px'});
									};
								});
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>