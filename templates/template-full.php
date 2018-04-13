<?php
/**
 * Template Name: Full Width (no sidebar)
 * The template for displaying a full width page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bowtie
 */

get_header(); ?>


<main id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'components/content', 'page' ); ?>

	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

<?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php get_footer(); ?>
