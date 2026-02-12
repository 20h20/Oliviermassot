<?php
    $picture   = get_field('picture_picture');
    $cover   = get_field('picture_cover');
?>
<section class="cbo-picture">
    <div class="picture-inner cbo-container container--small">
        <div class="picture-picture <?= $cover == 0 ? 'cbo-picture-contain' : '' ?> <?= $cover == 1 ? 'cbo-picture-cover' : '' ?>">
            <img 
                src="<?php echo esc_url($picture['sizes']['small']); ?>"
                srcset="<?php echo esc_url($picture['sizes']['small']); ?> 320w, 
                    <?php echo esc_url($picture['sizes']['small']); ?> 768w"
                alt="<?php echo esc_attr($picture['alt']); ?>"
                sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
                decoding="async"
                loading="lazy"
            >
        </div>
    </div>
</section>