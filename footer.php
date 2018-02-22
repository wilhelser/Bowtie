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
	<div class="row">
		<div class="medium-6 columns">
			<?php print do_shortcode('[contact id="address"]'); ?>
			<p class="copyright"><?php print get_field('copyright_name', 'options'); ?> &copy; <?php print date('Y'); ?></p>
		</div>

		<div class="medium-6 columns">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div>
	</div><!-- .column.row -->
</footer><!-- #colophon -->

</div>

<<<<<<< HEAD
<script>
// Browser Update Notification
// < IE 11 < Edge 12 or 6 Months out of date
=======

<script>
// Browser Update Notification
// < IE 11, Edge 12, or 6 Months out of date
>>>>>>> 354a1e7e65899bb979aca846cdaff374a252882e
var $buoop = {vs:{i:12,f:-4,o:-4,s:8,c:-4},api:5};
function $buo_f(){ 
 var e = document.createElement("script"); 
 e.src = "//browser-update.org/update.min.js"; 
 document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
</script>

<?php wp_footer(); ?>
</body>
</html>
