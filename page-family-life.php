<?php
/**
 * Template Name: Family Life
 *
 * The template for displaying Family Life page.
 *
 *
 * @package boiler
 */
 
get_header(); ?>
	
	<section class="inner_template full_width page_wrapper">
		<div class="container">
			<?php get_template_part( 'content', 'top-section' ); ?>
			
			<div class="main_image full_width">
				<div class="image_wrap">
					<img src="<?php echo bloginfo('template_url'); ?>/images/family_photo.jpg" />
				</div>
			</div>
			
			<?php if (have_rows('images')) : ?>

				<div class="image_gallery family full_width">
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
				</div>
			<?php endif; ?>
				
			
			<?php if (have_rows('videos')) : ?>
				<div class="top_section_template full_width">
					<div class="heading">
						<h2>Video Gallery</h2>
					</div>
				</div>
				<div class="video_gallery full_width">
					<?php while (have_rows('videos')) : the_row() ?>
							<div class="column">

									<?php $videoLink = get_sub_field('video'); 
										if (strpos($videoLink, "youtube") !== false) {
											$str = explode("embed/", $videoLink);
											$embedCode = preg_replace('/\s+/', '',$str[1]);
											$type = "youtube";
										} else {
											$str = explode("video/", $videoLink);
											$embedCode = preg_replace('/\s+/', '', $str[1]);
											$type = "vimeo";
										}
									?>
									<?php if ($type == 'youtube') : ?>
										<a class="video_thumb" data-fancybox data-src="<?php echo $videoLink; ?>?rel=0&showinfo=0&autoplay=1" href="javascript:;">
											<img class="youtube_image" src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" />
										</a>
										<!--
										<div class="video_wrapper youtube_video" data-embed="<?php echo $embedCode; ?>">
											<img class="youtube_image" src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" />
										</div>
										-->
									<?php elseif ($type == 'vimeo') : ?>
											<a class="video_thumb" data-fancybox data-src="<?php echo $videoLink; ?>?autoplay=1" href="javascript:;">
												<img class="vimeo_image" src="?php echo bloginfo('template_url'); ?>/images/lessons-screenshot.jpg" />
											</a>
											<!--
											<div class="video_wrapper vimeo_video" data-embed="<?php echo $embedCode; ?>">
												<img class="vimeo_image" src="<?php echo bloginfo('template_url'); ?>/images/lessons-screenshot.jpg" />
											</div>
											-->
									<?php endif; ?>
									
									<div class="video_title">
										<p><?php the_sub_field('video_title'); ?></p>
									</div>
								
							</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			
		</div><!-- .container -->
		
	</section>
<?php get_footer(); ?>