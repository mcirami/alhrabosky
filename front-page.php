<?php
/**
 * Template Name: Home
 *
 * The template for displaying home page.
 *
 *
 * @package boiler
 */

get_header(); ?>

	<section class="home_section">
		<?php $heroImage = get_field('hero_image'); 
			  $heroImageMobile = get_field('hero_image_mobile');
		?>
		
		<a id="hero_mobile" hidden href="<?php if(!empty($heroImageMobile)){ echo $heroImageMobile['url'];} ?>"></a>
		<a id="hero_desktop" hidden href="<?php if(!empty($heroImage)){ echo $heroImage['url'];} ?>"></a>
		
		<div id="hero_section" class="hero full_width" style="background: url(<?php if(!empty($heroImage)){ echo $heroImage['url'];} ?>) no-repeat">
			<div class="container">
				<h2><?php the_field('hero_title'); ?></h2>
				<p><?php the_field('hero_description', false, false); ?></p>
				<div class="icon_wrap">
					<a id="arrow_scroll" href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/arrow-circle-down-red.png" /></a>
				</div>
			</div><!-- .container -->
		</div><!-- hero -->
		<div class="video_section full_width" id="video">
			<div class="container">
				<h3><?php the_field('video_section_title'); ?></h3>
				<p><?php the_field('video_section_description', false, false); ?></p>
				
				<div class="video_wrapper">
					<iframe width="560" height="315" src="<?php echo the_field('video_link'); ?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="button">
					<a class="red" href="<?php the_field('video_section_button_link'); ?>">Read More</a>
				</div>
			</div><!-- .container -->
		</div><!-- video section -->
		<div class="broadcast_section full_width">
			<div class="container">
				<div class="content_wrap full_width">
					<?php $broadcastImage = get_field('broadcast_section_image'); ?>
					
					<div class="image_wrap">
						<img src="<?php if(!empty($broadcastImage)){ echo $broadcastImage['url'];} ?>" />
					</div>
					<div class="text_wrap">
						<?php $title = get_field('broadcast_section_title'); 
							$str = explode(" ", $title);
							
						?>
						<h4><?php echo $str[0]; ?></h4>
						<h3><?php echo $str[1];?></h3>
						<p><?php the_field('broadcast_section_description', false, false); ?></p>
						<a href="<?php the_field('broadcast_section_button_link'); ?>">Read More</a>
					</div>
				</div>
			</div><!-- .container -->
		</div><!-- broadcast section -->
		<div class="achievements_section full_width">
			<div class="container">
				<div class="column">
					<?php $achievementsImage = get_field('achievements_section_image'); ?>
					
					<img src="<?php if(!empty($achievementsImage)){ echo $achievementsImage['url'];} ?>" />
				</div>
				<div class="column">
					<h3><?php the_field('achievements_section_title'); ?></h3>
					<?php if (have_rows('achievements_section_chart')) : ?>
						<?php while (have_rows('achievements_section_chart')) : the_row()?>
								<div class="chart_row">
									<div class="inner_column red">
										<p><?php the_sub_field('year',false, false) ; ?></p>
									</div>
									<div class="inner_column gray">
										<p><?php the_sub_field('description', false, false);  ?></p>
									</div>
									
								</div>
						<?php endwhile; ?>
					<?php endif; ?>
					<div class="button">
						<a class="red" href="<?php the_field('achievements_section_button_link'); ?>">Read More</a>
					</div>
				</div>
			</div><!-- .container -->
		</div><!-- achievements section -->
		<?php $familyImage = get_field('family_section_background_image'); 
			 $familyImageMobile = get_field('family_section_background_mobile'); 
		?>
		
		<a id="family_mobile" hidden href="<?php if(!empty($familyImageMobile)){ echo $familyImageMobile['url'];} ?>"></a>
		<a id="family_desktop" hidden href="<?php if(!empty($familyImage)){ echo $familyImage['url'];} ?>"></a>
		
		<div id="home_family" class="family_section full_width" style="background: url(<?php if(!empty($familyImage)) { echo $familyImage['url'];} ?>) no-repeat;">
			<div class="container">
				<div class="text_wrap">
					<h3><?php the_field('family_section_title'); ?></h3>
					<p><?php the_field('family_section_description', false, false); ?></p>
					<div class="button">
						<a class="white" href="<?php the_field('family_section_button_link'); ?>">Read More</a>
					</div>
				</div>
			</div><!-- .container -->
		</div>
	</section>

<?php get_footer(); ?>