<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<div class="container-fluid">
	<div class="row" style="justify-content: center">
		<div class="col-7 col-md-4">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php endif; ?>
		</div>
		<div id="menu__expander">
			<a href="#" class="menu__expander-link">
				<i class="fas fa-bars"></i>
			</a>
		</div>
		<div id="menu__search">
			<a href="<?php echo home_url( '?s=' ) ?>" class="menu__search-link">
				<i class="fa fa-search fa-xs"></i>
			</a>
		</div>
	</div>
</div>

	
