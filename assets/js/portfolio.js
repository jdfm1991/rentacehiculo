$(document).ready(function () {
    var url = $(location).attr('href').split("=")
    var id = url[1]
    $('#cbrand').hide();
    $('#cmodel').hide();
    $('#canno').hide();
    $('#alertma').hide();
    //************************************************/
    //*********Llamda de Funcion para Cargar**********/
    //************Vista Inicial de Pagina*************/
    getProspect()
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
        data:  {id:id},
        success: function (data) {
            //Colocacion de Fotos de Muestra
            $('#img_propect').empty();
            $('#img_propect').append('<div>')
            $.each(data, function(idx, opt) {
                console.log(opt.image);
                for (let i = 0; i < opt.image.length; i++) {
                    $('#img_propect').append(
                        '<div class="swiper-slide">'+
                            '<img class="img_detail" src="assets/img/portfolio/'+opt.image[i]+'" alt="">'+
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
    //********Abrir Modal de Busqueda Avanzada********/
    //************************************************/
    $('#tsearch').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Busqueda Avanzada, Selecciones los Filtros")
        $('#advanceModal').modal('show');	
        
    });
    //************************************************/
    //*********Cargar Selector de Regiones************/
    //************************************************/
    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=region",
        method: "POST",
        dataType: "json",  
        success: function(data) {
            $('#region').append('<option value="">-*_-*-_-*</option>');
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#region').append('<option value="' + opt.id +'">' + opt.region + '</option>');
          });
        }
    });
    //************************************************/
    //**********Mostras Selector de Marcas************/
    //************************************************/
    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=brand",
        method: "POST",
        dataType: "json",  
        success: function(data) {
            $('#brand').append('<option value="">-*_-*-_-*</option>');
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#brand').append('<option name="" value="' + opt.id +'">' + opt.brand + '</option>');
          });
        }
    });
    //************************************************/
    //**********Mostras Selector de Modelos***********/
    //************************************************/
    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=model",
        method: "POST",
        dataType: "json",  
        success: function(data) {
            $('#model').append('<option value="">-*_-*-_-*</option>');
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#model').append('<option name="" value="' + opt.id +'">' + opt.model + '</option>');
          });
      
        }
    });
    //************************************************/
    //**********Mostras Selector de annios************/
    //************************************************/
    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=anno",
        method: "POST",
        dataType: "json",  
        success: function(data) {
            $('#anno').append('<option value="">-*_-*-_-*</option>');
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#anno').append('<option name="" value="' + opt.anno +'">' + opt.anno + '</option>');
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
            $.ajax({
                url: "assets/app/portfolio/portfolio_controller.php?op=advanced",
                method: "POST",
                dataType: "json",
                data:  {region:region,brand:brand,model:model,anno:anno},
                success: function(data) {
                    if (data.length) {
                        $('#cbrand').show();
                        $('#alertma').hide();
                        $('#advancep').empty();
                        $('#advancep').append('<div>')
                        $.each(data, function(idx, opt) {
                            $('#advancep').append(
                                '<div class="col-lg-4 col-md-6 portfolio-item">'+
                                    '<div class="portfolio-wrap">'+
                                    '<img src="assets/img/portfolio/'+opt.imgc+'" class="imgfluid" alt="">'+
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
            $.ajax({
                url: "assets/app/portfolio/portfolio_controller.php?op=advanced",
                method: "POST",
                dataType: "json",
                data:  {region:region,brand:brand,model:model,anno:anno},  
                success: function(data) {
                    if (data.length) {
                        $('#cmodel').show();
                        $('#alertma').hide();
                        $('#advancep').empty();
                        $('#advancep').append('<div>')
                        $.each(data, function(idx, opt) {
                            $('#advancep').append(
                                '<div class="col-lg-4 col-md-6 portfolio-item">'+
                                    '<div class="portfolio-wrap">'+
                                    '<img src="assets/img/portfolio/'+opt.imgc+'" class="imgfluid" alt="">'+
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
            $.ajax({
                url: "assets/app/portfolio/portfolio_controller.php?op=advanced",
                method: "POST",
                dataType: "json",
                data:  {region:region,brand:brand,model:model,anno:anno},  
                success: function(data) {
                    if (data.length) {
                        $('#canno').show();
                        $('#alertma').hide();
                        $('#advancep').empty();
                        $('#advancep').append('<div>')
                        $.each(data, function(idx, opt) {
                            $('#advancep').append(
                                '<div class="col-lg-4 col-md-6 portfolio-item">'+
                                    '<div class="portfolio-wrap">'+
                                    '<img src="assets/img/portfolio/'+opt.imgc+'" class="imgfluid" alt="">'+
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
                                '<div class="col-lg-4 col-md-6 portfolio-item">'+
                                    '<div class="portfolio-wrap">'+
                                    '<img src="assets/img/portfolio/'+opt.imgc+'" class="imgfluid" alt="">'+
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
    });
});

//************************************************/
//********Funcion para CargarVista Inicial********/
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
                    '<div class="col-lg-4 col-md-6 portfolio-item">'+
                        '<div class="portfolio-wrap">'+
                        '<img src="assets/img/portfolio/'+opt.imgc+'" class="imgfluid" alt="">'+
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
