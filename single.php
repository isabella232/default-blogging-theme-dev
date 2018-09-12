<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Independent_Publisher_3
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
				get_template_part( 'template-parts/content/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					// comments_template();
				}

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation(
						array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
						)
					);
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'independent-publisher-3' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'independent-publisher-3' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'independent-publisher-3' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'independent-publisher-3' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
						)
					);
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_template_part( 'template-parts/post/post', 'navigation' ); ?>

<?php
get_footer();
