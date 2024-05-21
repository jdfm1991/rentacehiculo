$(document).ready(function () {
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
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $('#vbrand').append('<option name="" value="' + opt.id +'">' + opt.brand + '</option>');
            });
        }
    });

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
