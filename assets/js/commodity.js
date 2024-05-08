var subselector = 'All';
var checkimage = false;

$(document).ready(function () {

    session = $.trim($('#session').val());
    if (session=='desactiva') {
        window.open('./');  
    }

    $('#subselector').change(function (e) {

        e.preventDefault();
        subselector = $('#subselector').val();
        getContenttable(subselector,checkimage)

    });

    $("#checkimage").click(function (e) {
        
        if ($('#checkimage').prop('checked')) {
            checkimage = $('#checkimage').prop('checked');
        } else {
            checkimage = $('#checkimage').prop('checked');
        }
        getContenttable(subselector,checkimage)

    });

    $('#formCommodity').submit(function (e) { 
        e.preventDefault();

        idCommodity      = $.trim($('#idCommodity').val());
        descripCommodity = $.trim($('#descripCommodity').val());
        image = $("#image")[0].files[0];

        var datos = new FormData();

        datos.append('idCommodity', idCommodity)
        datos.append('descripCommodity', descripCommodity)
        datos.append('image', image)


        $.ajax({
            url: "src/app/commodity/commodity_controller.php?op=save_update",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
              console.log(data)
                swal("Has Actualizado Exitosamente el Producto: ", {
                    buttons: false,
                    icon: "success",
                    timer: 2000,
                });

                $('#CommodityModal').modal('hide');

                setTimeout(() => {
                    CommoTable.ajax.reload(null, false);
                  }, 1000);
                
              
            }
    
          });
        
    });

    $('#btnCommodity').click(function (e) {
        e.preventDefault();

        wipe()         
        $(".modal-content").css("background", "rgb(255,24,8)" );
        $(".modal-content").css("background", "linear-gradient(90deg, rgba(255,24,8,0.6643032212885154) 0%, rgba(103,121,9,0.6727065826330532) 50%, rgba(0,78,255,0.6839110644257703) 100%)" );
        $(".modal-title").text("Crear Nueva Productos")		
        $('#CommodityModal').modal('show');	
    });

    $(document).on("click", ".BtnEditComm", function(){		        
        fila = $(this).closest("tr");	        		            
        idCommodity  = fila.find('td:eq(1)').text();
        descripCommodity = fila.find('td:eq(2)').text(); //capturo el ID

        $("#idCommodity").val(idCommodity);
        $("#descripCommodity").val(descripCommodity);
        $(".modal-content").css("background", "rgb(255,24,8)" );
        $(".modal-content").css("background", "linear-gradient(90deg, rgba(255,24,8,0.6643032212885154) 0%, rgba(103,121,9,0.6727065826330532) 50%, rgba(0,78,255,0.6839110644257703) 100%)" );
        $(".modal-title").text("Editar Informacion de Productos");		
        $('#CommodityModal').modal('show');	
    });

    $(document).on("click", ".BtnDeleteComm", function(){
        fila = $(this); 
        idCommodity  = fila.find('td:eq(1)').text();
        descripCommodity = fila.find('td:eq(2)').text() 

        idCommodity = $(this).closest('tr').find('td:eq(1)').text();
        descripCommodity = $(this).closest('tr').find('td:eq(2)').text();

        var datos = new FormData();

        datos.append('idCommodity', idCommodity)
        datos.append('descripCommodity', descripCommodity)

  
        swal({
        
            title: "Eliminar Marca",
            text: "¿Está seguro de borrar el registro "+descripCommodity+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "src/app/commodity/commodity_controller.php?op=delete",
                    type: "POST",
                    dataType:"json",
                    data:  datos,   
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        swal("¡Se elimino marca Exitosamente!", {
                          buttons: false,
                          icon: "success",
                          timer: 1000,
                          
                        });
                                  
                        setTimeout(() => {
                            CommoTable.ajax.reload(null, false);
                        }, 1000);
          
                    
                                          
                     }
                  });	
            }
          });
  
      });
    
});

function stampselector() {
    $.ajax({
        type: "POST",
        url: "src/app/commodity/commodity_controller.php?op=stampselector",
        dataType: "json",
        success: function (data) {
            $('#subselector').append('<option value="All" selected>Seleccione Sucursal</option>');
            $.each(data, function(idx, opt) {
                $('#subselector').append('<option name="" value="' + opt.CodSucu +'">' + opt.Descrip + '</option>');

            });
                       
        }
    });
    
}

function getContenttable(subselector, checkimage) {

    console.log(checkimage)

    if (CommoTable) {

        $('#CommoTable').DataTable().destroy();

        CommoTable = $('#CommoTable').DataTable({  
            "pageLength": 50,
            "ajax":{            
                "url": "src/app/commodity/commodity_controller.php?op=enlist", 
                "method": 'POST', //usamos el metodo POST
                "data":  {'subselector':subselector, 'checkimage':checkimage},
                "dataSrc":""
            },
            "columns":[
                {"data": "sucu"},
                {"data": "codp"},
                {"data": "producto"},
                {"data": "reference"},
                {"data": "marca"},
                {"data": "available"},
                {"data": "imagep",
                    "render":function(data,type,row) {
                        return '<center><img src="src/assets/img/gallery/'+data+'" width="100px" height="100px"></center>'
                    }
                },
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditComm'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger btn-sm BtnDeleteComm'><i class='bi bi-trash3'></i></button></div></div>"}
            ],
            "columnDefs": [
                { "width": "50%", "targets": 2 }
              ]
        });
        
    } else {

        CommoTable = $('#CommoTable').DataTable({  
            "pageLength": 50,
            "ajax":{            
                "url": "src/app/commodity/commodity_controller.php?op=enlist", 
                "method": 'POST', //usamos el metodo POST
                "data":  {'subselector':subselector, 'checkimage':checkimage},
                "dataSrc":""
            },
            "columns":[
                {"data": "sucu"},
                {"data": "codp"},
                {"data": "producto"},
                {"data": "reference"},
                {"data": "marca"},
                {"data": "imagep",
                    "render":function(data,type,row) {
                        return '<center><img src="src/assets/img/gallery/'+data+'" width="100px" height="100px"></center>'
                    }
                },
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditComm'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger btn-sm BtnDeleteComm' disabled><i class='bi bi-trash3'></i></button></div></div>"}
            ],
            "columnDefs": [
                { "width": "50%", "targets": 2 }
              ]

        });
        
    }

}

function wipe() {
    $("#idCommodity").val("");
    $('#descripCommodity').val("");
}

stampselector()
getContenttable(subselector, checkimage)