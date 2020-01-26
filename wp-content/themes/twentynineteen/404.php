<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-7 col-lg-5">
						<div class="error-404 not-found d-flex align-items-center" style="min-height: 450px">
							<div>
								<header class="page-header">
									<h1 class="page-title" style="color: #fa5252"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' ); ?></h1>
								</header><!-- .page-header -->
				
								<div class="page-content">
									<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentynineteen' ); ?></p>
								</div><!-- .page-content -->
							</div>
						</div><!-- .error-404 -->
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
