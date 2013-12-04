<h2 class="search-bijouxs">Search Bijouxs</h2>
<div id="search-form-container" class="clearfix">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<label class="hidden" for="s"><?php _e('Search:'); ?></label>
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="image" id="searchsubmit" src="<?php bloginfo('template_directory'); ?>/images/search.gif" value="GO" />
</form>
</div>