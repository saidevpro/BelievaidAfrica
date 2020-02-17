<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentynineteen_post_thumbnail(); ?>
	<div class="entry-description">
		<header class="entry-header">
			<?php
				the_title( sprintf( '<h2 class="entry-title mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>
		</header><!-- .entry-header -->
		<?php twentynineteen_the_categories(); ?>
		<?php twentynineteen_posted_on(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
 