<?php
/**
 * Template Name: Home
 */
?>

<?php
	get_header();
?>

<section class="collection">
	<hgroup>
		<h1>seasonal favorites </h1>
		<h2 class="Gothic720BT-LightB">from the collection</h2>
	</hgroup>
	<?php
		$featured_posts = get_posts( 'numberposts=6&category=150' );
		if ($featured_posts) :
	?>
	<ul>
	    <?php
			foreach ($featured_posts as $post) :
				setup_postdata( $post );
		?>
	    <li>
	        <a href="<?php the_permalink(); ?>"><?php echo get_attached_images( $post->ID, "medium", TRUE ); ?></a>
	        <article>
	            	<h2>
						<?php the_title(); ?>
					</h2>
					<?php the_excerpt(); ?>
	        </article>
	    </li>
	    <?php
			endforeach;
			wp_reset_postdata();
		?>
	</ul>
	<?php endif; ?>
</section>
<div class="sub-nav Gothic720BT-RomanB">
	<a href="http://example.com/">Read all the Little Jewels &raquo;</a>
	<a href="http://example.com/">Get the Cookbook &raquo;</a>
</div>

<?php
	get_footer();
?>