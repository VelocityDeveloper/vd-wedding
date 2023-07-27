<?php
$rekenings = $settings->rekenings;
?>

<div class="vdwd-rekenings vdwd-rekenings-<?php echo $id; ?>">

    <?php if ($rekenings) : ?>
        <div class="row">
            <?php foreach ($rekenings as $key => $rek) : ?>
                <div class="col-md">
                    <div class="vdwd-rekenings-item text-center">
                        <?php if ($rek->img_src) : ?>
                            <div class="vdwd-rekenings-logo mb-3">
                                <img class="w-auto" style=" max-height: 150px; " src="<?php echo $rek->img_src; ?>" loading="lazy" height="50" alt="Logo Bank">
                            </div>
                        <?php endif; ?>
                        <?php if ($rek->norek) : ?>
                            <div class="vdwd-rekenings-norek">
                                Nomor Rekening : <?php echo $rek->norek; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($rek->title) : ?>
                            <div class="vdwd-rekenings-title">
                                Atasnama : <?php echo $rek->title; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($rek->norek) : ?>
                            <div class="text-center mt-4">
                                <span class="btn btn-success rounded-pill btn-copy" data-clipboard="<?php echo $rek->norek; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                    </svg>
                                    Copy Rekening
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <script>
        jQuery(document).ready(function($) {
            $(document).on('click', '.btn-copy', function() {
                var copyText = $(this).data("clipboard");
                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText);
                // Alert the copied text
                alert("Nomor Rekening Tersalin : " + copyText);
            });
        });
    </script>

</div>