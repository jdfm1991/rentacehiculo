$(document).ready(function () {
    $('#messegeu').hide();
    $('#rmessege').hide();
    $('#bmessege').hide();
    $('#mmessege').hide();
    //************************************************/
    //********Accion para cargar la informacion*******/
    //**************el Datatable de Usuarios**********/
    usertable = $('#usertable').DataTable({
        responsive: true,  
        pageLength: 5,
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
    //**************el Datatable de Regiones**********/
    regiontable = $('#regiontable').DataTable({
        responsive: true,  
        pageLength: 5,
        ajax:{            
            url: "assets/app/initialcharge/initialcharge_controller.php?op=region", 
            method: 'POST', 
            dataSrc:""
        },
        columns:[
            {data: "region"},
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
    //********Accion para cargar la informacion*******/
    //**************el Datatable de marcas************/
    brandtable = $('#brandtable').DataTable({
        responsive: true,  
        pageLength: 5,
        ajax:{            
            url: "assets/app/initialcharge/initialcharge_controller.php?op=brand", 
            method: 'POST', 
            dataSrc:""
        },
        columns:[
            {data: "brand"},
            {data: "id",
                "render":function(data,type,row) {
                    return "<div class='text-center'>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-info btn-sm btneditb'><i class='bi bi-pencil-square'></i></a>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-danger btn-sm btncancelb'><i class='bi bi-x-octagon'></i></a>"+
                    "</div>"
                }
            },
        ],

    });
    //************************************************/
    //********Accion para cargar la informacion*******/
    //**************el Datatable de modelos***********/
    modeltable = $('#modeltable').DataTable({
        responsive: true,  
        pageLength: 5,
        ajax:{            
            url: "assets/app/initialcharge/initialcharge_controller.php?op=model", 
            method: 'POST', 
            dataSrc:""
        },
        columns:[
            {data: "model"},
            {data: "brand"},
            {data: "id",
                "render":function(data,type,row) {
                    return "<div class='text-center'>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-info btn-sm btneditm'><i class='bi bi-pencil-square'></i></a>"+
                    "<a href='#' onclick='takeId(`"+data+"`)' class='btn btn-outline-danger btn-sm btncancelm'><i class='bi bi-x-octagon'></i></a>"+
                    "</div>"
                }
            },
        ],

    });
    //************************************************/
    //*******Opcion para abrir modal para crear*******/
    //*****************usuario nuevo******************/
    $('#btnuser').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Registro de Usuario")
        $('#userModal').modal('show');
    });
    //************************************************/
    //*******Opcion para editar la infomrmacion*******/
    //*************del usuario existente**************/
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
    //*********************usuario********************/
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
    //************************************************/
    //*******Opcion para abrir modal para crear*******/
    //****************region nueva********************/
    $('#btnregion').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Registro de Usuario")
        $('#regionModal').modal('show');
    });
    //************************************************/
    //*******Opcion para editar la infomrmacion*******/
    //*************del region existente***************/
    $(document).on("click", ".btncancelr", function(){
        id = $('#settingID').val();
        active = 0
        Swal.fire({
            title: "¿Está seguro de borrar esta informacion?",
            showCancelButton: true,
            confirmButtonText: "Si",
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "assets/app/initialcharge/initialcharge_controller.php?op=removeregion",
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
                            regiontable.ajax.reload(null, false);
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
    $(document).on("click", ".btneditr", function(){	            
        id = $('#settingID').val();
        $.ajax({
            type: "POST",
            url: "assets/app/initialcharge/initialcharge_controller.php?op=searchregion",
            dataType: "json",
            data:  {id:id},
            success: function (data) {
                $.each(data, function(idx, opt) {
                    $('#nregion').val(opt.region);
                });
                $(".modal-title").text("Edicion de Region")
                $('#regionModal').modal('show');
            }
        });
    });
    //************************************************/
    //**********Evento para enviar informacion********/
    //******************las regiones******************/
    $('#formregion').submit(function (e) { 
        e.preventDefault();
        id = $('#settingID').val();
        region = $('#nregion').val();
        $.ajax({
            url: "assets/app/initialcharge/initialcharge_controller.php?op=createregion",
            type: "POST",
            dataType:"json",    
            data:  {id:id,region:region},
            success: function(data) {
              if (data.status == true) {
                Swal.fire({
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000,
                    });         
                setTimeout(() => {
                    regiontable.ajax.reload(null, false);
                }, 1000);
                $('#regionModal').modal('hide'); 
              } else {
                $("#rerror").text(data.message);
                    $("#rmessege").show();
                    setTimeout(() => {
                        $("#rerror").text("");
                        $("#rmessege").hide();
                    }, 3000);
              } 
                               
            }
          });
        
    });
    //************************************************/
    //*******Opcion para abrir modal para crear*******/
    //****************region nueva********************/
    $('#btnbrand').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Registro de Marca")
        $('#brandModal').modal('show');
    });
    //************************************************/
    //*******Opcion para editar la infomrmacion*******/
    //*************del marca existente***************/
    $(document).on("click", ".btncancelb", function(){
        id = $('#settingID').val();
        active = 0
        Swal.fire({
            title: "¿Está seguro de borrar esta informacion?",
            showCancelButton: true,
            confirmButtonText: "Si",
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "assets/app/initialcharge/initialcharge_controller.php?op=removebrand",
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
                            brandtable.ajax.reload(null, false);
                            modeltable.ajax.reload(null, false);
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
    //*******************del marca******************/
    $(document).on("click", ".btneditb", function(){	            
        id = $('#settingID').val();
        $.ajax({
            type: "POST",
            url: "assets/app/initialcharge/initialcharge_controller.php?op=searchbrand",
            dataType: "json",
            data:  {id:id},
            success: function (data) {
                $.each(data, function(idx, opt) {
                    $('#nbrand').val(opt.brand);
                });
                $(".modal-title").text("Edicion de Marca")
                $('#brandModal').modal('show');
            }
        });
    });
    //************************************************/
    //**********Evento para enviar informacion********/
    //******************las marca******************/
    $('#formbrand').submit(function (e) { 
        e.preventDefault();
        id = $('#settingID').val();
        brand = $('#nbrand').val();
        $.ajax({
            url: "assets/app/initialcharge/initialcharge_controller.php?op=createbrand",
            type: "POST",
            dataType:"json",    
            data:  {id:id,brand:brand},
            success: function(data) {
              if (data.status == true) {
                Swal.fire({
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000,
                    });         
                setTimeout(() => {
                    brandtable.ajax.reload(null, false);
                    modeltable.ajax.reload(null, false);
                }, 1000);
                $('#brandModal').modal('hide'); 
              } else {
                $("#berror").text(data.message);
                    $("#bmessege").show();
                    setTimeout(() => {
                        $("#berror").text("");
                        $("#bmessege").hide();
                    }, 3000);
              } 
                               
            }
          });
        
    });
    //************************************************/
    //*******Opcion para abrir modal para crear*******/
    //****************region nueva********************/
    $('#btnmodel').click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Registro de Modelo")
        $('#modelModal').modal('show');
    });
    //************************************************/
    //*******Opcion para editar la infomrmacion*******/
    //*************del marca existente***************/
    $(document).on("click", ".btncancelm", function(){
        id = $('#settingID').val();
        active = 0
        Swal.fire({
            title: "¿Está seguro de borrar esta informacion?",
            showCancelButton: true,
            confirmButtonText: "Si",
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "assets/app/initialcharge/initialcharge_controller.php?op=removemodel",
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
                            modeltable.ajax.reload(null, false);
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
    //*******************del marca******************/
    $(document).on("click", ".btneditm", function(){	            
        id = $('#settingID').val();
        $.ajax({
            type: "POST",
            url: "assets/app/initialcharge/initialcharge_controller.php?op=searchmodel",
            dataType: "json",
            data:  {id:id},
            success: function (data) {
                $.each(data, function(idx, opt) {
                    $('#nmodel').val(opt.model);
                    $('#mbrand2').val(opt.brand);
                });
                $(".modal-title").text("Edicion de Marca")
                $('#modelModal').modal('show');
            }
        });
    });
    //************************************************/
    //**********Evento para enviar informacion********/
    //******************las modelos*******************/
    $('#formmodel').submit(function (e) { 
        e.preventDefault();
        id = $('#settingID').val();
        model = $('#nmodel').val();
        brand = $('#mbrand2').val();
        $.ajax({
            url: "assets/app/initialcharge/initialcharge_controller.php?op=createmodel",
            type: "POST",
            dataType:"json",    
            data:  {id:id,model:model,brand:brand},
            success: function(data) {
              if (data.status == true) {
                Swal.fire({
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000,
                    });         
                setTimeout(() => {
                    brandtable.ajax.reload(null, false);
                    modeltable.ajax.reload(null, false);
                }, 1000);
                $('#modelModal').modal('hide'); 
              } else {
                $("#berror").text(data.message);
                    $("#bmessege").show();
                    setTimeout(() => {
                        $("#berror").text("");
                        $("#bmessege").hide();
                    }, 3000);
              } 
                               
            }
          });
        
    });
});
function takeId(id) {
    $('#settingID').val(id);
}