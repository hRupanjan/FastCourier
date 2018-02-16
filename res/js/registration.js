

$(document).ajaxSend(function (event, xhr, settings) {
    if (settings.url === "res/php/insert.php") {
        $('#msg').html('');
        $('#chk').hide();
        $("#wait").css("display", "block");
    }
});
$(document).ajaxComplete(function (event, xhr, settings) {

    if (settings.url === "res/php/insert.php") {
        $("#wait").css("display", "none");
        $("#chk").css("display", "block");
        clearInput();
    }
});
$("#sub_reg").click(function (e) {
    e.preventDefault();
    if(valAll()){
    $.ajax({
        url: 'res/php/insert.php',
        type: 'POST',
        data: {
            sfname: $('#sfname').val(),
            smname: $('#smname').val(),
            slname: $('#slname').val(),
            sbuilding: $('#sbuilding').val(),
            sstreet: $('#sstreet').val(),
            spo: $('#spo').val(),
            scity: $('#scity').val(),
            sstate: $('#sstate').val(),
            spin: $('#spin').val(),
            semail: $('#semail').val(),
            sphone: $('#sphone').val(),

            rfname: $('#rfname').val(),
            rmname: $('#rmname').val(),
            rlname: $('#rlname').val(),
            rbuilding: $('#rbuilding').val(),
            rstreet: $('#rstreet').val(),
            rpo: $('#rpo').val(),
            rcity: $('#rcity').val(),
            rstate: $('#rstate').val(),
            rpin: $('#rpin').val(),
            remail: $('#remail').val(),
            rphone: $('#rphone').val(),
            ship_type: $('#ship_type').val(),
            bmode: $('#bmode').val(),
            weight: $('#weight').val(),
            quantity: $('#quantity').val(),
            freight: $('#freight').val(),
            bdate: $('#bdate').val(),
            tarea: $('#tarea').val()

        },
        success: function (response) {
            $('#msg').html(response);
      }        
    });  
        console.log(1);
    }
});


function clearInput() {      /*this jQuery function used to clear all fields after submission*/
    $('#new_reg :input').each(function () {
        $(this).val('');
    });
    $('#tarea').val('');
    $('#register .input-group,.form-group').each(function () {
        $(this).removeClass('has-error').removeClass('has-success');
    });
    //$('#sub_reg').prop('disabled', 'true');
}

function inpDate() {
    var d = new Date();
    var m = d.getUTCMonth() + 1;
    var inp = d.getFullYear() + '-' + m + '-' + d.getDate();
    $('#bdate').val(inp);
    $('#bdate').closest('.input-group').addClass('has-success');
}

                       