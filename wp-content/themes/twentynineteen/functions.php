<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentynineteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'header-menu' => __( 'Primary', 'twentynineteen' ),
				'footer_about' => __( 'Footer - About', 'twentynineteen' ),
				'footer_topics' => __( 'Footer - Topics', 'twentynineteen' ),
				'social' => __( 'Social Links Menu', 'twentynineteen' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);
		/**
		 * Add support post format
		 */
		add_theme_support( 'post-formats', array('link', 'quote', 'video'));

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 310,
				'height'      => 60,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => 'default' === get_theme_mod( 'primary_color' ) ? __( 'Blue', 'twentynineteen' ) : null,
					'slug'  => 'primary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => 'default' === get_theme_mod( 'primary_color' ) ? __( 'Dark Blue', 'twentynineteen' ) : null,
					'slug'  => 'secondary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer Left', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear to the left of the footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Center', 'twentynineteen' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear to the center of the footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Right', 'twentynineteen' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear to the right of the footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Bottom','twentynineteen' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear to the bottom of the footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget footer-widget-bottom mb-0 %2$s">',
			'after_widget'  => '</section>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {
	wp_enqueue_style( 'Roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap', array());

	wp_style_add_data( 'twentynineteen-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '20181214', true );
		wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '20181231', true );
	}
	wp_enqueue_script('jquery', get_theme_file_uri( '/js/jquery.js' ), array());
	wp_enqueue_script('bootstrapjs', get_theme_file_uri( '/js/bootstrap.min.js' ), array('jquery'));
	wp_enqueue_script('twentyninteeen-main-js', get_theme_file_uri( '/js/app-main.js' ), array('bootstrapjs'));

	wp_enqueue_style('bootstrap-style', get_theme_file_uri( '/style/bootstrap.min.css'), array());
	wp_enqueue_style('fontawesome-solid', get_theme_file_uri( '/style/solid.min.css'), array());
	wp_enqueue_style('fontawesome-icon', get_theme_file_uri( '/style/fontawesome.min.css'), array('fontawesome-solid'));
	wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
	wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles() {

	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function twentynineteen_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo twentynineteen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentynineteen_colors_css_wrap' );

/**
 * ADD THIRD PARTY API META IN THE HEADER
 */
function twentynineteen_add_api_header() {
	if (is_single(  )) {
		twentynineteen_meta_facebook_api();
	}
}
add_action( 'wp_head', 'twentynineteen_add_api_header' );

/**
 * Add Script to the footer
 */
function twentynineteen_footer_scripts() {
	?>
	<script>
	window.fbAsyncInit = function() {
		FB.init({
		appId            : '<?php echo FACEBOOK_APP_ID ?>',
		autoLogAppEvents : true,
		xfbml            : true,
		version          : 'v6.0'
		});
	};
	</script>
	<script async defer src="https://connect.facebook.net/<?php echo get_locale(); ?>/sdk.js"></script>
	<script>
		var fbButton = document.getElementById('fb-share-button');
		var url = window.location.href;

		fbButton.addEventListener('click', function(e) {
			e.preventDefault();
			window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
				'facebook-share-dialog',
				'width=800,height=600'
			);
			return false;
		});
	</script>
	<?php
}

add_action( 'wp_footer', 'twentynineteen_footer_scripts' );


/**
 * Modify the main query
 * @param WP_Query $query
 * @return null
 */
function twentynineteen_modify_main_query($query) {
	if ($query->is_home() && $query->is_main_query()) {
		$query->set('ignore_sticky_posts', 1);
		$query->set( 'posts_per_page', 6);
		$query->set('tax_query', array(
			array(                
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 
					'post-format-aside',
					'post-format-chat',
					'post-format-link',
					'post-format-quote',
				),
				'operator' => 'NOT IN'
			)
			));
	}
    if ( $query->is_category() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 6);
	}
	
	if ($query->is_search() && $query->is_main_query()) {
		$query->set( 'posts_per_page', 6);
		$query->set('post_type', 'post');
		$query->set('tax_query', array(
			array(                
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 
					'post-format-aside',
					'post-format-chat',
					'post-format-link',
					'post-format-quote',
				),
				'operator' => 'NOT IN'
			)
			));
	}
}
add_action( 'pre_get_posts', 'twentynineteen_modify_main_query' );

/**
 * 	Customize wpp post html
 */
function twentynineteen_wpp_custom_post_html($post_html, $popular_post) {
	$query = new WP_Query(array("p" => $popular_post->id));
	ob_start();
	while($query->have_posts()) {
		$query->the_post(); 
		get_template_part( 'template-parts/content/content', 'wpp' );
	}
	$post_content = ob_get_clean();
	return $post_content;
}
add_filter( 'wpp_post', 'twentynineteen_wpp_custom_post_html', 10, 2 );
/**
 * Change WPP's 'Sorry. No data so far.' message
 */
function twentynineteen_wpp_no_data( $no_data_html ){
    $output = '<p class="mt-3 mb-3 text-center text__notice">Pas de données à afficher</p>';
    return $output;
}
add_filter( 'wpp_no_data', 'twentynineteen_wpp_no_data', 10, 1 );

/**
 * ShortCode 
 */
require get_template_directory() . '/inc/shortcode-functions.php';

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
