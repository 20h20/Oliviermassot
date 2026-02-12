<?php
	$title = get_field('contact_title');
	$chapo = get_field('contact_chapo');
?>

<section id="contact" class="cbo-contact" itemscope itemtype="http://schema.org/ContactPage">
	<div class="contact-inner cbo-container container--small container--padding container--nomargin">
		<div class="contact-picture cbo-picture-contain">
			<img
				decoding="async"
				src="<?php bloginfo('template_directory'); ?>/library/img/taille-crayon.png"
				alt="" sizes="100vw"
				width="368"
				height="330"
				loading="lazy"
			>
		</div>

		<div class="contact-box">
			<?php if($title): ?>
				<div class="box-title cbo-title-2">
					<?php echo wp_kses_post($title); ?>
				</div>
			<?php endif; ?>

			<?php if($chapo): ?>
				<div class="contact-chapo cbo-cms">
					<?php echo wp_kses_post($chapo); ?>
				</div>
			<?php endif; ?>

			<div class="box-form cbo-form">
				<?php
					$posts = get_field('contact_form');
					if( $posts ):
						foreach( $posts as $p ):
							$cf7_id= $p->ID;
							echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
						endforeach;
					endif;
				?>
			</div>
		</div>
	</div>
</section>