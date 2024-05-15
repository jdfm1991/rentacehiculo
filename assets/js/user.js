$(document).ready(function () {

    var session = $.trim($('#session').val());
    $('#messegep').hide();
    if (!session) {
        $(location).attr('href','./');
    }
    //************************************************/
    //***********Funcion para Validar solo************/
    //**************Entrada de Numeros****************/
    $(function() {
        $("input[name='pdnin']").on('input',function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g,''));
        });
    });
    //************************************************/
    //**********Evento para Cargar Informacion********/
    //**************en la pagina de profile***********/
    $.ajax({
        type: "POST",
        url: "assets/app/user/user_controller.php?op=show",
        dataType: "json",
        data:  {user:session},
        success: function (data) {
            $.each(data, function(idx, opt) {
                $('#imguser').empty();
                $('#idsupport').empty();

                if (opt.imguser) {
                    $('#imguser').append('<img class="d-block mx-auto mb-4" src="assets/img/user/'+opt.imguser+'" alt="" height="100">') 
                } else {
                    $('#imguser').append('<img class="d-block mx-auto mb-4" src="assets/img/user/perfil.png" alt="" height="100">') 
                }
                if (!opt.nameu) {
                    $('#pname').addClass('validate'); 
                }
                if (!opt.letter) {
                    $('#pdnil').addClass('validate'); 
                }
                if (!opt.dni) {
                    $('#pdnin').addClass('validate'); 
                }
                if (!opt.email) {
                    $('#pemail').addClass('validate'); 
                }
                if (!opt.phone) {
                    $('#pphone').addClass('validate'); 
                }
                if (!opt.address) {
                    $('#paddress').addClass('validate'); 
                }
                $('#pname').val(opt.nameu);
                $('#pdnil').val(opt.letter);
                $('#pdnin').val(opt.dni);
                $('#pemail').val(opt.email);
                $('#pphone').val(opt.phone);
                $('#paddress').val(opt.address);

                if (opt.imgdni) {
                    $('#idsupport').append(
                        '<label for="pphone" class="form-label">Comprobante de Indentificacion </label>'+
                        '<img class="d-block mx-auto mb-4" src="assets/img/identifications/'+opt.imgdni+'" alt="" height="250">'
                    ) 
                } else {
                    $('#idsupport').append(
                        '<label for="pphone" class="form-label">Comprobante de Indentificacion </label>'+
                        '<img class="d-block mx-auto mb-4" src="assets/img/identifications/documento.png" alt="" height="250">') 
                }

                if (opt.status==1) {
                    $("#errorp").text('Su Usuario Fue Verificado de Manera Exitosa');
                    $('#messegep').addClass('alert-info'); 
                    $('#messegep').show();
                    setTimeout(() => {
                        $("#errorp").text("");
                        $("#messegep").hide();
                    }, 3000);
                } else {
                    $("#errorp").text('Su Usuario Aun No ha Sido Verificado');
                    $('#messegep').addClass('alert-danger'); 
                    $('#messegep').show();
                }
                
            });
        }
    });
    //************************************************/
    //**********Evento para enviar Informacion********/
    //************para actualizar de profile**********/
    $('#formClient').submit(function (e) { 
        e.preventDefault();
        name = $.trim($('#pname').val());
        pdnil = $.trim($('#pdnil').val());
        pdnin = $.trim($('#pdnin').val());
        email = $.trim($('#pemail').val());
        passw = $.trim($('#ppassw').val());
        phone = $.trim($('#pphone').val());
        address = $.trim($('#paddress').val());
        supportid  = $("#supportid")[0].files[0];
        imageu  = $("#imageu")[0].files[0];

        var datos = new FormData();
        datos.append('user', session)
        datos.append('name', name)
        datos.append('pdnil', pdnil)
        datos.append('pdnin', pdnin)
        datos.append('email', email)
        datos.append('passw', passw)
        datos.append('phone', phone)
        datos.append('address', address)
        datos.append('supportid', supportid)
        datos.append('imageu', imageu)

        $.ajax({
            url: "assets/app/user/user_controller.php?op=register",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
                if (data.status1 && data.status2) {
                    alert(data.messege1 + ' ' + data.messege2)
                    location.reload(); 
                } else {
                    alert(data.messege1 + ' ' + data.messege2)
                }
            }
        });
        
    });
});