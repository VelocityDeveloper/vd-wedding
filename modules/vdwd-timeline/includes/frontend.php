<?php
$timelines = $settings->timelines;
// print_r($timelines);
?>

<div class="vdwd-timeline vdwd-timeline-<?php echo $id; ?>">
    <?php if ($timelines) : ?>
        <?php foreach ($timelines as $key => $timeline) : ?>
            <div class="vdwd-timeline-item clearfix pb-4">
                <div class="row <?php echo ($key % 2 == 0) ? 'flex-md-row-reverse' : ''; ?>">
                    <?php if ($timeline->img_src) : ?>
                        <div class="vdwd-timeline-img col-2 col-md-3">
                            <img class="rounded-circle" src="<?php echo $timeline->img_src; ?>" loading="lazy" alt="Story <?php echo $key; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="vdwd-timeline-panel col">
                        <div class="card p-3 p-md-4">
                            <?php if ($timeline->title) : ?>
                                <div class="vdwd-timeline-title fw-bold h5">
                                    <?php echo $timeline->title; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($timeline->subtitle) : ?>
                                <div class="vdwd-timeline-subtitle fst-italic mt-1">
                                    <?php echo $timeline->subtitle; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($timeline->description) : ?>
                                <div class="vdwd-timeline-desc mt-3">
                                    <?php echo $timeline->description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>