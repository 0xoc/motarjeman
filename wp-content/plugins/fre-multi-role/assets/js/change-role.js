/**
 * By Morteza Lotfi Nejad
 */
jQuery(function ($) {
    $('#fre-switch-user-role').change(function () {
        var obj = $(this);
        var loading = $('<div class="loading-blur loading"><div class="loading-overlay"></div><div class="fre-loading-wrap"><div class="fre-loading"></div></div></div>');
        if (obj.is(':checked')) {
            //if user selected employer role
            jQuery.ajax({
                url: ae_globals.ajaxURL,
                type: 'post',
                data: {
                    action: 'change_role_profile',
                    role: 'employer'
                },
                beforeSend: function() {
                    loading.insertAfter(obj);
                },
                success: function (response) {
                    AE.pubsub.trigger('ae:notification', {
                        msg: 'با موفقیت به نقش کاربری کارفرما تغییر کرد',
                        notice_type: 'success',
                    });
                    location.reload();
                }
            });
        } else {
            //if user selected freelancer role
            jQuery.ajax({
                url: ae_globals.ajaxURL,
                type: 'post',
                data: {
                    action: 'change_role_profile',
                    role: 'freelancer'
                },
                beforeSend: function() {
                    loading.insertAfter(obj);
                },
                success: function (response) {
                    AE.pubsub.trigger('ae:notification', {
                        msg: 'با موفقیت به نقش کاربری فریلنسر تغییر کرد',
                        notice_type: 'success',
                    });
                    location.reload();
                }
            });
        }
    });
});