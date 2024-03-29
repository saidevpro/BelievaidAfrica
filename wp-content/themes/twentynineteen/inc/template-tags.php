<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

if ( ! function_exists( 'twentynineteen_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function twentynineteen_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s</span>',
			// !is_home() || !is_archive() ? twentynineteen_get_icon_svg( 'watch', 16 ) : null,
			// esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'twentynineteen_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function twentynineteen_posted_by() {
		?>
			<div class="author-card">
				<span class="tag">Auteur</span>
				<div class="author-profil-picture">
					<img src="<?php echo get_avatar_url(  get_the_author_meta( 'ID' ) ); ?>" alt="Author picture" class="img-fluid">
				</div>
				<div class="author-information">
					<h3 class="author-name"><?php the_author_lastname(); ?>&nbsp;<?php the_author_firstname(); ?></h3>
					<p class="author-description"><?php the_author_description(  ); ?></p>
				</div>
			</div>
		<?php
	}
endif;

if ( ! function_exists( 'twentynineteen_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function twentynineteen_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo twentynineteen_get_icon_svg( 'comment', 16 );

			/* translators: %s: Post title. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentynineteen' ), get_the_title() ) );

			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'twentynineteen_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function twentynineteen_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by
			twentynineteen_posted_by();

			// Posted on
			twentynineteen_posted_on();

			/* translators: Used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'twentynineteen' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of categories. */
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					twentynineteen_get_icon_svg( 'archive', 16 ),
					__( 'Posted in', 'twentynineteen' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: Used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'twentynineteen' ) );
			if ( $tags_list ) {
				printf(
					/* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of tags. */
					'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
					twentynineteen_get_icon_svg( 'tag', 16 ),
					__( 'Tags:', 'twentynineteen' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// Comment count.
		if ( ! is_singular() ) {
			twentynineteen_comment_count();
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'twentynineteen_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function twentynineteen_post_thumbnail() {
		if ( ! twentynineteen_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(null, array("src" => "https://picsum.photos/1200/628?random=".rand(0,100))); ?>
			</figure><!-- .post-thumbnail -->
			<?php
		else :
			?>

		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail' , array("src" => "https://picsum.photos/1200/628?random=".rand(0,100))); ?>
			</a>
		</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'twentynineteen_get_user_avatar_markup' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function twentynineteen_get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}

		return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, twentynineteen_get_avatar_size() ) );
	}
endif;

if ( ! function_exists( 'twentynineteen_discussion_avatars_list' ) ) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 */
	function twentynineteen_discussion_avatars_list( $comment_authors ) {
		if ( empty( $comment_authors ) ) {
			return;
		}
		echo '<ol class="discussion-avatar-list">', "\n";
		foreach ( $comment_authors as $id_or_email ) {
			printf(
				"<li>%s</li>\n",
				twentynineteen_get_user_avatar_markup( $id_or_email )
			);
		}
		echo '</ol><!-- .discussion-avatar-list -->', "\n";
	}
endif;

if ( ! function_exists( 'twentynineteen_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function twentynineteen_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;

if ( ! function_exists( 'twentynineteen_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function twentynineteen_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text"></span>',
					twentynineteen_get_icon_svg( 'chevron_left', 22 )
					// __( 'Newer posts', 'twentynineteen' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text"></span> %s',
					// __( 'Older posts', 'twentynineteen' ),
					twentynineteen_get_icon_svg( 'chevron_right', 22 )
				),
			)
		);
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @since Twenty Nineteen 1.4
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Twenty Nineteen 1.4
		 */
		do_action( 'wp_body_open' );
	}
endif;

if (! function_exists('twentynineteen_the_categories')):
	function twentynineteen_the_categories() {
		?>
			<div class="article-categories">
			<?php echo get_the_category_list(); ?>
			</div>
		<?php
	}	
endif;

if (! function_exists('twentynineteen_the_most_popular_posts')):
	function twentynineteen_the_most_popular_posts() {
		print(
			wpp_get_mostpopular(array(
				"limit" => is_home() ? 4 : 3,
				"wpp_start" => '<div class="row">',
				"wpp_end" => '</div>'
			))
		);
	}	
endif;

if (! function_exists('twentynineteen_social_media_share')):
	function twentynineteen_social_media_share() {
		?>
			<div class="social-media-share">
				<a href="#" class="share-button" title="Partager">
					<i class="fa fa-share-alt"></i>
				</a>
				<ul class="list-style-none">
					<li>
						<a href="#" id="fb-share-button"><i class="fab fa-facebook-square"></i></a>
					</li>
					<li>
						<a href="#"><i class="fab fa-twitter"></i></a>
					</li>
					<li>
						<a href="#"><i class="fab fa-linkedin"></i></a>
					</li>
				</ul>
			</div>
		<?php
	}	
endif;

if (! function_exists('twentynineteen_meta_facebook_api')):
	function twentynineteen_meta_facebook_api() {
		?>
			<meta property="og:url"                content="<?php the_permalink( ); ?>" />
			<meta property="og:type"               content="article" />
			<meta property="og:title"              content="<?php the_title( ); ?>" />
			<meta property="og:description"        content="<?php echo strip_tags(twentynineteen_get_post_excerpt()); ?>" />
			<meta property="og:image"              content="<?php the_post_thumbnail_url( ); ?>" />
		<?php
	}
endif;


