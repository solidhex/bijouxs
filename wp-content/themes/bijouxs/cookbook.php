<?php
	/**
	 * Template Name: Cookbook
	 */
	get_header();
?>
<nav role="navigation" class="cook-sub Gothic720BT-RomanB">
	<ul>
	<?php
		wp_list_pages( 'child_of=3813&title_li=&sort_column=menu_order' );
	?>
	</ul>
</nav>
<div class="cook-info Gothic720BT-RomanB">
	<article>
		<?php if ( have_posts() ): while (have_posts() ) : the_post(); ?>
			<h2 class="Gothic720BT-LightB"><?php the_title(); ?></h2>
			<?php the_content(); ?>
		<?php
				endwhile;
			endif;
		?>
	</article>
</div>

<?php get_footer(); ?>