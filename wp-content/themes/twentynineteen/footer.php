<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row justify-content-between align-items-start">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="col-12 col-lg-3 mt-3 mt-lg-0">
					<?php dynamic_sidebar( 'sidebar-1' ) ?>
				</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?> 
				<div class="col-12 col-lg-3 mt-3 mt-lg-0">
					<?php dynamic_sidebar( 'sidebar-2' ) ?>
				</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="col-12 col-lg-3 mt-4 mt-lg-0">
					<?php dynamic_sidebar( 'sidebar-3' ) ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
		<br class="mt-5" />
		<div class="site-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php dynamic_sidebar( 'sidebar-4' ) ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
