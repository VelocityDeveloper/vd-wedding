<?php
if (isset($settings->id) && !empty($settings->id)) {
    $button_node_id = $settings->id;
} else {
    $button_node_id = $id;
}

$click_action = $settings->click_action;

if ($click_action && ($click_action == 'play')) {
    $link = '#' . $settings->id_targetaudio;
}
if ($click_action && ($click_action == 'calendar')) {
    $textlink   = $settings->text_calendar;
    $loclink    = $settings->location_calendar;
    $timelink   = $settings->time_calendar;
    $timelink   = $timelink ? $timelink['hours'] . ':' . $timelink['minutes'] . ' ' . $timelink['day_period'] : '';
    $datelink   = $settings->date_calendar . $timelink;
    $datelink   = date_format(date_create($datelink), "c");
    $datelink   = str_replace('-', '', $datelink);
    $datelink   = str_replace(':', '', $datelink);
    $datelink   = str_replace('+', '', $datelink);
    $link       = 'https://www.google.com/calendar/event?action=TEMPLATE&text=' . $textlink . '&dates=' . $datelink . '%2F' . $datelink . '&location=' . $loclink . '';
}
?>

<div class="<?php echo $module->get_classname('btn-' . $button_node_id); ?>" data-play="false">

    <a href="<?php echo $link; ?>" data-nodeid="<?php echo $button_node_id; ?>" target="<?php echo $click_action == 'play' ? '_self' : '_blank'; ?>" class="audiotriger fl-button<?php echo ('enable' == $settings->icon_animation) ? 'fl-button-icon-animation' : ''; ?>" <?php echo $module->get_rel(); ?>>

        <?php
        if (!empty($settings->icon) && ('before' == $settings->icon_position || !isset($settings->icon_position))) :
        ?>
            <i class="fl-button-icon fl-button-icon-before <?php echo $settings->icon; ?>" aria-hidden="true"></i>
        <?php endif; ?>

        <?php if (!empty($settings->text)) : ?>
            <span class="fl-button-text"><?php echo $settings->text; ?></span>
        <?php endif; ?>

        <?php
        if (!empty($settings->icon) && 'after' == $settings->icon_position) :
        ?>
            <i class="fl-button-icon fl-button-icon-after <?php echo $settings->icon; ?>" aria-hidden="true"></i>
        <?php endif; ?>

    </a>

    <?php
    if (!empty($settings->link_audio) && $click_action == 'play') :
    ?>
        <audio id="audio<?php echo $button_node_id; ?>" style="width:0px; height:0px;">
            <source src="<?php echo $settings->link_audio; ?>" type="audio/mpeg">
        </audio>

        <div class="position-fixed end-0 bottom-0 mb-5 pt-3 pe-4 audio-volume" style="display: none;">
            <div class="audiotriger btn btn-light pt-2 text-dark shadow rounded-circle" data-nodeid="<?php echo $button_node_id; ?>">
                <div class="audio-on">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-volume-up" viewBox="0 0 16 16">
                        <path d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.473 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z" />
                        <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89l.706.706z" />
                        <path d="M10.025 8a4.486 4.486 0 0 1-1.318 3.182L8 10.475A3.489 3.489 0 0 0 9.025 8c0-.966-.392-1.841-1.025-2.475l.707-.707A4.486 4.486 0 0 1 10.025 8zM7 4a.5.5 0 0 0-.812-.39L3.825 5.5H1.5A.5.5 0 0 0 1 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 7 12V4zM4.312 6.39 6 5.04v5.92L4.312 9.61A.5.5 0 0 0 4 9.5H2v-3h2a.5.5 0 0 0 .312-.11z" />
                    </svg>
                </div>
                <div class="audio-mute" style="display: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-volume-mute" viewBox="0 0 16 16">
                        <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06zM6 5.04 4.312 6.39A.5.5 0 0 1 4 6.5H2v3h2a.5.5 0 0 1 .312.11L6 10.96V5.04zm7.854.606a.5.5 0 0 1 0 .708L12.207 8l1.647 1.646a.5.5 0 0 1-.708.708L11.5 8.707l-1.646 1.647a.5.5 0 0 1-.708-.708L10.793 8 9.146 6.354a.5.5 0 1 1 .708-.708L11.5 7.293l1.646-1.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>