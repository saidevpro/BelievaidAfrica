<?php
/**
 * Template part for displaying posts
 * Post link format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */



 $post_link_url = esc_url( strip_tags(get_the_content()) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a target="_blank" href="<?php echo $post_link_url; ?>">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title mb-0">', '</h2>' );
        endif;
        ?>
        <div class="entry-content">
            <?php echo sprintf("%s://%s", parse_url($post_link_url, PHP_URL_SCHEME), parse_url($post_link_url, PHP_URL_HOST)); ?>
        </div>
    </a>
</article><!-- #post-<?php the_ID(); ?> -->
 