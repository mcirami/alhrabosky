<?php
/**
 * The template for displaying the footer.
 *
 * @package boiler
 */
?>
	
		<footer id="global_footer" class="site_footer">
			<div class="container">
				<div class="footer_menu">
					<nav role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>
					</nav>
				</div>
				<div class="copy">
					<p>&#169; Copyright 2017 <a href="/">alhrabosky.net</a></p>
					<p>Designed & Developed by <a target="_blank" href="http://mscwebservices.net">MSC Web Services, LLC</a>
				</div>
			</div><!-- .container -->
		</footer>
	</div><!-- wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>