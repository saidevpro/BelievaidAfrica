<?php
/**
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

global $wp_query;
$total_results = get_search_query(  ) ? $wp_query->found_posts : "0";

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<br>
			<div class="container">
				<?php get_search_form( true ); ?>
				<br>
				<h1 class="archive-title">Résultat de la recherche <span class="category-post-count"><?php echo sprintf( $total_results <= 1 ? '%s article' : '%s articles', $total_results)  ?></span></h1>
				<?php if (!get_search_query(  )): 
					get_template_part( 'template-parts/content/content', 'none' );
				elseif ( have_posts() ) : ?>
					<div class="row">
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post();
						?>
							<div class="col-12 col-md-6 col-lg-4">
								<?php
									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content/content', 'excerpt' );
								?>
							</div>
						<?php
						// End the loop.
					endwhile;
					?>
					</div>
					<?php
					// Previous/next page navigation.
					twentynineteen_the_posts_navigation();
					// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content/content', 'none' );
				endif;
				?>
			</div>
			<br>
		</main>
	</div>

<?php
get_footer();
