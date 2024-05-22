$(document).ready(function () {
    //************************************************/
    //********Accion para cargar la informacion*******/
    //**************el Datatable de Usuarios**********/
    usertable = $('#usertable').DataTable({
        responsive: true,  
        pageLength: 25,
        ajax:{            
            url: "assets/app/user/user_controller.php?op=showall", 
            method: 'POST', 
            dataSrc:""
        },
        columns:[
            {data: "nameu"},
            {data: "address"},
            {data: "phone"},
            {data: "email"},
            {data: "status",
                "render":function(data,type,row) {
                    if (data==0) {
                        return 'No Aprobado';
                    }else{
                        return 'Aprobado';
                    }
                }
            },
            {data: "type"},
            {data: "user",
                "render":function(data,type,row) {
                    return "<div class='text-center'>"+
                    "<a href='#' onclick='takeIdU(`"+data+"`)' class='btn btn-outline-info btn-sm btnedit'><i class='bi bi-pencil-square'></i></a>"+
                    "<a href='#' onclick='takeIdU(`"+data+"`)' class='btn btn-outline-danger btn-sm btncancel'><i class='bi bi-x-octagon'></i></a>"+
                    "<a href='assets/app/user/pdf.php?id="+data+"' class='btn btn-outline-info btn-sm' target='_blank'><i class='bi bi-printer'></i></a>"+
                    "</div>"
                }
            },
        ],

    });
    //************************************************/
    //*******Opcion para Inhabilitar el Usuario*******/
    //***************para que sea no visible**********/
    $(document).on("click", ".btncancel", function(){
        id = $('#idu').val();
        active = 0
        Swal.fire({
            title: "¿Está seguro de borrar esta informacion?",
            showCancelButton: true,
            confirmButtonText: "Si",
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "assets/app/user/user_controller.php?op=newactive",
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
    $(document).on("click", ".btnedit", function(){	            
        id = $('#idu').val();
        $.ajax({
            type: "POST",
            url: "assets/app/user/user_controller.php?op=show",
            dataType: "json",
            data:  {id:id},
            success: function (data) {
                $('#usupid').empty();
                $('#uname').prop('disabled',true);
                $('#dni').prop('disabled',true);
                $('#uemail').prop('disabled',true);
                $('#uphone').prop('disabled',true);
                $('#uaddress').prop('disabled',true);
                $('#upassw').prop('disabled',true);
                $.each(data, function(idx, opt) {
                    $('#usupid').empty();
                    $('#uname').val(opt.nameu);
                    $('#dni').val(opt.letter+'-'+opt.dni);
                    $('#uemail').val(opt.email);
                    $('#uphone').val(opt.phone);
                    $('#uaddress').val(opt.address);
                    if (opt.imgdni) {
                        $('#usupid').append(
                            '<label for="pphone" class="form-label">Comprobante de Indentificacion </label>'+
                            '<img class="d-block mx-auto mb-4" src="assets/img/identifications/'+opt.imgdni+'" alt="" height="250">'
                        ) 
                    } else {
                        $('#usupid').append(
                            '<label for="pphone" class="form-label">Comprobante de Indentificacion </label>'+
                            '<img class="d-block mx-auto mb-4" src="assets/img/identifications/documento.png" alt="" height="250">') 
                    }
                });
                $(".modal-title").text("Infomacion de Usuario")
                $('#UserModal').modal('show');
            }
        });
    });
    //************************************************/
    //**********Evento para enviar informacion********/
    //*************para actializar usuario************/
    $('#formUser').submit(function (e) { 
        e.preventDefault();
        id = $('#idu').val();
        $.ajax({
            url: "assets/app/user/user_controller.php?op=newstatus",
            type: "POST",
            dataType:"json",    
            data:  {id:id},
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
              $('#UserModal').modal('hide');                  
            }
          });
        
    });
});
function takeIdU(id) {
    $('#idu').val(id);
}