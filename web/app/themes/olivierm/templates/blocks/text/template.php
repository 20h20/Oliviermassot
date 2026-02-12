<?php
	$text = get_field('text_content');
	$size = get_field('text_size');
	$color = get_field('text_color');
?>
<section class="cbo-text text--<?php echo $size; ?> <?php echo ($color === 'black') ? 'text--black' : ''; ?>">
	<div class="text-inner cbo-container">
		<div class="cbo-cms">
			<?php echo wp_kses_post($text); ?>
		</div>
	</div>
</section>