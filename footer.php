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

<section class="block bg--accent text--white">
	<div class="row">
		<div class="medium-6 columns">
			<h1>The Details Are Still Brewing</h1>
			<p class="subheading">Sign up and be the first to find out</p>
		</div>
		<div class="medium-6 columns">

		</div>
	</div>
</section>

<footer class="main" role="contentinfo">
	<div class="row">
		<div class="medium-6 columns">
			<p class="copyright">&copy; <?php print date('Y'); ?> <?php print get_field('copyright_name', 'options'); ?></p>
		</div>

		<div class="medium-6 columns text-right">
			<a href="#" target="_blank">Terms &amp; Conditions</a> |
			<a href="#" target="_blank">Privacy Policy</a>
		</div>
	</div><!-- .column.row -->
</footer><!-- #colophon -->

</div>

<?php wp_footer(); ?>
</body>
</html>
