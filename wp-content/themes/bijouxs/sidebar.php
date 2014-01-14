<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Bijouxs
  * @since Bijouxs 1.0
 */
?>

<div id="primary" class="widget-area" role="complementary">
	<div id="ff_cookbook" class="blog_secondary">
		<a rel="external" href="https://lynn-gray-et32.squarespace.com/new-blog/2013/5/4/bijouxs-ecookbook-no-1-family-friends" alt="Family & Friends">
			<img class="attachment-full" width="216" height="348" title="Family & Friends" alt="Family & Friends" src="<?php echo get_bloginfo("template_directory"); ?>/images/ff-cookbook-ad.jpg">
		</a>
	</div>

	<a href="http://www.feedblitz.com/f/f.fbz?Sub=704048&ajax=4" class="newsletter-button" rel="external"> <small>subscribe to</small> bijouxs newsletter </a>

	<div class="blog_her_ad">
		<!-- BEGIN 160x600 MAIN AD-->
		<script src="http://ads.blogherads.com/bh/29/293/293191/821044/160a.js" type="text/javascript"></script>
		<!-- END 160x600 MAIN AD-->
	</div>

	<div id="our_sponsors">

		<?php echo get_attached_images(839, "full", FALSE); ?>

	</div>

	<div id="latest_news" class="blog_secondary">
		<p id="latest_news_title" class="Gothic720BT-RomanB">LATEST NEWS</p>
		<div id="news_content" class="Gothic720BT-LightB">
		<?php echo get_page_by_title("Latest News")->post_content; ?>
		</div>
	</div>

	<div id="cats">
		<div id="cats_header">
			<h3>FIND MORE</h3>
			<h2>LITTLE <span>JEWELS</span></h2>
		</div>
		<h3 id="hdr_ingredients" class="subcat_header"><a href="#ingredient_subcat">Ingredients</a></h3>
			<ul class="subcats" id="ingredient_subcat">
				<?php wp_list_categories('title_li=&child_of=13'); ?>
			</ul>
		<h3 id="hdr_meal_planning" class="subcat_header"><a href="#meal_planning_subcat">Meal Planning</a></h3>
		<ul class="subcats" id="meal_planning_subcat">
			<?php wp_list_categories('title_li=&child_of=12'); ?>
		</ul>
		<h3 id="hdr_all_categories" class="subcat_header"><a href="#categories_subcat">Categories</a></h3>
		<ul class="subcats" id="categories_subcat">
			<?php wp_list_categories('title_li=&child_of=11'); ?>
		</ul>
	</div>

	<div id="archives">
		<h3 id="hdr_archives">archives</h3>
		<ul id="archives_list" style="display: none;">
			<?php wp_get_archives('type=monthly&limit=12'); ?>
		</ul>
	</div>
</div>