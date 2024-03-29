<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<section class="col-12 text-center no-results not-found">
	<!-- <header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentynineteen' ); ?></h1>
	</header> -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: Link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentynineteen' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>
			<div class="row justify-content-center">
				<div class="col-12 col-sm-6 col-md-7">
					<?php if(get_search_query(  )): ?>
					<?php get_template_part( 'template-parts/svg/nocontent' ); ?>
					<br class="mt-2">
					<p class="mt-2 text__notice">
						Désolé rien ne correspond à votre recherche. <br> Veuillez réessayer avec des mots différents
					</p>
					<?php else: ?>
					<p class="mt-5 text__notice">Veuillez entrer votre mot de recherche dans la barre de recherche.</p>
					<?php endif; ?>
				</div>
			</div>
			<?php
		else :
			?>
			<div class="row justify-content-center">
				<div class="col-12 col-sm-9 col-md-6">
					<?php get_template_part( 'template-parts/svg/nocontent' ); ?>
					<p class="mt-3 text__notice" style="color: #828282">
						<?php if (is_category(  )): ?>
							Désolé, cette catégorie n'a pas encore de contenu. <br>
							Veuillez réessayer plutard ou faites une recherche.
						<?php else: ?>
							Nous avons pas trouvé ce que vous cherchez. <br> Une recherche pourrait vous être utile.
						<?php endif; ?>
					</p>
				</div>
			</div>
			<?php
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
