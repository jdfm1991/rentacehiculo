$(document).ready(function () {
    $('#messegeu').hide();
    //************************************************/
    //********Accion para cargar la informacion*******/
    //**************el Datatable de Usuarios**********/
    usertable = $('#usertable').DataTable({
        responsive: true,  
        pageLength: 25,
        ajax:{            
            url: "assets/app/user/user_controller.php?op=showadmin", 
            method: 'POST', 
            dataSrc:""
        },
        columns:[
            {data: "email"},
            {data: "id",
                "render":function(data,type,row) {
                    return "<div class='text-center'>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-info btn-sm btneditu'><i class='bi bi-pencil-square'></i></a>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-danger btn-sm btncancelu'><i class='bi bi-x-octagon'></i></a>"+
                    "</div>"
                }
            },
        ],

    });
    //************************************************/
    //********Accion para cargar la informacion*******/
    //**************el Datatable de Usuarios**********/
    regiontable = $('#regiontable').DataTable({
        responsive: true,  
        pageLength: 25,
        ajax:{            
            url: "assets/app/user/user_controller.php?op=showadmin", 
            method: 'POST', 
            dataSrc:""
        },
        columns:[
            {data: "email"},
            {data: "id",
                "render":function(data,type,row) {
                    return "<div class='text-center'>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-info btn-sm btneditr'><i class='bi bi-pencil-square'></i></a>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-danger btn-sm btncancelr'><i class='bi bi-x-octagon'></i></a>"+
                    "</div>"
                }
            },
        ],

    });
    //************************************************/
    //*******Opcion para cargar la infomrmacion*******/
    //*****************del usuario nuevo**************/
    $('#btnuser').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Registro de Usuario")
        $('#userModal').modal('show');
    });
    //************************************************/
    //*******Opcion para editar la infomrmacion*******/
    //*************del usuario existebte**************/
    $(document).on("click", ".btncancelu", function(){
        id = $('#settingID').val();
        active = 0
        Swal.fire({
            title: "¿Está seguro de borrar esta informacion?",
            showCancelButton: true,
            confirmButtonText: "Si",
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "assets/app/user/user_controller.php?op=remove",
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
                            usertable.ajax.reload(null, false);
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
    //******Opcion para actualizar la informacion*****/
    //*******************del Usuario******************/
    $(document).on("click", ".btneditu", function(){	            
        id = $('#settingID').val();
        $.ajax({
            type: "POST",
            url: "assets/app/user/user_controller.php?op=searchadmin",
            dataType: "json",
            data:  {id:id},
            success: function (data) {
                $('#emailu').prop('disabled',true);
                $.each(data, function(idx, opt) {
                    $('#emailu').val(opt.email);
                });
                $(".modal-title").text("Edicion de Usuario")
                $('#userModal').modal('show');
            }
        });
    });
    //************************************************/
    //**********Evento para enviar informacion********/
    //*************para actializar usuario************/
    $('#formuser').submit(function (e) { 
        e.preventDefault();
        id = $('#settingID').val();
        email = $('#emailu').val();
        passw = $('#passu').val();
        $.ajax({
            url: "assets/app/user/user_controller.php?op=registeruser",
            type: "POST",
            dataType:"json",    
            data:  {id:id,email:email,passw:passw},
            success: function(data) {
              if (data.status == true) {
                Swal.fire({
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000,
                    });         
                setTimeout(() => {
                    usertable.ajax.reload(null, false);
                }, 1000);
                $('#userModal').modal('hide'); 
              } else {
                $("#erroru").text(data.message);
                    $("#messegeu").show();
                    setTimeout(() => {
                        $("#erroru").text("");
                        $("#messegeu").hide();
                    }, 3000);
              } 
                               
            }
          });
        
    });
});
function takeId(id) {
    $('#settingID').val(id);
}