<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bowtie
 */

$background = get_field('hero_background_image');

get_header(); ?>

<div class="hero <?php print get_field('hero_disabled') ? 'disabled' : ''; ?>">
  <div class="row small-12 columns">
    <div class="content">
  		<h1><?php the_field('headline'); ?></h1>
      <p class="subheading"><?php the_field('hero_copy'); ?></p>

      <form class="form">
        <div class="field">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="john@mail.com" />
          <p class="description">By signing up, you accept the <a href="#">Terms &amp; Conditions</a></p>
        </div>
        <input type="submit" value="Sign Up" />
      </form>
    </div>
  </div>
</div>

<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'components/content', 'page' ); ?>

	<?php endwhile; // End of the loop. ?>

	<?php get_template_part( 'components/content', 'blocks' ); ?>
  <?php get_template_part( 'components/styles', 'blocks' ); ?>

	<?php //get_sidebar(); ?>

</main><!-- #main -->

<?php if($background['type'] == 'image') { ?>
<style>
	.hero {
		background: url('<?php print wp_get_attachment_url($background['ID']); ?>') no-repeat center!important;
		background-size: cover!important;
	}
</style>
<?php } ?>

<?php get_footer(); ?>
