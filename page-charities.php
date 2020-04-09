<?php
/**
 * Template Name: Charities
 *
 * The template for displaying Charities page.
 *
 *
 * @package boiler
 */

get_header(); ?>

	<section class="inner_template full_width page_wrapper">
		<div class="container">
			
			<?php get_template_part( 'content', 'top-section' ); ?>
			
			<div class="image_gallery charities full_width">
				<?php if (have_rows('charity_logos')) : ?>
					<?php while (have_rows('charity_logos')) : the_row() ?>
					<?php	$image = get_sub_field('logo');
						
						if (!empty($image)) :
					?>
							<div class="image_wrap">
								<a target="_blank" href="<?php the_sub_field('charity_link'); ?>"><img src="<?php echo $image['url']; ?>" /></a>
							</div>
							
						<?php endif; ?>

					<?php endwhile; ?>
				<?php endif; ?>
				
			</div>
		</div><!-- .container -->
	</section>

<?php get_footer(); ?>