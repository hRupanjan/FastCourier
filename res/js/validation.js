function valName(id,flag){
    id='#'+id;
    if ($(id).val() !== '' && $(id).val().match(/^[a-z]+$/i))
        {
            $(id).closest('.input-group,.form-group').removeClass('has-error').addClass('has-success');
        } else if (flag === 2 && $(id).val() === "") {
        $(id).closest('.form-group').removeClass('has-success').removeClass('has-error');
        }else
        {
            $(id).closest('.input-group,.form-group').removeClass('has-success').addClass('has-error');
        }
        valAll();
}

function valPhone(id)
{
    id = '#' + id;
    var phn = $(id).val();
    if (phn.length === 10)
    {
        if ($(id).val().match(/^[0-9]+$/))
        {
            $(id).closest('.input-group').removeClass('has-error').addClass('has-success');
        } else
        {
            $(id).closest('.input-group').removeClass('has-success').addClass('has-error');
        }
    }else
    {
        $(id).closest('.input-group').removeClass('has-success').addClass('has-error');
    }
    valAll();
}

function valAddr(id, type)
{
    var regex;
    id = '#' + id;
    switch (type)
    {
        case "building":
            regex = /^[a-z0-9/-\s]+$/i;
            break;
        case "city":
            regex = /^[a-z-\s]+$/i;
            break;
        case "pin":
            regex = /^[0-9]{6,6}$/;
            break;
        case "state":
            regex = /^[a-z0-9-\s]+$/i;
            break;
        case "street":
            regex = /^[a-z0-9-\s]+$/i;
            break;
        case "post":
            regex = /^[a-z-\s]+$/i;
    }
    if ($(id).val() !== "" && $(id).val().match(regex)) {
        $(id).closest('.input-group,.form-group').removeClass('has-error').addClass('has-success');
    } else {
        $(id).closest('.input-group,.form-group').removeClass('has-success').addClass('has-error');
    }
    valAll();
}

function valEmail(id,flag)
{   id='#'+id;
    if ($(id).val() !== '' && $(id).val().match(/^[a-z0-9._%+-]{1,64}@(?:[a-z0-9-]{1,63}\.){1,4}[a-z]{2,5}$/))
    {
        $(id).closest('.input-group').removeClass('has-error').addClass('has-success');
    } else if (flag === 2 && $(id).val() === "") {
        $(id).closest('.input-group').removeClass('has-success').removeClass('has-error');
    }else
    {
        $(id).closest('.input-group').removeClass('has-success').addClass('has-error');
    }
    valAll();
}

function valRest(id){
    id='#'+id;
    if ($(id).val() !== '' && $(id).val().match(/^[0-9.]+$/))
    {
        $(id).closest('.input-group').removeClass('has-error').addClass('has-success');
    } else
    {
        $(id).closest('.input-group').removeClass('has-success').addClass('has-error');
    }
    valAll();
}

function valCmnt(){
    if ($('#tarea').val() !== '')
    {
        $('#tarea').closest('.form-group').addClass('has-success');
    } else if($('#tarea').val() === ''){
        $('#tarea').closest('.form-group').removeClass('has-success');
    }
    valAll();
}

function valoldpass(){
    if ($('#oldpass').val() !== '')
    {
        $('#oldpass').closest('.input-group').addClass('has-success');
    } else if($('#oldpass').val() === ''){
        $('#oldpass').closest('.input-group').removeClass('has-success');
    }
    valAllPass();
}

function valAll()
{
    var m = $('#register .has-error');
    var k = $('#register input').not('#remail,#smname,#rmname');
    var flag=true;
    for (var i=0;i<k.length;i++)
    {
        if ($(k[i]).val()==='')
        {
            flag=false;
            break;
        }
    }
    
    if (flag && m.length === 0) {
         $('#register #sub_reg').removeAttr('disabled');
        return true;
    }
        else{
             $('#register #sub_reg').prop('disabled', 'true');
            return false;
      }  
}

function valpass() {

    if ($('#newpass').val() !== '' && $('#newpass').val().match(/^(?=.*[0-9])(?=.*[A-Z]).{6,20}$/)) {
        $('#newpass').closest('.input-group').removeClass('has-error').addClass('has-success');
        valconfpass(2);
    } else {
        $('#newpass').closest('.input-group').removeClass('has-success').addClass('has-error');
        valconfpass(2);
    }
    valAllPass();
}

function valconfpass(flag) {
    var pass=$('#newpass').val();
    var confpass=$('#confpass').val();
    var f=$('#passchk').hasClass('has-success').toString();
   // console.log(f);
    if(flag===1){
    if ($('#confpass').val() !== '' && $('#confpass').val()===pass && f==='true') {
        $('#confpass').closest('.input-group').removeClass('has-error').addClass('has-success');
    } else {
        $('#confpass').closest('.input-group').removeClass('has-success').addClass('has-error');
    }
    }
    else if(confpass !== '' && flag === 2){
         if ($('#confpass').val()===pass) {
        $('#confpass').closest('.input-group').removeClass('has-error').addClass('has-success');
    } else {
        $('#confpass').closest('.input-group').removeClass('has-success').addClass('has-error');
    }
        
    }    
    valAllPass();
}


