<?php
/**
 * The template for displaying archive pages
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
				<h1 class="archive-title"><?php single_cat_title( '', true ) ?> <span class="category-post-count"><?php echo sprintf( twentynineteen_get_category_posts_count() < 1 ? "%s article" : "%s articles", twentynineteen_get_category_posts_count()); ?></span></h1>
				<div class="row justify-content-between">
					<div class="col-12">
						<div class="row">
							<?php
							if ( have_posts() ) { 
								// Load posts loop.
								while ( have_posts() ) {
									the_post(); ?>
									<div class="col-12 col-md-6 col-lg-4">
										<?php
											get_template_part( 'template-parts/content/content', 'excerpt' );
										?>
									</div>
									<?php
								}?>
						</div>
						<?php	
								// Previous/next page navigation.
								twentynineteen_the_posts_navigation();

							} else {

								// If no content, include the "No posts found" template.
								get_template_part( 'template-parts/content/content', 'none' );

							} 
						?>
					</div>
				</div>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<br class="mt-5">
<?php
get_footer();
