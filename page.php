<?php
/**
 * The template for displaying all single pages
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

<div class="content-wrapper">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="content-area">
		<div class="inner-layer">
			<?php 
			while ( have_posts() ) :
				the_post(); ?>
					<article <?php post_class(); ?>>
						<?php scaffold_thumbnail( 'scaffold-blog' ); 
						
						if ( get_edit_post_link() ) :
							edit_post_link( esc_html__( '(Edit)', 'scaffold' ), '<p class="edit-link">', '</p>' );
						endif;
						?>
						<div class="entry-content">
							<?php
							the_content();
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scaffold' ),
									'after'  => '</div>',
								)
							);
							?>

						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				<?php 
			endwhile; ?>

		</div><!-- .inner-layer -->
		<?php get_sidebar(); ?>
	</div><!-- .content-area -->
</div><!-- .content-wrapper -->


<?php get_footer();
