<?php
$photos         = $settings->photos;
$photo_size     = $settings->photo_size;
$photo_ratio    = $settings->photo_ratio;
$class_ratio    = $photo_ratio != 'disable' ? 'ratio ratio-' . $photo_ratio : 'ratio-disable';
?>
<div class="vdwd-gallery vdwd-gallery-<?php echo $id; ?>">
    <?php if ($photos) : ?>
        <div class="row">
            <?php foreach ($photos as $key => $photo) : ?>
                <div class="col vdwd-gallery-item">
                    <a href="<?php echo wp_get_attachment_image_src($photo, 'full')[0]; ?>" title="<?php echo wp_get_attachment_caption($photo); ?>">
                        <div class="vdwd-photo position-relative overflow-hidden <?php echo $class_ratio; ?>">
                            <img class="w-100" src="<?php echo wp_get_attachment_image_src($photo, $photo_size)[0]; ?>" alt="Gallery <?php echo $key; ?>" loading="lazy">
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>