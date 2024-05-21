$(document).ready(function () {
    $('#messegev').hide();

    //************************************************/
    //***********Funcion para Validar solo************/
    //**************Entrada de Numeros****************/
    $(function() {
        $("input[name='vanno']").on('input',function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g,''));
        });
    });
    $(function() {
        $("input[name='vcost']").on('input',function (e) {
            $(this).val($(this).val().replace(/[^0-9,]/g,''));
        });
    });
    //************************************************/
    //********Accion para cargar la informacion*******/
    //**************el Datatable de Vehiculo**********/
    vehicletable = $('#vehicletable').DataTable({
        responsive: true,  
        pageLength: 50,
        ajax:{            
            url: "assets/app/vehicle/vehicle_controller.php?op=showall", 
            method: 'POST', 
            dataSrc:""
        },
        columns:[
            {data: "plate"},
            {data: "region"},
            {data: "brand"},
            {data: "model"},
            {data: "anno"},
            {data: "cost"},
            {data: "status"},
            {data: "id",
                    "render":function(data,type,row) {
                        return "<div class='text-center'><a href='assets/app/rent/pdf.php?id="+data+"' class='btn btn-outline-info' target='_blank' rel='noopener noreferrer'><i class='bi bi-printer'></i><span>Visualizar</span></a></div>"
                    }
                },
        ],

    });
    //************************************************/
    //******Accion para abrir modal para registrar****/
    //************la informacion del Vehiculo*********/
    $('#newvehicle').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Registro de Nuevo Vehiculo")
        $('#VehicleModal').modal('show');
        
    });
    //************************************************/
    //*********Cargar Estado de los Vehiculos*********/
    //************************************************/
    $.ajax({
        url: "assets/app/vehicle/vehicle_controller.php?op=status",
        method: "POST",
        dataType: "json",  
        success: function(data) {
            $('#vstatus').append('<option value="">-*_-*-_-*</option>');
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $('#vstatus').append('<option value="' + opt.id +'">' + opt.status + '</option>');
            });
        }
    });
    //************************************************/
    //*********Envio de informacion Vehiculos*********/
    //***************para ser guardada****************/
    $('#formVehicle').submit(function (e) { 
        e.preventDefault();
        plate = $('#plate').val();
        region = $('#vregion').val();
        brand = $('#vbrand').val();
        model = $('#vmodel').val();
        anno = $('#vanno').val();
        cost = $('#vcost').val();
        status = $('#vstatus').val();
        carimg = document.getElementById('carimg').files.length;

        var datos = new FormData();
        datos.append('plate', plate)
        datos.append('region', region)
        datos.append('brand', brand)
        datos.append('model', model)
        datos.append('anno', anno)
        datos.append('cost', cost)
        datos.append('status', status)
        for (var index = 0; index < carimg; index++) {
          datos.append("carimg[]", document.getElementById('carimg').files[index]);
        }

        $.ajax({
            url: "resources/vehicle/vehicle_controller.php?op=register",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false,  
            success: function(data) {
                setTimeout(() => {
                    vehicletable.ajax.reload(null, false);
                }, 1000);
            }
    
          });
        
    });

});