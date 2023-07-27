jQuery(document).ready(function($) {
    $(".vdwedd-form form").on("submit", function(event) {
        if (grecaptcha.getResponse()) {
            $(this).addClass('placeholder bg-transparent');
            var idform = $(this).data('id');
            var theForm = $(this).serializeArray();
            var newForm = {};
            $.map(theForm, function(n, i) {
                newForm[n['name']] = n['value'];
            });
            jQuery.ajax({
                type: 'POST',
                url: vdwedd.ajaxurl,
                data: {
                    'action': 'insertucapan',
                    'data': newForm,
                },
                success: function(respon) {
                    respon = JSON.parse(respon);
                    if (respon.success == true) {
                        $('#form' + idform).removeClass('placeholder bg-transparent');
                        $('.form-' + idform).append('<div class="alert alert-success text-dark">' + respon.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    }
                    if (respon.success == false) {
                        $('#form' + idform).removeClass('placeholder bg-transparent');
                        $('.form-' + idform).append('<div class="alert alert-danger text-dark">' + respon.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    }
                }
            });
        } else {
            alert("Lewati pemeriksaan reCaptcha !!");
        }
        event.preventDefault();
    });
});