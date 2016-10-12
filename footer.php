<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bowtie
 */
?>

</div><!-- #content -->

<footer class="main" role="contentinfo">

	<div class="column row">

		<div class="logo"></div>

		<?php dynamic_sidebar( 'footer' ); ?>

	</div><!-- .column.row -->

</footer><!-- #colophon -->

</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
