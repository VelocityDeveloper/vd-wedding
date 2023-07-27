jQuery(document).ready(function($) {
    $(document).on('click', '.vdbb-button-action-play .audiotriger', function() {
        let nodeid = $(this).data('nodeid');
        let parnts = $('.btn-' + nodeid);
        let isplay = parnts.data('play');
        parnts.find('.audio-volume').show();
        $('body').addClass('vdwd-isplay');
        if (isplay == false) {
            parnts.data('play', true);
            parnts.find('.audio-on').show();
            parnts.find('.audio-mute').hide();
            $('#audio' + nodeid)[0].play();
            parnts.find('a.fl-button').removeClass('audiotriger');
        } else {
            parnts.data('play', false);
            parnts.find('.audio-on').hide();
            parnts.find('.audio-mute').show();
            $('#audio' + nodeid)[0].pause();
        }
    });
});