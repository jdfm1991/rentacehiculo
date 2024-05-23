$(document).ready(function () {
    const nunberFormat = new Intl.NumberFormat('en-US');
    var url = $(location).attr('href').split("=")
    const session = $.trim($('#session').val());
    const option = url[1]
    var fechar = moment($('#fechar').val())
    var fechae = moment($('#fechae').val())
    var diff = 0
    diff = fechae.diff(fechar,'days')
    $('#diaa').text(diff);
    $('#cbrand').hide();
    $('#cmodel').hide();
    $('#canno').hide();
    $('#alertma').hide();
    $('#send').hide();
    $('#methodinfo').hide();
    //************************************************/
    //***********Funcion para Validar solo************/
    //**************Entrada de Numeros****************/
    $(function() {
        $("input[name='reference']").on('input',function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g,''));
        });
    });
    //************************************************/
    //*********Llamda de Funcion para Cargar**********/
    //************Vista Inicial de Pagina*************/
    getProspect()
    //************************************************/
    //*********Cargar Contenido Vers. Movil***********/
    //************Vista Inicial de Pagina*************/
    $.ajax({
        type: "POST",
        url: "assets/app/portfolio/portfolio_controller.php?op=showall",
        dataType: "json",
        success: function (data) {
            $('#portfoliomobile').empty();
            $('#portfoliomobile').append('<div>')
            $.each(data, function(idx, opt) {
                $('#portfoliomobile').append(
                    '<div class="swiper-slide justify-content-center">'+
                        '<div class="swiper-slide">'+
                            '<div class="portfolio-wrap">'+
                                '<img class="img_detail" src="assets/img/vehicle/'+opt.imgc+'" alt="">'+
                                '<div class="portfolio-info">'+
                                    '<h4>'+opt.model+'</h4>'+
                                    '<p>'+opt.brand+'</p>'+
                                    '<p>'+opt.anno+'</p>'+
                                    '<div class="portfolio-links">'+
                                    '<a href="portfolio-details.php?option='+opt.id+'" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            });
            $('#portfoliomobile').append('</div>')
        }
    });
    //************************************************/
    //*********Cargar Numeros de Paginador************/
    //************************************************/
    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=pages",
        method: "POST",
        dataType: "html",  
        success: function(data) {
            $('#paginator').empty();
            $('#paginator').append('<div>')
            for (let index = 1; index <= data ; index++) {
                active = '';
                if (index == 1) {
                    active = 'active';
                }
                $('#paginator').append('<li class="page-item '+active+'"><a class="page-link" href="#" onclick="getProspect('+index+')" data="'+index+'">'+index+'</a></li>');
            }
            $('#paginator').append('</div>')
        }
        
    });
    //************************************************/
    //******Mostras detalles de protafolio************/
    //************************************************/
    $.ajax({
        type: "POST",
        url: "assets/app/portfolio/portfolio_controller.php?op=showdetails",
        dataType: "json",
        data:  {id:option},
        success: function (data) {
            //Colocacion de Fotos de Muestra
            $('#img_propect').empty();
            $('#img_propect').append('<div>')
            $.each(data, function(idx, opt) {
                for (let i = 0; i < opt.image.length; i++) {
                    $('#img_propect').append(
                        '<div class="swiper-slide">'+
                            '<img class="img_detail" src="assets/img/vehicle/'+opt.image[i]+'" alt="">'+
                        '</div>'
                        );
                }
            });
            $('#img_propect').append('</div>')

            //Colocacion de infomacion basica
            $('#text_prospect').empty();
            $('#text_prospect').append('<div>')
            $.each(data, function(idx, opt) {
                $('#text_prospect').append(
                    '<li><strong>Marca</strong>: '+opt.brand+'</li>'+
                    '<li><strong>Modelo</strong>: '+opt.model+'</li>'+
                    '<li><strong>Año</strong>: '+opt.anno+'</li>'
                    );
                if (opt.status==1) {
                    $('#avail_prospect').append('<button id="btnrent" class="btn btn-outline-primary">Alquilar</button>')
                    $("#messeged").hide();
                } else {
                    $('#avail_prospect').append('<button id="btnrent" class="btn btn-outline-primary" disabled>Alquilar</button>')
                    $("#messeged").show();
                    $("#errord").text('Este Vehiculo No Se Encuentra Disponible, Se Desea Puede Contactar Con Un Operador A traves del Siguiente Link: ');
                }
            });
            $('#text_prospect').append('</div>')           

            //Colocacion de Descripcion
            $('#desc_prospect').empty();
            $('#desc_prospect').append('<div>')
            $.each(data, function(idx, opt) {
                $('#desc_prospect').append('<p>'+opt.descrip+'</p>');
            });
            $('#desc_prospect').append('</div>')
        }
    });
    //************************************************/
    //*********Mostras Los metodos de pago************/
    //************************************************/
    $.ajax({
        type: "POST",
        url: "assets/app/rent/rent_controller.php?op=showpaymentmethodall",
        dataType: "json",
        success: function (data) {
            //Colocacion de Fotos de Muestra
            $('#rmethod').append('<option value="">-*_-*-_-*</option>');
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $('#rmethod').append('<option name="" value="' + opt.id +'">' + opt.method + '</option>');
            });
        }
    });
    //************************************************/
    //********Abrir Modal de Busqueda Avanzada********/
    //************************************************/
    $('#tsearch').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Busqueda Avanzada, Selecciones los Filtros")
        $('#advanceModal').modal('show');	
    });
    //************************************************/
    //**********Abrir Modal Para el Proceso de********/
    //**************Renta del Vehuiculo***************/
    $(document).on("click", "#btnrent", function(){
        if (session) {
            $.ajax({
                type: "POST",
                url: "assets/app/rent/rent_controller.php?op=loaddata",
                dataType: "json",
                data:  {user:session,option:option},
                success: function (data) {
                    $("#messeger2").hide();
                    $('#rname').val(data.nameu);
                    $('#rphone').val(data.phone);
                    $('#rdnl').val(data.letter);
                    $('#rdni').val(data.dni);
                    $('#rbrand').val(data.brand);
                    $('#rmodel').val(data.model);
                    $('#ranno').val(data.anno);
                    $('#rplate').val(data.plate);
                    $('#rcost').val(data.cost);
                    fechar = moment($('#fechar').val())
                    fechae = moment($('#fechae').val())
                    diff = fechae.diff(fechar,'days')
                    $('#mont').val(nunberFormat.format(diff*data.cost));
                    $('#rstatus').val(data.status);
                    if (data.status==1) {
                        $("#messeger").hide();
                    } else {
                        $("#messeger").show();
                        $("#errorr").text("La informacion Del Usuario Esta Incompleta o Pendiente Por Verificar");
                        setTimeout(() => {
                            $("#errorr").text("");
                            $("#messeger").hide();
                        }, 3000);
                    }
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
                    $('#rentModal').modal('show');
                }
            });
        } else {
            Swal.fire({
                title: "Para Rentar Un Vehiculo Debe Iniciar Sesion Primero",
                text: "Desea Iniciar Sesion Ahora?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Si",
              }).then((result) => {
                if (result.isConfirmed) {
                    $(".modal-title").text("Inicio de Sesion")
                    $("#messegel").hide();
                    $("#optreg").hide();
                    $("#name").prop('required',false);
                    $("#phone").prop('required',false);
                    $("#btnRegister").hide();
                    $("#btnStart").show();
                    $("#options").show();	
                    $('#loginModal').modal('show');
                }
            });   
        }
    });
    //************************************************/
    //**********Evento Si Cambia el Selector**********/
    //*****************de Regiones********************/
    $('#region').change(function (e) { 
        e.preventDefault();
        region=$.trim($('#region').val());
        brand=$.trim($('#brand').val());
        model=$.trim($('#model').val());
        anno=$.trim($('#anno').val());
        if (!region) {
            $('#cbrand').hide();
            $('#cmodel').hide();
            $('#canno').hide();
            $('#alertma').show();
            $('#alertma').addClass('alert-warning');
            $('#messagema').text('Debe de Seleccionar Un Region');
            $('#brand').val('');
            $('#model').val('');
            $('#anno').val('');
            $('#advancep').empty();
        } else {
            //************************************************/
            //**********Mostras Selector de Marcas************/
            //************************************************/
            $.ajax({
                url: "assets/app/portfolio/portfolio_controller.php?op=brand",
                method: "POST",
                dataType: "json",
                data:  {region:region}, 
                success: function(data) {
                    $('#brand').empty();
                    $('#brand').append('<option value="">-*_-*-_-*</option>');
                    $.each(data, function(idx, opt) {
                        //se itera con each para llenar el select en la vista
                        $('#brand').append('<option name="" value="' + opt.id +'">' + opt.brand + '</option>');
                    });
                }
            });
            $('#cbrand').show();
            searchAdvance(region,brand,model,anno)
        } 
    });
    //************************************************/
    //**********Evento Si Cambia el Selector**********/
    //*******************de Marcas********************/
    $('#brand').change(function (e) { 
        e.preventDefault();
        region=$.trim($('#region').val());
        brand=$.trim($('#brand').val());
        model=$.trim($('#model').val());
        anno=$.trim($('#anno').val());
        if (!brand) {
            $('#cmodel').hide();
            $('#canno').hide();
            $('#alertma').show();
            $('#alertma').addClass('alert-warning');
            $('#messagema').text('Por Favor Selecciones Una Marca');
            $('#model').val('');
            $('#anno').val('');
            setTimeout(() => {
                $("#messagema").text("");
                $("#alertma").hide();
            }, 3000);
        } else {
            //************************************************/
            //**********Llamada de funcion para cargar********/
            //***********los modelos en el formulario*********/
            getDataModel(brand)
            $('#cmodel').show();
            searchAdvance(region,brand,model,anno)
        } 
    });
    //************************************************/
    //**********Evento Si Cambia el Selector**********/
    //*****************de Modelos*********************/
    $('#model').change(function (e) { 
        e.preventDefault();
        region=$.trim($('#region').val());
        brand=$.trim($('#brand').val());
        model=$.trim($('#model').val());
        anno=$.trim($('#anno').val());
        if (!model) {
            $('#canno').hide();
            $('#alertma').show();
            $('#alertma').addClass('alert-warning');
            $('#messagema').text('Por Favor Selecciones Un Modelo');
            $('#anno').val('');
            setTimeout(() => {
                $("#messagema").text("");
                $("#alertma").hide();
            }, 3000);
        } else {
            //************************************************/
            //**********Mostras Selector de annios************/
            //************************************************/
            $.ajax({
                url: "assets/app/portfolio/portfolio_controller.php?op=anno",
                method: "POST",
                dataType: "json",
                data:  {region:region,brand:brand,model:model},    
                success: function(data) {
                    $('#anno').empty();
                    $('#anno').append('<option value="">-*_-*-_-*</option>');
                    $.each(data, function(idx, opt) {
                        //se itera con each para llenar el select en la vista
                        $('#anno').append('<option name="" value="' + opt.anno +'">' + opt.anno + '</option>');
                    });
                }
            });
            $('#canno').show();
            searchAdvance(region,brand,model,anno)
        } 
    });
    //************************************************/
    //**********Evento Si Cambia el Selector**********/
    //******************de annio**********************/
    $('#anno').change(function (e) { 
        e.preventDefault();
        region=$.trim($('#region').val());
        brand=$.trim($('#brand').val());
        model=$.trim($('#model').val());
        anno=$.trim($('#anno').val());
        if (!anno) {
            $('#alertma').show();
            $('#alertma').addClass('alert-warning');
            $('#messagema').text('Por Favor Selecciones Un Annio');
            setTimeout(() => {
                $("#messagema").text("");
                $("#alertma").hide();
            }, 3000);
        } else {
            searchAdvance(region,brand,model,anno)
        } 
    });
    //************************************************/
    //**********Evento Si Cambia el Selector**********/
    //**************de Metodos de pago****************/
    $('#rmethod').change(function (e) { 
        e.preventDefault();
        method=$.trim($('#rmethod').val());
        $.ajax({
            type: "POST",
            url: "assets/app/rent/rent_controller.php?op=showpaymentmethod",
            dataType: "json",
            data:  {method:method},
            success: function (data) {
                $('#datamethod').empty();
                $.each(data, function(idx, opt) {
                    if (opt.method) {
                        $('#datamethod').append(
                            '<span>Metodo: </span><strong>'+opt.method+'</strong><br>'
                        );
                    }
                    if (opt.code) {
                        $('#datamethod').append(
                            '<span>Codigo Banco: </span><strong>'+opt.code+'</strong><br>'
                        );
                    }
                    if (opt.numberaccount) {
                        $('#datamethod').append(
                            '<span>Numero de Cuenta: </span><strong>'+opt.numberaccount+'</strong><br>'
                        );
                    }
                    if (opt.document) {
                        $('#datamethod').append(
                            '<span>Identificacion: </span><strong>'+opt.document+'</strong><br>'
                        );
                    }
                    if (opt.phone) {
                        $('#datamethod').append(
                            '<span>N# Telefonico: </span><strong>'+opt.phone+'</strong><br></br>'
                        );
                    }
                    
                });
                $('#methodinfo').show();
            }
        }); 

        
    });
    //************************************************/
    //**********Evento para calcular dias de**********/
    //************diferencia entre dios***************/
    //************y el monto a cobrar*****************/
    $('#fechar').change(function (e) { 
        e.preventDefault();
        fechar = moment($('#fechar').val())
        fechae1 = moment($('#fechae').val())
        cost = $('#rcost').val();
        nextday = new Date(fechar)
        nextday.setDate(nextday.getDate()+1)
        diff = fechae1.diff(fechar,'days')
        if (diff<1) {
            tomorrow = new Date(nextday).toISOString().substring(0,10)
            $('#fechae').val(tomorrow)
            $('#fechae').attr('min', tomorrow);
            fechae2 = moment($('#fechae').val())
            diff = fechae2.diff(fechar,'days')
            $('#mont').val(nunberFormat.format(diff*cost)); 
            $('#diaa').text(diff);
        } else {
            tomorrow = new Date(nextday).toISOString().substring(0,10)
            $('#fechae').attr('min', tomorrow);
            $('#mont').val(nunberFormat.format(diff*cost)); 
            $('#diaa').text(diff); 
        }
    });
    $('#fechae').change(function (e) { 
        e.preventDefault();
        fechar = moment($('#fechar').val())
        fechae = moment($('#fechae').val())
        cost = $('#rcost').val();
        diff = fechae.diff(fechar,'days')
        $('#mont').val(nunberFormat.format(diff*cost));
        $('#diaa').text(diff); 
    });
    //************************************************/
    //**********Evento para enviar informacion********/
    //******************del Alquiler******************/
    $('#formRent').submit(function (e) { 
        e.preventDefault();
        let dias = document.getElementById('diaa').textContent;
        name = $('#rname').val();
        phone = $('#rphone').val();
        dni = $('#rdni').val();
        status = $('#rstatus').val();
        if (status==1) {
            fechar  = $('#fechar').val();
            fechae  = $('#fechae').val();
            mont    = $('#mont').val();
            method    = $('#rmethod').val();
            fechap  = $('#fechap').val();
            reference = $('#reference').val();
            payment = $("#payment")[0].files[0];
            dias    = document.getElementById('diaa').textContent;
            condition = 2
            carstatus = 2
            newmont = mont.replace(",","")
            sendRequest(session,option,fechar,fechae,newmont,method,fechap,reference,payment,dias,condition,carstatus)
        } else {
            $("#messeger2").show();
            $("#errorr2").html('La informacion Del Usuario Esta Incompleta o Pendiente Por Verificar. <br> Si Desea Revisar La Informacion Suministrada haga Click <a id="btnprofile" href="#">Aqui</a> <br> Si Desea Con Un El Departamento de Atencion Al Publico haga Click Aqui');
        }
    });
    //************************************************/
    //**********Evento para enviar informacion********/
    //************del Alquiler con estatus 1**********/
    $(document).on("click", "#btnprofile", function(){
        fechar  = $('#fechar').val();
        fechae  = $('#fechae').val();
        mont    = $('#mont').val();
        method  = $('#rmethod').val();
        fechap  = $('#fechap').val();
        reference = $('#reference').val();
        payment = $("#payment")[0].files[0];
        dias    = document.getElementById('diaa').textContent;
        condition = 1
        carstatus = 2
        newmont = mont.replace(",","")
        sendRequest(session,option,fechar,fechae,newmont,method,fechap,reference,payment,dias,condition,carstatus)
    });    
});

//************************************************/
//********Funcion para Cargar Vista Inicial*******/
//******************de Pagina*********************/
function getProspect(index) {
    if (index==undefined) {
        index=1
    }
    else{
        $('.pagination li').removeClass('active');
        page=$('.pagination li a').length
        for (let i = 0; i <= page; i++) {
            if (i==index) {
                $('.pagination li a[data="'+i+'"]').parent().addClass('active');
            }
        }
    }
    $.ajax({
        type: "POST",
        url: "assets/app/portfolio/portfolio_controller.php?op=show",
        dataType: "json",
        data:  {index:index},
        success: function (data) {
            $('#prospect').empty();
            $('#prospect').append('<div>')
            $.each(data, function(idx, opt) {
                $('#prospect').append(
                    '<div class="col-sm-4 col-md-3 portfolio-item">'+
                        '<div class="portfolio-wrap">'+
                        '<img src="assets/img/vehicle/'+opt.imgc+'" class="imgfluid" alt="">'+
                        '<div class="portfolio-info">'+
                            '<h4>'+opt.model+'</h4>'+
                            '<p>'+opt.brand+'</p>'+
                            '<p>'+opt.anno+'</p>'+
                            '<div class="portfolio-links">'+
                            '<a href="portfolio-details.php?option='+opt.id+'" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    '</div>'
                );
            });
            $('#prospect').append('</div>')
        }
    });   
}
//************************************************/
//**********Funcion para Cargar Vista de**********/
//**************Busqueda Avanzada*****************/
function searchAdvance(region,brand,model,anno) {

    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=advanced",
        method: "POST",
        dataType: "json",
        data:  {region:region,brand:brand,model:model,anno:anno},
        success: function(data) {
            if (data.length) {
                $('#alertma').hide();
                $('#advancep').empty();
                $('#advancep').append('<div>')
                $.each(data, function(idx, opt) {
                    $('#advancep').append(
                        '<div class="col-sm-3 col-sm-3 portfolio-item">'+
                            '<div class="portfolio-wrap">'+
                            '<img src="assets/img/vehicle/'+opt.imgc+'" class="imgfluid" alt="">'+
                                '<div class="portfolio-info">'+
                                    '<h4>'+opt.model+'</h4>'+
                                    '<p>'+opt.brand+'</p>'+
                                    '<p>'+opt.anno+'</p>'+
                                    '<div class="portfolio-links">'+
                                    '<a href="portfolio-details.php?option='+opt.id+'" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                });
                $('#advancep').append('</div>')
            } else {
                $('#alertma').show();
                $('#alertma').addClass('alert-danger');
                $('#messagema').text('No Existe Informacion');
                $('#advancep').empty();
            }
        }
    });
    
}
//************************************************/
//********Funcion para guardar la informacion*****/
//***************de la nueva solicituf************/
function sendRequest(session,option,fechar,fechae,newmont,method,fechap,reference,payment,dias,condition,carstatus) {
    datos = new FormData();
    datos.append('user', session)
    datos.append('option', option)
    datos.append('fechar', fechar)
    datos.append('fechae', fechae)
    datos.append('mont', newmont)
    datos.append('method', method)
    datos.append('fechap', fechap)
    datos.append('reference', reference)
    datos.append('payment', payment)
    datos.append('dias', dias)
    datos.append('condition', condition)
    datos.append('carstatus', carstatus)
    $.ajax({
        url: "assets/app/rent/rent_controller.php?op=register",
        type: "POST",
        dataType:"json",    
        data:  datos,
        cache: false,
        contentType: false,
        processData: false, 
        success: function(data) {
            if (data.status) {
                Swal.fire({
                    icon: 'success',
                    html: '<h2>¡'+data.messege+'!</h2>',
                    showConfirmButton: false,
                    timer: 2000,
                    })         
                setTimeout(() => {
                    window.location.href="profile.php"; 
                }, 2000);               
            } else {
                Swal.fire({
                    icon: 'success',
                    html: '<h2>¡'+data.messege+'!</h2>',
                    showConfirmButton: false,
                    timer: 2000,
                    })         
                setTimeout(() => {
                    window.location.href="profile.php"; 
                }, 2000);
            }
        }
    });
}
