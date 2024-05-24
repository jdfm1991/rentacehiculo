$(document).ready(function () {
    const session = $.trim($('#session').val());
    //************************************************/
    //********Llamado de Funcion para cargar la*******/
    //************la cantidad e infomacion************/
    //***********de los pedidos pendientes************/
    requestPend(session)
    //************************************************/
    //***********Evento para cerrar sesion************/
    //************************************************/
    $('#btnLogout').click(function (e) { 
        e.preventDefault();
        $(location).attr('href','logout.php');
    });
    //************************************************/
    //*********Cargar Selector de Regiones************/
    //************************************************/
    $.ajax({
        url: "assets/app/initialcharge/initialcharge_controller.php?op=region",
        method: "POST",
        dataType: "json",  
        success: function(data) {
            $('#region').append('<option value="">-*_-*-_-*</option>');
            $('#vregion').append('<option value="">-*_-*-_-*</option>');
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $('#region').append('<option value="' + opt.id +'">' + opt.region + '</option>');
                $('#vregion').append('<option value="' + opt.id +'">' + opt.region + '</option>');
            });
        }
    });
    //************************************************/
    //***********Cargar Selector de Marcas************/
    //************************************************/
    $.ajax({
        url: "assets/app/initialcharge/initialcharge_controller.php?op=brand",
        method: "POST",
        dataType: "json",
        success: function(data) {
            $('#vbrand').append('<option value="">-*_-*-_-*</option>');
            $('#mbrand2').append('<option value="">-*_-*-_-*</option>');
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $('#vbrand').append('<option name="" value="' + opt.id +'">' + opt.brand + '</option>');
                $('#mbrand2').append('<option name="" value="' + opt.id +'">' + opt.brand + '</option>');
            });
        }
    });
    //************************************************/
    //***********Accion se cambia el selector*********/
    //****************de marcas***********************/
    $('#vbrand').change(function (e) { 
        e.preventDefault();
        brand=$.trim($('#vbrand').val());
        if (!brand) {
            $('#messegev').show();
            $('#messegev').addClass('alert-danger');
            $('#errorv').text('Por Favor Selecciones Una Marca');
            setTimeout(() => {
                $("#errorv").text("");
                $("#messegev").hide();
            }, 3000);
        } else {
            $('#vbrand').removeClass('validate');
            //************************************************/
            //**********Llamada de funcion para cargar********/
            //***********los modelos en el formulario*********/
            getDataModel(brand)
        } 
        
    });
    //************************************************/
    //***********Llamada de la funcion para***********/
    //****************Cargar los modelos**************/
    getDataModel()
});
//************************************************/
//****************Funcion para cargar*************/
//***********los modelos en el formulario*********/
function getDataModel(brand) {
    $.ajax({
        url: "assets/app/initialcharge/initialcharge_controller.php?op=model",
        method: "POST",
        dataType: "json", 
        data:  {brand:brand},  
        success: function(data) {
            $('#model').empty();
            $('#vmodel').empty();
            $('#model').append('<option value="">-*_-*-_-*</option>');
            $('#vmodel').append('<option value="">-*_-*-_-*</option>');
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $('#model').append('<option name="" value="' + opt.id +'">' + opt.model + '</option>');
                $('#vmodel').append('<option name="" value="' + opt.id +'">' + opt.model + '</option>');
            });
        }
    });
}

//************************************************/
//**********Evento para Cargar Informacion********/
//**************en la pagina de profile***********/
function requestPend(session) {
    $.ajax({
        type: "POST",
        url: "assets/app/rent/rent_controller.php?op=pendingreq",
        dataType: "json",
        data:  {user:session},
        success: function (data) {
            $('#reqc').text(data.length);
            $('#reqc2').text(data.length);
            $('#reqv').empty();
            $.each(data, function(idx, opt) {
                $('#reqv').append(
                    '<a href="#" onclick="takeOption(`'+opt.id+'`,`'+opt.car+'`)">'+
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
    
