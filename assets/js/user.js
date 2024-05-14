$(document).ready(function () {

    var session = $.trim($('#session').val());
    $('#messegep').hide();
    if (!session) {
        $(location).attr('href','./');
    }

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
                    $('#imguser').append('<img class="d-block mx-auto mb-4" src="assets/img/user/testimonials-1.jpg" alt="" height="100">') 
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
                        '<img class="d-block mx-auto mb-4" src="assets/img/identifications/testimonials-1.jpg" alt="" height="250">') 
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
});