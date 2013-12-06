<?php
/**
 * Template Name: Slider
 */
?>

<?php
	get_header();
?>
<script>
$(window).load(function () {
	$(".slider").mCustomScrollbar("update");
})
</script>
<section class="slider">
			<img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/12/Bijouxs_com-truffles-360x478.jpg" class="attachment-carousel" alt="Bijouxs_com-truffles" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/12/Bijouxs_com-asian-chicken-soup-360x478.jpg" class="attachment-carousel" alt="Bijouxs_com-asian-chicken-soup" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/12/900-360x478.jpg" class="attachment-carousel" alt="900" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/12/Fall-Leaves-5664-680x900-360x478.jpg" class="attachment-carousel" alt="Fall-Leaves-5664-680x900" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/12/city-h-c-680-900-1-360x478.jpg" class="attachment-carousel" alt="city-h-c-680-900-1" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/12/cats-h-g-680-900-6-360x478.jpg" class="attachment-carousel" alt="cats-h-g-680-900-6" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/11/Bijouxs_com-asian-chicken-soup-360x478.jpg" class="attachment-carousel" alt="Bijouxs_com-asian-chicken-soup" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/11/Bijouxs_com-beet-salad-360x478.jpg" class="attachment-carousel" alt="Bijouxs_com-beet-salad" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/11/Bijouxs_com-time-life-belle-360x478.jpg" class="attachment-carousel" alt="Bijouxs_com-time-life-belle" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/11/Bijouxs_com-fettuccine-tuna-360x478.jpg" class="attachment-carousel" alt="Bijouxs_com-fettuccine-tuna" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/10/Bijouxs_com-spice-pumpkin1-360x478.jpg" class="attachment-carousel" alt="Bijouxs_com-spice-pumpkin1" /><img width="360" height="478" src="http://bijouxs.local:8888/wp-content/uploads/2013/10/pumpkin-360x478.jpg" class="attachment-carousel" alt="pumpkin" />		</section>

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

<?php
	get_footer();
?>