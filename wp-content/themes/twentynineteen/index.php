<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<br class="" />
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-8">
							<section>
								<h2 class="sec-title">Article à la Une</h2>
								<?php get_template_part( 'template-parts/section/post', 'stickies' ); ?>
							</section>
						</div>
						<div class="d-none d-lg-block col-lg-4">
							<h2 class="sec-title">Liens utiles</h2>
							<?php get_template_part( 'template-parts/section/post', 'links' ); ?>
						</div>
						<div class="col-12">
							<section>
								<h2 class="sec-title">Derniers articles</h2>
								<div class="row">
									<?php
									if ( have_posts() ) { 
										// Load posts loop.
										while ( have_posts() ) {
											the_post(); ?>
												<div class="col-12 col-md-6 col-lg-4">
													<?php
														get_template_part( 'template-parts/content/content', get_post_format() );
													?>
												</div>
											<?php
										}
									} else {
										// If no content, include the "No posts found" template.
										get_template_part( 'template-parts/content/content', 'none' );
									} 
									?>
								</div>
							</section>
						</div>
					</div>
					<section>
						<h2 class="sec-title">Les articles les plus lu</h2>
						<?php echo wpp_get_mostpopular(array(
							"limit" => 3,
							"wpp_start" => '<div class="row">',
							"wpp_end" => '</div>'
						)); ?>
					</section>
				</div>
			</main><!-- .site-main -->
		</div><!-- .content-area -->
	<br class="mt-5">
<?php
get_footer();
