<?php
/**
 * The Header for our theme.
 *
 * @package boiler
 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    
	<header id="global_header">
			<div class="top_header full_width">
				<div class="container">
					<div class="social">
						<p><?php the_field('social_media_text','options'); ?></p>
						<div class="icons_wrap">
							<?php if (have_rows('social_media_accounts','options')) : ?>
							
								<?php while (have_rows('social_media_accounts','options')) : the_row()?>
									<?php $icon = get_sub_field('social_media_icon', 'options'); ?>
									<a target="_blank" href="<?php the_sub_field('social_media_link','options'); ?>">
										<img class="icon" src="<?php echo $icon['url']; ?>" />
									</a>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="links">
						<?php if (have_rows('header_links', 'options')) : ?>
						
							<?php while (have_rows('header_links', 'options')) : the_row()?>
								
								<?php $post_object = get_sub_field('page_link', 'options'); 
									if($post_object) :
										$post = $post_object;
										setup_postdata( $post );
								?>
										<a class="<?php if(is_page($post->ID)){ echo 'current_page'; } ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<?php 
										wp_reset_postdata();
										endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div><!-- container -->
			</div>
			<div class="bottom_header full_width">
				<div class="container">
					
					<?php $logo = get_field('logo','options'); 
						  $logoMobile = get_field('logo_mobile', 'options');
						  
						if (!empty($logo)) :
					?>
							<div class="logo no_mobile">
								<a href="/"><img src="<?php echo $logo['url']; ?>" /></a>
							</div>
							
						<?php endif; ?>
						<?php if (!empty($logoMobile)) : ?>
							<div class="logo mobile">
								<a href="/"><img src="<?php echo $logoMobile['url']; ?>" /></a>
							</div>
						<?php endif; ?>
					<a class="mobile_menu_icon" href="#">
						<span></span>
						<span></span>
						<span></span>
					</a>
					<div id="header_menu" class="menu">
						<div class="social mobile"></div>
						<nav id="header_nav" role="navigation" class="full_width">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'header_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>
						</nav>
						<div class="mobile_header_links"></div>
						
					</div>
				</div><!-- container -->
			</div>
			
		</div>
	</header>
	<div class="wrapper<?php if(!is_page('home')){ echo " background";} ?>">