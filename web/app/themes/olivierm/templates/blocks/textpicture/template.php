<?php
	$summary	= get_field('textpicture_summary');
?>

<section class="cbo-textpicture">
	<div class="textpicture-inner cbo-container">

		<?php
			if ($summary == 1 && have_rows('textpicture_list')) :
			$rows = get_field('textpicture_list');
		?>
			<nav class="textpicture-summary">
				<div class="summary-inner">
					<span class="summary-title">
						<span id="filter-label">Sommaire</span>
					</span>

					<ul class="summary-list" aria-labelledby="filter-label" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="Sommaire">
						<?php foreach ($rows as $i => $row) :
							if (!empty($row['textpicture_title'])) :
							$anchor = 'bloc-' . ($i + 1);
						?>
							<li>
								<a href="#<?php echo esc_attr($anchor); ?>">
									<?php echo esc_html($row['textpicture_title']); ?>
								</a>
							</li>
						<?php
							endif;
							endforeach;
						?>
					</ul>
				</div>
			</nav>
		<?php
			endif;
		?>

		<div class="textpicture-list">
			<?php
				if (have_rows('textpicture_list')):
				$index = 0;
				while (have_rows('textpicture_list')): the_row();
				$index++;
				$anchor = 'bloc-' . $index;
				$title	= get_sub_field('textpicture_title');
				$time	= get_sub_field('textpicture_time');
				$subtitle	= get_sub_field('textpicture_subtitle');
				$content	= get_sub_field('textpicture_content');
				$soundcloud	= get_sub_field('textpicture_soundcloud');
				$mediatype	= get_sub_field('textpicture_mediatype');
				$videourl	= get_sub_field('textpicture_video');
				$picture	= get_sub_field('textpicture_picture');
				$picturepos	= get_sub_field('textpicture_mediapos');
			?>
				<div class="textpicture-box textpicture--<?php echo $picturepos; ?>" id="<?php echo esc_attr($anchor); ?>">
					<div class="textpicture-media">
						<?php if($mediatype == 'picture'): ?>
							<div class="media-picture cbo-picture-cover">
								<img
									src="<?php echo esc_url($picture['sizes']['medium']); ?>"
									srcset="<?php echo esc_url($picture['sizes']['small']); ?> 320w, 
										<?php echo esc_url($picture['sizes']['medium']); ?> 768w, 
										<?php echo esc_url($picture['sizes']['large']); ?> 1024w"
									alt="<?php echo esc_attr($picture['alt']); ?>"
									sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
									loading="lazy"
									decoding="async"
									width="1000" 
									height="1000"
								>
							</div>
						<?php endif; ?>

						<?php if($mediatype == 'video'): ?>
							<div class="media-video">
								<?php echo $videourl; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="textpicture-content">
						<div class="content-inner">
							<?php if($title): ?>
								<div class="content-title cbo-title-2" itemprop="headline">
									<?php echo wp_kses_post($title); ?>
								</div>
							<?php endif; ?>

							<?php if($time): ?>
								<div class="content-time cbo-title-3">
									<i class="icon icon--timer"></i> <?php echo esc_html($time); ?>
								</div>
							<?php endif; ?>

							<?php if($subtitle): ?>
								<div class="content-subtitle cbo-title-3">
									<?php echo esc_html($subtitle); ?>
								</div>
							<?php endif; ?>

							<?php if($content): ?>
								<div class="content-text cbo-cms">
									<?php echo wp_kses_post($content); ?>
								</div>
							<?php endif; ?>

							<?php if($soundcloud): ?>
								<div class="content-soundcloud" itemscope itemtype="https://schema.org/AudioObject">
									<meta itemprop="name" content="Composition d'Olivier Massot">
									<?php echo do_shortcode('[soundcloud]'.$soundcloud.'[/soundcloud]'); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>