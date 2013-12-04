<?php
/**
 * @package WordPress
 * @subpackage Twenty_Ten
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
						<div class="about_sections">
							<div class="about_thumb"><a href="<?php echo get_category_link(6); ?>"><img src="<?php echo get_bloginfo('template_directory') ?>/images/about_recipes.jpg" width="329" height="225" alt="About Recipes" /></a></div>
							<div class="about_text">
								<h2 id="hdr_about_recipes"><a href="<?php echo get_category_link(6); ?>">Recipes</a></h2>
								<p>Inspired by the classic culinary arts, I strive to keep Bijouxs simple and honest, yet surprising. I share recipes from my collection of cookbooks, which keeps growing, my extensive file of recipe tear sheets dating back 30 years, and of course the little Bijouxs I have collected along the way from travel, classes and those shared by generous cooks. <a href="<?php echo get_category_link(6); ?>">View Recipes&raquo;</a></div></p>
						</div>
						<div class="about_sections">
							<div class="about_thumb"><a href="<?php echo get_category_link(5); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/about_basics.jpg" width="329" height="225" alt="About Basics" /></a></div>
							<div class="about_text">
								<h2 id="hdr_about_basics"><a href="<?php echo get_category_link(5); ?>">Basics</a></h2>
								<p>I have always believed it does not take much to start building the Bijouxs Basics - foundation recipes and cooking techniques coupled with classic cooking equipment and pantry items - you will be well on your way to a Bijouxs Basics kitchen. <a href="<?php echo get_category_link(5); ?>">View Basics&raquo;</a></div></p>
						</div>
						<div class="about_sections">
							<div class="about_thumb"><a href="<?php echo get_permalink(241); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/about_video.jpg" width="329" height="225" alt="About Video" /></a></div>
							<div class="about_text">
								<h2 id="hdr_about_video"><a href="<?php echo get_permalink(434); ?>">Video</a></h2>
								<p>I had a really great time filming some cooking videos for Eat, Drink or Die, a cooking internet channel. The show is titled &quot;What&#x27;s for Dinner Tonight?&quot; and the take aways are short videos with great recipes you can prepare easily. You can play them on your computer, and click on the Recipe Card to get more details. <a href="<?php echo get_permalink(434); ?>">Watch Videos&raquo;</a></div></p>
						</div>
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
		<div class="note">
			<p>Please note: I style and photograph all the Bijouxs blog images, create the content and are all are subject to copyright, unless otherwise specified. Bijouxs blog is a personal point of view, including recipes, photographs, and stories from my kitchen. I share the things I love. I share links to other blogs, websites, etc. but do not exchange links. When my schedule allows I do freelance food and menu styling, and I am currently writing a cookbook.</p> 

			<p><em>Thank you for being a part of Bijouxs.</em></p>
		</div>
	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>