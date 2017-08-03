<style>
<?php while(the_flexible_field('blocks')): ?>
	<?php
    $id = get_sub_field('custom_id') ? get_sub_field('custom_id') : 'block-'.get_row_index();
		$get_row_layout = get_row_layout();
		$bg_color = get_sub_field('background_color') ;
		$bg_image = get_sub_field('background_image');
		$bg_style = get_sub_field('background_style') ? get_sub_field('background_style') : 'cover';
		$bg_repeat = get_sub_field('repeat_background') ? 'repeat' : 'no-repeat';
	?>

	<?php if(in_array($get_row_layout, array('full', 'photo_and_text', 'location_finder', 'social_links', 'cta', 'masked_content'))): ?>
	<?php if(get_sub_field('background_color') || get_sub_field('background_image')): ?>
	#<?php print $id; ?> {
		background: <?php print get_sub_field('background_color'); ?> <?php if(get_sub_field('background_image')): ?>url('<?php print get_sub_field('background_image')['url']; ?>') <?php print $bg_repeat; ?> center<?php endif; ?>;
		background-size: <?php print $bg_style; ?>;
	}
	<?php endif; ?>
	<?php endif; ?>
<?php endwhile; ?>
</style>
