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
        <div id="access" role="navigation">
			 <ul id="main_nav">
             	<li id="recipes"><a href="<?php echo get_category_link(6); ?>"><span>Recipes</span></a></li>
                <li id="basics"><a href="<?php echo get_category_link(5); ?>"><span>Basics</span></a></li>
                <li id="video"><a href="<?php echo get_permalink(434); ?>"><span>Video</span></a></li>
                <li id="about"><a href="<?php echo get_permalink(2); ?>"><span>About</span></a></li>
                <li id="contact"><a href="<?php echo get_permalink(6); ?>"><span>Contact</span></a></li>
             </ul>
			</div><!-- #access -->


<div id="our_sponsors">
	<h3 id="hdr_our_sponsors">Our Sponsors</h3>

	<?php echo get_attached_images(839, "full", FALSE); ?>

	<h3 class="become-a-sponsor">Become A Sponsor</h3>
	<a href="/contact">contact us &raquo;</a>
</div>

<div id="definition_container">
	<h3 class="definition">
	Bijoux
	n.; pl. Bijoux. [F.; of uncertain origin.]
	1. A trinket; a jewel; 2. A word applied to anything small and of elegant workmanship.
	</h3>
</div>

<div id="stay_connected">
	<h3 class="widget-title">Stay Connected</h3>
	<a class="rss" href="http://bijouxs.com/feed/" target="_blank">subscribe with rss</a>
	<a class="facebook" href="http://www.facebook.com/pages/Bijouxs/128354523888133" target="_blank">like us on facebook</a>
	<a class="twitter" href="http://twitter.com/bijouxs_com" target="_blank">follow us on twitter</a>
	<a class="youtube" href="http://www.youtube.com/user/mybijouxs4" target="_blank">watch us on youtube</a>
</div>
<div id="newsletter_signup">
	<div id="text-9">
		<h3 class="widget-title">Sign Up for Our Newsletter</h3>
		<div class="textwidget">
			<form method="POST" target='_newsub' action="http://www.feedblitz.com/f/f.fbz?AddNewUserDirect">
			<input type="hidden" name="sub" value="704048"><input name="EMAIL" maxlength="64" type="text" size="25" value="" class="itext"><br>
			<input name="FEEDID" type="hidden" value="704048">
			<input name="PUBLISHER" type="hidden" value="23575231">
			<input name="subcf" type="hidden" value=""><input type="image" src="<?php echo get_bloginfo("template_directory"); ?>/images/signup.gif" class="rollo" value="Subscribe me!" style="float:right; position:relative; top:-10px;">
			<a href="http://www.feedblitz.com/f?previewfeed=704048">Preview</a> | <a href="http://www.feedblitz.com">FeedBlitz</a>

			</form>
		</div>
	</div>
</div>
<div id="find_us_here">
	<h3 id="hdr_find_us_here">Find Us Here</h3>
	<a href="http://www.foodily.com/" target="_blank"><img border="0" src="http://www.foodily.com/images/iblogforfood_125.png" alt="Search for recipes from across the web at Foodily.com" width="125" height="125" /></a>
	<a href="http://foodgawker.com/post/archive/bijouxs/" title="Bijouxs | foodgawker" rel="external"><img src="<?php bloginfo( 'template_directory' ); ?>/images/food_gawker.png" width="125" height="125" alt="Food Gawker" /></a>
	<a rel="external" href="http://www.tastespotting.com/profile/bijouxs/submissions/1" title="bijouxs on TasteSpotting"><img src="<?php bloginfo( 'template_directory' ); ?>/images/tastespotting.png" width="201" height="67" alt="Tastespotting" /></a>
</div>
<div id="coming_soon_cookbook">
	<center><img src="http://bijouxs.com/wp-content/uploads/2010/11/cookbook.gif"></center>
	<h2 class="coming-soon">Coming Soon!</h2>
	A little jewel of a cookbook brimming with 100s of our best recipes, basics and cooking techniques.
</div>
<h2 class="search-bijouxs">Search Bijouxs</h2>
<?php echo get_search_form(); ?>

<div id="foodily_widget_parent">
	<div id="foodily-search-widget"></div>
	<script type="text/javascript">var fdly_search_widget_custom = {width:210,theme:'grey',filters: ["Vegetarian"],limitResultsTo:"Bijouxs Basics"};</script>
	<script type="text/javascript" src="http://blog.foodily.com/wp-content/themes/foodily/javascripts/fdl.searchwidget.min.js"></script>
</div>

<div id="cats">
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
<script type="text/javascript" charset="utf-8">
$(function() {
	archiveList = {
		init: function(elem) {
			var list = $(elem).find("ul");
			list.find("a").last().css({'border-bottom' : 'none'});
			$(elem).hover(function() {
				list.show();
			}, function() {
				list.hide();
			});
		}
	};
	
	archiveList.init("div#archives");
});
</script>
<h3 id="hdr_inspiration">Inspiration</h3>
<ul id="inspiration_links">
	<?php
		$links = get_bookmarks( array(
			'orderby' => 'name',
			'category' => 2
		));
		
		$total = count($links);
		
		foreach ($links as $link) {
			$i++;
			$class = ($total == $i) ? 'last_border' : 'con_border' ;
	?>
		<li class="<?php echo $class; ?>"><a href="<?php echo $link->link_url; ?>" title="<?php echo $link->link_name; ?>" target="_blank"><?php echo $link->link_name; ?></a></li>
	<?php  
		}
	?>
</ul>
</div>