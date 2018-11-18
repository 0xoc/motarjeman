jQuery(function ($) {


    /**
     * step1 for register profile
     * validate profile
     */
    $( ".btn-step2" ).on( "click", function() {
        $('.message').remove();
            var formGet = true;
            $(".fre-authen-register #signup_form input").each(function() {

                var val = $(this).val();
                var name = $(this).attr("name");
                var type = $(this).attr("type");
                if(val == "" && name != "sms_active_code" && name != "affiliate_code" && type!="hidden"){
                    // console.log(name);

                    $(this).parent().addClass('error');
                    $(this).after('<div class="message">این گزینه الزامی است</div>');
                    formGet = false;
                }
            });

            if(!formGet){
                // $("#errorFile").html("لطفا همه فیلد ها را پر نمایید");
                return 0;
            }else{
                $('#signup_form').find('.fre-input-field').hide();
                $('#approve_mobile').removeClass('hidden');
                $('#approve_mobile').find('.fre-input-field').show();
                var mobile=$('#mobile').val();
                $('html,body').animate({ scrollTop:20 }, 'slow');

                $("#send-active-code").prop("disabled", true);
                $("#send-active-code").css("cursor", "auto");
                var send_status=$(this).attr("data-send");
                // console.log(send_status)
                if(send_status == 0){
                    onTimer();
                    send_active_code(mobile);
                }

            }

    });

    /**
     * return to step1 for edit
     */
    $( ".btn-step1" ).on( "click", function() {
        $('#signup_form').find('.fre-input-field').show();
        $('#approve_mobile').addClass('hidden');
        $('#approve_mobile').find('.fre-input-field').hide();
    });


    /**
     * send active code functions
     * @param mobile
     */
    function send_active_code(mobile) {

        if(mobile==""){
             mobile=$('#mobile').val();
        }

        jQuery.ajax({
            url : ae_globals.ajaxURL,
            type : 'post',
            data : {
                action : 'sms_send_active_code',
                mobile : mobile
            },
            success : function( response ) {
                if (response) {
                    $('.btn-step2').attr("data-send",1);
                    $("#status-active-code").html('<div class="alert alert-success">کد با موفقیت برای شما ارسال شد.</div>');
                } else {

                }
            }
        });
    }


    /**
     * set 60 sec before resend active code
     */
    function onTimer() {
        //timer
        var count = 60;
        var timer = setInterval(function () {
            $("#sms-timer").html(count--+" ثانیه");
            if(count == 0){

                $("#sms-timer").text("");
                $("#send-active-code").prop("disabled", false);
                $("#status-active-code").text("");
                $("#send-active-code").css("cursor", "pointer");

                clearInterval(timer)
            }
        }, 1000);

    }


    /**
     * resend active code
     */
    $('#send-active-code').on('click', function (e) {
        e.preventDefault();
        var mobile=$('#mobile').val();

        $("#send-active-code").prop("disabled", true);
        $("#send-active-code").css("cursor", "auto");
        onTimer();
        send_active_code(mobile);
    });


    /**
     * if input is 6 digit button active
     */
    $( "#sms_active_code" ).keyup(function() {
        var count = $(this).val().length

        if(count==6){
            $('.btn-submit').removeClass("disabled");
            $('.btn-submit').prop("disabled", false);

        }else{
            $('.btn-submit').addClass("disabled");
            $('.btn-submit').prop("disabled", true);
        }
    })

});
