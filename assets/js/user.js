$(document).ready(function () {
    var session = $.trim($('#session').val());
    var windowsScreen = window.matchMedia("(max-width: 992px)")
    $('#send').hide();
    reqc = $('#reqc')
    $('#messegep').hide();
    requestPend(session)
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
    //**********Evento para Cargar Informacion********/
    //**************en la pagina de profile***********/

    requsertable = $('#requsertable').DataTable({
        responsive: true,  
        pageLength: 50,
        ajax:{            
            url: "assets/app/rent/rent_controller.php?op=showallreq", 
            method: 'POST', //usamos el metodo POST
            data:  {'user':session},
            dataSrc:""
        },
        columns:[
            {data: "id"},
            {data: "daterent"},
            {data: "brand"},
            {data: "model"},
            {data: "mont"},
            {data: "status"},
            {data: "id",
                    "render":function(data,type,row) {
                        return "<div class='text-center'><a href='assets/app/rent/pdf.php?id="+data+"' class='btn btn-outline-info' target='_blank' rel='noopener noreferrer'><i class='bi bi-printer'></i><span>Visualizar</span></a></div>"
                    }
                },
        ],

    });

    if (windowsScreen.matches) {
        requsertable.columns([2,3,4,5]).visible(false)
    }
    
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

    $('#sendreq').click(function (e) { 
        e.preventDefault();
        id= $('#idreq').val();
        $.ajax({
            type: "POST",
            url: "assets/app/rent/rent_controller.php?op=showreq",
            dataType: "json",
            data:  {id:id},
            success: function (data) {
                $(".modal-title").text("Informacion de registro")
                $("#rname").prop('disabled',true);
                $("#rphone").prop('disabled',true);
                $("#rdni").prop('disabled',true);
                $("#rbrand").prop('disabled',true);
                $("#rmodel").prop('disabled',true);
                $("#ranno").prop('disabled',true);
                $("#rplate").prop('disabled',true);
                $("#rcost").prop('disabled',true);
                $('#mont').prop('disabled',true);
                $('#fechar').prop('disabled',true);
                $('#fechae').prop('disabled',true);
                $('#payment').hide();
                $("#messeger").hide();
                $('#messeger2').hide();
                $('#save').hide();
                $('#send').show();
                $('#payment').prop('required',false);
                $.each(data, function(idx, opt) {
                    fechar = new Date(opt.datein).toISOString().substring(0,10)
                    fechae = new Date(opt.dateout).toISOString().substring(0,10)
                    $('#rname').val(opt.nameu);
                    $('#rphone').val(opt.phone);
                    $('#rdnl').val(opt.letter);
                    $('#rdni').val(opt.dni);
                    $('#rbrand').val(opt.brand);
                    $('#rmodel').val(opt.model);
                    $('#ranno').val(opt.anno);
                    $('#rplate').val(opt.plate);
                    $('#rcost').val(opt.cost);
                    $('#fechar').val(fechar)
                    $('#fechae').val(fechae)
                    $('#mont').val(opt.mont);
                    $('#diass').text(opt.day);
                    $('#paymentimg').empty();
                    $('#paymentimg').append('<img class="d-block mx-auto mb-4" src="assets/img/payment/'+opt.payment+'" alt="" height="250">')
                });                
                $('#rentModal').modal('show');
                const flag = document.getElementById('liveToast')
                const toastflag = bootstrap.Toast.getOrCreateInstance(flag)
                toastflag.hide()
            }
        });
    });

    $('#cancreq').click(function (e) { 
        e.preventDefault();
        id= $('#idreq').val();
        condition = 6
        $.ajax({
            type: "POST",
            url: "assets/app/rent/rent_controller.php?op=register",
            dataType: "json",
            data:  {id:id,condition:condition},
            success: function (data) {
                if (data.status) {
                    alert(data.messege)
                    requestPend(session)
                    const toastTrigger = document.getElementById('cancreq')
                    const toastLiveExample = document.getElementById('liveToast')
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                    toastBootstrap.hide()
                } else {
                    alert(data.messege)
                    requestPend(session)
                    const toastTrigger = document.getElementById('cancreq')
                    const toastLiveExample = document.getElementById('liveToast')
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                    toastBootstrap.hide() 
                }
            }
        });
    });

    $('#send').click(function (e) { 
        e.preventDefault();
        id= $('#idreq').val();
        condition = 2
        $.ajax({
            type: "POST",
            url: "assets/app/rent/rent_controller.php?op=register",
            dataType: "json",
            data:  {id:id,condition:condition},
            success: function (data) {
                if (data.status) {
                    alert(data.messege)
                    requestPend(session)
                    $('#rentModal').modal('hide');
                } else {
                    alert(data.messege)
                    requestPend(session)
                    $('#rentModal').modal('hide');
                }
            }
        });
    });

});

function takeOption(id) {
   $('#idreq').val(id);
    const toastTrigger = document.getElementById('btnoption')
    const toastLiveExample = document.getElementById('liveToast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastBootstrap.show()
}

//************************************************/
    //**********Evento para Cargar Informacion********/
    //**************en la pagina de profile***********/
function requestPend(session) {
    $.ajax({
        type: "POST",
        url: "assets/app/rent/rent_controller.php?op=request",
        dataType: "json",
        data:  {user:session},
        success: function (data) {
            $('#reqc').text(data.length);
            $('#reqc2').text(data.length);
            $('#reqv').empty();
            $.each(data, function(idx, opt) {
                $('#reqv').append(
                    '<a href="#" onclick="takeOption(`'+opt.id+'`)">'+
                        '<li class="list-group-item d-flex justify-content-between lh-sm">'+
                            '<div>'+
                                '<h6 class="my-0">Por '+opt.day+' De Alquiler</h6>'+
                                '<small class="text-body-secondary">'+opt.brand+' '+opt.model+' '+opt.anno+'</small>'+
                            '</div>'+
                            '<span class="text-body-secondary">$'+opt.mont+'</span>'+
                        '</li>'+
                    '</a>') 
            });
        }
    });
}
    

