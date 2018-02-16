
$(document).ready(function () {
    $('#contact-us-form').on('submit', function (event) {
        event.preventDefault();
        //AJAX
        var datax = {
//        name: $('#contact-us-form').find('[name="name"]').val(),
//        email: $('#contact-us-form').find('[name="email"]').val(),
//        phone: $('#contact-us-form').find('[name="phone"]').val(),
//        message: $('#contact-us-form').find('[name="message"]').val()
            name: $('#contact-us-form').find('#in1').val(),
            email: $('#contact-us-form').find('#in2').val(),
            phone: $('#contact-us-form').find('#in3').val(),
            message: $('#contact-us-form').find('[name="message"]').val()
        };
//        console.log(datax);

        $.post("res/php/genEmail.php", datax, function (data, status) {
            if (status === "success")
                alert("Your message has been sent...");
        });

    });

    $('#track-cons-form').on('submit', function (event) {
        event.preventDefault();
        //AJAX

        $.post('res/php/g-recaptcha-verify.php', {captcha: grecaptcha.getResponse()}, function (data, status) {
            if (status === "success")
            {
                console.log(data);
                if (data === 'verified')
                {




                    $.post("res/php/findAckId.php", {id: $('#ass-id').val(), parent_page: 'index'
                    }, function (data, status) {
//            console.log(data);
                        if (status === "success")
                        {

                            $('.modal-footer').show();
                            $('#shipping-details').show();
                            $('#shipping-details td').html("");
                            try {
                                var obj = JSON.parse(data);

                                $('#shipping-details #ship-name td').html(obj.ship_name);
                                $('#shipping-details #ship-inv td').html(obj.invoice_no);
                                $('#shipping-details #ship-con td').html($('#ass-id').val());
                                $('#shipping-details #ship-book-date td').html(obj.book_date);
                                $('#shipping-details #ship-type td').html(obj.ship_type);
                                $('#shipping-details #payment-status td').html(obj.book_mode);
                            } catch (exception) {
                                var obj = {
                                    ship_status: 'none'
                                };
                            }

                            //open modal
                            $('#lb-status')
                                    .removeClass('label-success')
                                    .removeClass('label-warning')
                                    .removeClass('label-info')
                                    .removeClass('label-danger');
                            $('#trackAss').modal('show');
                            switch (obj.ship_status) {
                                case "in transit":
                                    $('#lb-status').addClass('label-info').html('In Transit');
                                    break;
                                case "landed":
                                    $('#lb-status').addClass('label-info').html('Landed');
                                    break;
                                case "delivered":
                                    $('#lb-status').addClass('label-success').html('Delivered');
                                    break;
                                case "hold":
                                    $('#lb-status').addClass('label-warning').html('On Hold');
                                    break;
                                case "delayed":
                                    $('#lb-status').addClass('label-danger').html('Delayed');
                                    break;
                                default :
                                    $('#lb-status').addClass('label-info').html('No Info');
                                    $('#shipping-details').hide();
                                    $('.modal-footer').hide();
                            }

                        }
                    });
                    //track    

                } else {
                    grecaptcha.reset();
                }
            }
        });

        //g-recaptcha

    });

    $('.navbar a[href^="#"]').on('click', function (event) {
        event.preventDefault();
        var s = $(this).attr('href');

        if (s.length > 1)
        {
            $(document.documentElement).animate({
                scrollTop: $(s).position().top
            }, 400);
        }

    });


    $('#btn-track').on('click', function () {
        window.location = "track.php?cons_id=" + $('#ass-id').val();
//       $('#track-cons-form').submit();
    });


    if (typeof $.fn.hScroller !== 'undefined')
        $('#co-address').hScroller({viewPortCols: 6, autoScrollInterval: 4000});



    $('#in1').blur(function () {

        if ($(this).val() !== '')
            $('#lbl1').addClass('used');

        else
            $('#lbl1').removeClass('used');

    });
    $('#in2').blur(function () {

        if ($(this).val() !== '')
            $('#lbl2').addClass('used');

        else
            $('#lbl2').removeClass('used');

    });
    $('#in3').blur(function () {

        if ($(this).val() !== '')
            $('#lbl3').addClass('used');

        else
            $('#lbl3').removeClass('used');

    });
});



        