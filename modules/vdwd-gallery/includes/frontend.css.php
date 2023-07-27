<?php
$photo_spacing              = $settings->photo_spacing;
$photo_spacing              = $photo_spacing ? $photo_spacing : 20;
$photo_spacing_medium       = $settings->photo_spacing_medium;
$photo_spacing_medium       = $photo_spacing_medium ? $photo_spacing_medium : $photo_spacing;
$photo_spacing_responsive   = $settings->photo_spacing_responsive;
$photo_spacing_responsive   = $photo_spacing_responsive ? $photo_spacing_responsive : $photo_spacing;
$grid_column                = $settings->grid_column;
$medium_grid_column         = $settings->medium_grid_column;
$responsive_grid_column     = $settings->responsive_grid_column;
$border_photos              = $settings->border_photos;
?>

.vdwd-gallery-<?php echo esc_attr($id); ?> {
position: relative;
}
.vdwd-gallery-<?php echo esc_attr($id); ?> .row {
--bs-gutter-x: <?php echo $photo_spacing; ?>px;
}
.vdwd-gallery-<?php echo esc_attr($id); ?> .vdwd-gallery-item {
flex: 0 0 auto;
width: <?php echo (100 / $grid_column); ?>%;
padding-bottom: <?php echo $photo_spacing; ?>px;
}
.vdwd-gallery-<?php echo esc_attr($id); ?> .ratio::before {
background-color: #000;
}
.vdwd-gallery-<?php echo esc_attr($id); ?> .vdwd-photo img {
opacity: 1;
transition: all .5s;
}
.vdwd-gallery-<?php echo esc_attr($id); ?> .vdwd-photo:hover img {
opacity: .75;
}

@media ( max-width: <?php echo esc_attr($global_settings->medium_breakpoint) . 'px'; ?> ) {
.vdwd-gallery-<?php echo esc_attr($id); ?> .row {
--bs-gutter-x: <?php echo $photo_spacing_medium; ?>px;
}
.vdwd-gallery-<?php echo esc_attr($id); ?> .vdwd-gallery-item {
flex: 0 0 auto;
width: <?php echo (100 / $medium_grid_column); ?>%;
padding-bottom: <?php echo $photo_spacing_medium; ?>px;
}
}

@media ( max-width: <?php echo esc_attr($global_settings->responsive_breakpoint) . 'px'; ?> ) {
.vdwd-gallery-<?php echo esc_attr($id); ?> .row {
--bs-gutter-x: <?php echo $photo_spacing_responsive; ?>px;
}
.vdwd-gallery-<?php echo esc_attr($id); ?> .vdwd-gallery-item {
flex: 0 0 auto;
width: <?php echo (100 / $responsive_grid_column); ?>%;
padding-bottom: <?php echo $photo_spacing_responsive; ?>px;
}
}

<?php echo vdwedd_border_css($settings->border_photos, '.vdwd-gallery-' . $id . ' .vdwd-photo'); ?>