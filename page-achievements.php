<?php
/**
 * Template Name: Achievements
 *
 * The template for displaying Achievements page.
 *
 *
 * @package boiler
 */
 
get_header(); ?>
	
	<section class="inner_template full_width page_wrapper">
		<div class="container">
			<?php get_template_part( 'content', 'top-section' ); ?>
			
			<?php if (have_rows('chart')) : ?>
			
				<div class="content_wrap full_width">
				
					<?php while (have_rows('chart')) : the_row()?>
					
							<div class="chart_row">
								<div class="inner_column red">
									<p><?php the_sub_field('year' , false, false); ?></p>
								</div>
								<div class="inner_column gray">
									<p><?php the_sub_field('description' , false, false); ?></p>
								</div>
							</div>
					
					<?php endwhile; ?>
				
				</div><!-- content_wrap  -->
			
			<?php endif; ?>
			
			<div class="image_gallery achievements full_width">
				
				<?php if (have_rows('images')) : ?>

					<?php while (have_rows('images')) : the_row() ?>
						<div class="image_wrap">
							<?php $image =  get_sub_field('image');
								$size = 'thumbnail';
								$thumb = $image['sizes'][ $size ];
								
								if( !empty($image) ):
							?>
									<a class="fancybox" data-fancybox="images" href="<?php echo $image['url']; ?>" data-caption="<?php the_sub_field('description'); ?>">
										<img src="<?php echo $thumb; ?>" />
									</a>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>

			<?php endif; ?>
			
			</div>
		</div><!-- .container -->
	</section>
	
	





<?php get_footer(); ?>