<?php
/**
 * Template Name: About Me
 *
 * The template for displaying About Me page.
 *
 *
 * @package boiler
 */

get_header(); ?>
	
	<section class="about_me full_width page_wrapper">
		<div class="container">
			<div class="top_section_template full_width">
				<div class="heading full_width">
					<h2><?php echo the_title(); ?></h2>
				</div>
			</div>
			<div class="columns full_width">
				<div class="image_wrap no_tablet">
					<?php $image = get_field('image'); 
						if ($image != '') :
					?>
							<img src="<?php echo $image['url']; ?>" />
						<?php endif; ?>
				</div>
				<div class="text_wrap">
					<div class="image_wrap tablet">
						<?php $image = get_field('image'); 
							if ($image != '') :
						?>
								<img src="<?php echo $image['url']; ?>" />
							<?php endif; ?>
					</div>
					<?php echo the_field('page_description'); ?>
					<div class="profile desktop">
						<?php if (have_rows('profile_rows')) : ?>
							<?php while (have_rows('profile_rows')) : the_row()?>
								<div class="row">
									<div class="column">
										<div class="label">
											<p><?php the_sub_field('left_column_label'); ?>:</p>
										</div>
										<div class="value">
											<p><?php the_sub_field('left_column_value'); ?></p>
										</div>
									</div>
									<div class="column">
										<div class="label">
											<p><?php the_sub_field('right_column_label'); ?>:</p>
										</div>
										<div class="value">
											<p><?php the_sub_field('right_column_value'); ?></p>
										</div>
									</div>
									
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div><!-- columns -->
			<div class="profile tablet full_width">
				<?php if (have_rows('profile_rows')) : ?>
					<?php while (have_rows('profile_rows')) : the_row()?>
						<div class="row">
							<div class="column">
								<div class="label">
									<p><?php the_sub_field('left_column_label'); ?>:</p>
								</div>
								<div class="value">
									<p><?php the_sub_field('left_column_value'); ?></p>
								</div>
							</div>
							<div class="column">
								<div class="label">
									<p><?php the_sub_field('right_column_label'); ?>:</p>
								</div>
								<div class="value">
									<p><?php the_sub_field('right_column_value'); ?></p>
								</div>
							</div>
							
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>