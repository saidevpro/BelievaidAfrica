<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<br>
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-9">
						<section class="main-post">
							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content/content', 'single' );
							endwhile; 
							?>
						</section>
						<section class="mt-5 mb-5">
							<?php twentynineteen_posted_by(); ?>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<section>
							<h2 class="sec-title">Les articles les plus lu</h2>
							<?php twentynineteen_the_most_popular_posts();  ?>
						</section>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
