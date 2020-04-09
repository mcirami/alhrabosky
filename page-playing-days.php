<?php
/**
 * Template Name: Playing Days
 *
 * The template for displaying Playing Days page.
 *
 *
 * @package boiler
 */
 
get_header(); ?>

	<section class="full_width page_wrapper">
		<div class="container">
			<div class="top_section_template full_width">
				<div class="heading">
					<h2>Statistics</h2>
				</div>
				
			</div>
			<div class="stats_section full_width">
				<div class="top_section full_width">
					<h3>Pitching Statistics:</h3>
					<div class="legend full_width">
						<ul>
							<li><p><span>YR:</span> Year</p></li>
							<li><p><span>TM/LG:</span> Team/League</p></li>
							<li><p><span>G:</span> Games</p></li>
							<li><p><span>W:</span> Win</p></li>
							<li><p><span>L:</span> Loss</p></li>
							<li><p><span>PCT:</span> Winning Percentage</p></li>
							<li><p><span>IP:</span> Innings Pitched</p></li>
							<li><p><span>H:</span> Hits</p></li>
							<li><p><span>BB:</span> Base on Balls</p></li>
							<li><p><span>SO:</span> Strikeouts</p></li>
							<li><p><span>ERA:</span> Earned Run Average</p></li>
						</ul>
					</div>
				</div><!-- top section -->
				<div class="image_wrap full_width">
					<img src="<?php echo bloginfo('template_url'); ?>/images/stats.jpg" />
				</div>
				
			</div><!-- stats section -->
			<div class="slider_section full_width">
				<div class="top_section_template full_width">
					<div class="heading">
						<h2>Baseball Cards</h2>
					</div>
					
				</div>
				<div class="image_slider full_width" id="baseball_cards">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php if (have_rows('slider_images')) : ?>
								<?php while (have_rows('slider_images')) : the_row()?>
										<div class="swiper-slide">
											<h3><?php the_sub_field('slide_title'); ?></h3>
											<?php 
												$imageLeft = get_sub_field('left_column_image');
												$imageRight = get_sub_field('right_column_image');	
											 ?>
											
											<div class="full_width">
												<?php if (!empty($imageLeft)) : ?>
														<img src="<?php echo $imageLeft['url']; ?>" />
												<?php endif; ?>
												<?php if (!empty($imageRight)) : ?>
														<img src="<?php echo $imageRight['url']; ?>" />
												<?php endif; ?>
											</div>
										</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div><!--  swiper wrapper -->
						 
					</div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div><!-- container -->
	</section>

<?php get_footer(); ?>