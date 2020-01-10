<?php
/**
 * Custom shortcode for this theme
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

function twentynineteen_social_media_shortcode($attrs) {
    ob_start();
    ?>
        <div class="social-media-container">
            <ul class="social-media-list">
                <?php if(isset($attrs['facebook'])): ?>
                    <li>
                        <a href="<?php echo $attrs['facebook']; ?>" target="_blank" class="social-media-link">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(isset($attrs['twitter'])): ?>
                    <li>
                        <a href="<?php echo $attrs['twitter']; ?>" target="_blank" class="social-media-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(isset($attrs['instagram'])): ?>
                    <li>
                        <a href="<?php echo $attrs['instagram']; ?>" target="_blank" class="social-media-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    <?php
    $template = ob_get_clean();
    return $template;
}

add_shortcode( 'social_media', 'twentynineteen_social_media_shortcode' );

function copyright_shortcode($attrs) {
    return '<p style="margin: 0; font-size: .6rem;">&copy;&nbsp;'.date('Y').'<p>';
}

add_shortcode( 'copyright', 'copyright_shortcode' );