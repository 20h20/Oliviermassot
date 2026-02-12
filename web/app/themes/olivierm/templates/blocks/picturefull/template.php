<?php
    $picture   = get_field('picturefull_picture');
?>

<section class="cbo-picturefull">
    <div class="picturefull-inner">
        <div class="picturefull-picture cbo-picture-cover">
            <img
                src="<?php echo esc_url($picture['sizes']['small']); ?>"
                srcset="<?php echo esc_url($picture['sizes']['medium']); ?> 320w, 
                    <?php echo esc_url($picture['sizes']['large']); ?> 768w,
                    <?php echo esc_url($picture['sizes']['xlarge']); ?> 1024"
                alt="<?php echo esc_attr($picture['alt']); ?>"
                sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
                decoding="async"
                width="1900" 
                height="900"
            >
        </div>
    </div>
</section>