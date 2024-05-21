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
            $(this).val($(this).val().replace(/[^0-9.]/g,''));
        });
    });
    $(function() {
        $("input[name='plate']").on('input',function (e) {
            $(this).val($(this).val().replace(/[^0-9a-zA-Z]/g,''));
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
        descrip= $('#vdescrip').val();
        carimg = document.getElementById('carimg').files.length;

        var datos = new FormData();
        datos.append('plate', plate)
        datos.append('region', region)
        datos.append('brand', brand)
        datos.append('model', model)
        datos.append('anno', anno)
        datos.append('cost', cost)
        datos.append('status', status)
        datos.append('descrip', descrip)
        for (var index = 0; index < carimg; index++) {
          datos.append("carimg[]", document.getElementById('carimg').files[index]);
        }

        $.ajax({
            url: "assets/app/vehicle/vehicle_controller.php?op=register",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false,  
            success: function(data) {
                console.log(data);
                if (data.status==true) {
                    Swal.fire({
                        icon: 'success',
                        html: '<h2>¡'+data.message+'!</h2><br><h4>¡'+data.messagei+'!</h4>',
                        showConfirmButton: false,
                        timer: 2000,
                        })
                    setTimeout(() => {
                        vehicletable.ajax.reload(null, false);
                    }, 1500);
                    $('#VehicleModal').modal('hide');
                    
                } else {
                    $('#messegev').show();
                    $('#messegev').addClass('alert-danger');
                    $('#errorv').text(data.message +' ' +data.messagei);
                    setTimeout(() => {
                        $("#errorv").text("");
                        $("#messegev").hide();
                    }, 3000);
                }
            }
    
          });
        
    });

    $('#vdescrip').keyup(function (e) { 
        descrip= $('#vdescrip').val();
        if (descrip.length<250) {
            $('#textcount').css('color', 'green');
        }
        if (descrip.length>=250 && descrip.length<499) {
            $('#textcount').css('color', 'orange');
        }
        if (descrip.length>=499) {
            $('#textcount').css('color', 'red');
        }
        $('#textcount').text(descrip.length+'/500');
    });
});