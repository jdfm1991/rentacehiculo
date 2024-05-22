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
        pageLength: 10,
        columnDefs: [{ width: '15%', targets: 7 }],
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
                        return "<div class='text-center'>"+
                        "<a href='#' onclick='takeIdV(`"+data+"`)' class='btn btn-outline-info btn-sm btnedit'><i class='bi bi-pencil-square'></i></a>"+
                        "<a href='#' onclick='takeIdV(`"+data+"`)' class='btn btn-outline-danger btn-sm btncancel'><i class='bi bi-x-octagon'></i></a>"+
                        "<a href='#' onclick='takeIdV(`"+data+"`)' class='btn btn-outline-success btn-sm btnpicture'><i class='bi bi-images'></i></a>"+
                        "</div>"
                    }
                },
        ],

    });
    //************************************************/
    //******Accion para abrir modal para registrar****/
    //************la informacion del Vehiculo*********/
    $('#newvehicle').click(function (e) { 
        e.preventDefault();
        resetForm()
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
        id = $('#idv').val();
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
        datos.append('id', id)
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
                    resetForm()
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
    //************************************************/
    //*********Contador de Caracteres de text*********/
    //***************area con indicador***************/
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
    //************************************************/
    //******Opcion para actualizar la informacion*****/
    //*******************del Vehiculo*****************/
    $(document).on("click", ".btnedit", function(){	            
        id = $('#idv').val();
        $.ajax({
            url: "assets/app/vehicle/vehicle_controller.php?op=show",
            type: "POST",
            dataType:"json",    
            data:  {id:id},
            success: function(data) {
                console.log(data);
                $.each(data, function(idx, opt) {  
                    $('#plate').val(opt.plate);
                    $('#vregion').val(opt.region);
                    $('#vbrand').val(opt.brand);
                    $('#vmodel').val(opt.model);
                    $('#vanno').val(opt.anno);
                    $('#vcost').val(opt.cost);
                    $('#vstatus').val(opt.status);
                    $('#vdescrip').val(opt.descrip);                   
                });
                $("#carimg").prop('required',false);
                $(".modal-title").text("Editar infomacion Vehiculo")
                $('#VehicleModal').modal('show'); 
              
            }
          });


    });
    //************************************************/
    //*******Opcion para Inhabilitar el Vehidulo******/
    //***************para que sea no visible**********/
    $(document).on("click", ".btncancel", function(){
        id = $('#idv').val();
        active = 0
        Swal.fire({
            title: "¿Está seguro de borrar esta informacion?",
            showCancelButton: true,
            confirmButtonText: "Si",
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "assets/app/vehicle/vehicle_controller.php?op=newactive",
                    type: "POST",
                    dataType:"json",    
                    data:  {id:id,active:active},
                    success: function(data) {
                      if (data.status == true) {
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000,
                            });         
                        setTimeout(() => {
                            vehicletable.ajax.reload(null, false);
                        }, 1000);
                      } else {
                        Swal.fire({
                            icon: 'error',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000,
                            }); 
                      }                   
                    }
                  });
            }
        });        
    });
    //************************************************/
    //*******Opcion para visualizar las imagenes******/
    //***************de los vehiculos activo**********/
    $(document).on("click", ".btnpicture", function(){
        id = $('#idv').val();
        getImage(id)
        $(".modal-title").text("Imagenes de Vehiculo")
        $('#exampleModal').modal('show');
        
    });
    //************************************************/
    //*******Opcion para seleccionar la imagen********/
    //*********que se motrara en el portafolio********/
    $(document).on("click", ".toppicture", function () {
        id = $('#idiv').val();
        id2 = $('#idic').val();
        $.ajax({
            url: "assets/app/vehicle/vehicle_controller.php?op=topimage",
            type: "POST",
            dataType:"json",    
            data:  {id:id,id2:id2},
            success: function(data) {
                if (data.status == true) {
                    $("#erroriv").text(data.message);
                    $('#messegeiv').addClass('alert-success');
                    $("#messegeiv").show();
                    setTimeout(() => {
                        $("#erroriv").text("");
                        $("#messegeiv").hide();
                    }, 3000);
                } else {
                $("#erroriv").text(data.message);
                $('#messegeiv').addClass('alert-danger');
                $("#messegeiv").show();
                setTimeout(() => {
                    $("#erroriv").text("");
                    $("#messegeiv").hide();
                }, 3000);
                }      
            }
          });
    });
    //************************************************/
    //*******Opcion para Inhabilitar las imagenes*****/
    //***************para que sea no visible**********/
    $(document).on("click", ".cancelpicture", function () {
        id = $('#idiv').val();
        active = 0
        $.ajax({
            url: "assets/app/vehicle/vehicle_controller.php?op=cancelimage",
            type: "POST",
            dataType:"json",    
            data:  {id:id,active:active},
            success: function(data) {
                if (data.status == true) {
                    $("#erroriv").text(data.message);
                    $('#messegeiv').addClass('alert-success');
                    $("#messegeiv").show();
                    getImage(id)
                    setTimeout(() => {
                        $("#erroriv").text("");
                        $("#messegeiv").hide();
                    }, 3000);
                  } else {
                    $("#erroriv").text(data.message);
                    $('#messegeiv').addClass('alert-danger');
                    $("#messegeiv").show();
                    setTimeout(() => {
                        $("#erroriv").text("");
                        $("#messegeiv").hide();
                    }, 3000);
                  }       
            }
          });
    });
});

function takeIdV(id) {
    $('#idv').val(id);
}

function takeIdIV(id,car) {
    $('#idiv').val(id);
    $('#idic').val(car);
}

function getImage(id) {
    $.ajax({
        url: "assets/app/vehicle/vehicle_controller.php?op=showimage",
        type: "POST",
        dataType:"json",    
        data:  {id:id},
        success: function(data) {
            $('#galeryv').empty();
            $.each(data, function(idx, opt) {
                $("#galeryv").append(
                    '<div class="col">'+
                        '<div class="card mb-4 rounded-3 shadow-sm">'+
                            '<div class="card-body">'+
                                '<picture>'+
                                    '<img src="assets/img/vehicle/'+opt.imgcar+'" class="imgfluid" alt="Galeria de vehiculos"/>'+
                                '</picture>'+
                                '<ul class="list-unstyled mt-2 mb-2">'+
                                    '<li>'+opt.imgcar+'</li>'+
                                '</ul>'+
                                '<button type="button" class="btn btn-sm btn-outline-primary toppicture" onclick="takeIdIV(`'+opt.id+'`,`'+opt.car+'`)">top</button>'+
                                '<button type="button" class="btn btn-sm btn-outline-danger cancelpicture" onclick="takeIdIV(`'+opt.id+'`)">Eliminar</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            });               
        }
      });
}

function resetForm() {
    $('#idv').val('');
    $('#plate').val('');
    $('#vregion').val('');
    $('#vbrand').val('');
    $('#vmodel').val('');
    $('#vanno').val('');
    $('#vcost').val('');
    $('#vstatus').val('');
    $('#vdescrip').val('');
    $("#carimg").val(null);
}
