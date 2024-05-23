$(document).ready(function () {
    const session = $.trim($('#session').val());
    const windowsScreen = window.matchMedia("(max-width: 992px)")
    $('#messegep').hide();
    $('#formRequest').hide();
    //************************************************/
    //**********Evento para Crear la tabla de*********/
    //***********del cliente para su gestion**********/
    requsertable = $('#requsertable').DataTable({
        responsive: true,  
        pageLength: 50,
        ajax:{            
            url: "assets/app/rent/rent_controller.php?op=show", 
            method: 'POST', //usamos el metodo POST
            data:  {'user':session},
            dataSrc:""
        },
        columns:[
            {data: "id"},
            {data: "daterent"},
            {data: "brand"},
            {data: "model"},
            {data: "mont"},
            {data: "status"},
            {data: "id",
                    "render":function(data,type,row) {
                        return "<div class='text-center'><a href='assets/app/rent/pdf.php?id="+data+"' class='btn btn-outline-info' target='_blank' rel='noopener noreferrer'><i class='bi bi-printer'></i><span>Visualizar</span></a></div>"
                    }
                },
        ],

    });
    //************************************************/
    //**********Evento para Crear la tabla de*********/
    //***********del cliente para su gestion**********/
    allrequsertable = $('#allrequsertable').DataTable({
        pageLength: 10,
        scrollCollapse:true,
        ajax:{            
            url: "assets/app/rent/rent_controller.php?op=showall", 
            method: 'POST', //usamos el metodo POST
            dataSrc:""
        },
        columns:[
            {data: "id"},
            {data: "nameu"},
            {data: "phone"},
            {data: "status"},
        ],
    });
    //************************************************/
    //**********Evento para seleccionar una***********/
    //******solicitud y cargar la informacion en******/
    //************Formulario correpondiente***********/
    $('#allrequsertable tbody').on('click', 'tr', function () {
        //Disable Input Data
        $('#logoreq').hide();
        $('#formRequest').show();
        $('#rname2').prop( "disabled", true );
        $('#rphone2').prop( "disabled", true );
        $('#dni2').prop( "disabled", true );
        $('#rbrand2').prop( "disabled", true );
        $('#rmodel2').prop( "disabled", true );
        $('#ranno2').prop( "disabled", true );
        $('#rplate2').prop( "disabled", true );
        $('#rcost2').prop( "disabled", true );
        $('#fechar2').prop( "disabled", true );
        $('#fechae2').prop( "disabled", true );
        $('#mont2').prop( "disabled", true );
        $('#metho2').prop( "disabled", true );
        $('#fechap2').prop( "disabled", true );
        $('#reference2').prop( "disabled", true );
        id = $( this ).closest('tr').find('td:eq(0)').text()
        $('#idreq').val(id);
        $.ajax({
            url: "assets/app/rent/rent_controller.php?op=showreq",
            method: "POST",
            dataType: "json",
            data:  {id:id},
            success: function (data) {
                console.log(data);
                $.each(data, function(idx, opt) {
                    $('#idreq').val(opt.id);
                    $('#idcar').val(opt.car);
                    fechar = new Date(opt.datein).toISOString().substring(0,10)
                    fechae = new Date(opt.dateout).toISOString().substring(0,10)
                    fechap = new Date(opt.datepayment).toISOString().substring(0,10)
                    $('#idsol').text(opt.id);
                    $('#estsol').text(opt.status);
                    $('#rname2').val(opt.nameu);
                    $('#rphone2').val(opt.phone);
                    $('#dni2').val(opt.letter+'-'+opt.dni);
                    $('#rbrand2').val(opt.brand);
                    $('#rmodel2').val(opt.model);
                    $('#ranno2').val(opt.anno);
                    $('#rplate2').val(opt.plate);
                    $('#rcost2').val(opt.cost);
                    $('#fechar2').val(fechar)
                    $('#fechae2').val(fechae)
                    $('#mont2').val(opt.mont);
                    $('#metho2').val(opt.method);
                    $('#fechap2').val(fechap)
                    $('#reference2').val(opt.reference);
                    $('#datamethod2').empty();
                    $('#datamethod2').append('<img class="d-block" src="assets/img/payment/'+opt.payment+'" alt="" width="200">')
                }); 
            }
        });
    });
    //************************************************/
    //**********Condicion para ocultar columnas*******/
    //************para hacer la version movil*********/
    if (windowsScreen.matches) {
        requsertable.columns([2,3,4,5]).visible(false)
    }
    //************************************************/
    //***********Cargar estados de solicitud**********/
    //************************************************/
    $.ajax({
        url: "assets/app/admin/admin_controller.php?op=showstatus",
        method: "POST",
        dataType: "json",
        success: function(data) {
            $('#newstatus').append('<option value="">-*_-*-_-*</option>');
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $('#newstatus').append('<option value="'+opt.id+'">'+opt.status+'</option>');
            });
        }
    });

    $('#formRequest').submit(function (e) { 
        e.preventDefault();
        id = $('#idreq').val();
        option = $('#idcar').val();
        condition = $('#newstatus').val();
        if (condition==3) {
            carstatus = 3
        }else{
            carstatus = '' 
        }
        $.ajax({
            type: "POST",
            url: "assets/app/rent/rent_controller.php?op=register",
            dataType: "json",
            data:  {id:id,condition:condition,option:option,carstatus:carstatus},
            success: function (data) {
                if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        html: '<h2>¡'+data.messege+'!</h2>',
                        showConfirmButton: false,
                        timer: 2000,
                        })         
                    setTimeout(() => {
                        allrequsertable.ajax.reload(null, false);
                        resetFormRequest()
                    }, 1500);
                    $('#logoreq').show();
                    $('#formRequest').hide();
                } else {
                    Swal.fire({
                        icon: 'error',
                        html: '<h2>¡'+data.messege+'!</h2>',
                        showConfirmButton: false,
                        timer: 2000,
                        })         
                    setTimeout(() => {
                        allrequsertable.ajax.reload(null, false);
                    }, 2000);
                    $('#rentModal').modal('hide');
                }
            }
        });
        
    });
});

function resetFormRequest() {
    $('#idsol').text('');
    $('#estsol').text('');
    $('#rname2').val('');
    $('#rphone2').val('');
    $('#dni2').val('');
    $('#rbrand2').val('');
    $('#rmodel2').val('');
    $('#ranno2').val('');
    $('#rplate2').val('');
    $('#rcost2').val('');
    $('#fechar2').val('')
    $('#fechae2').val('')
    $('#mont2').val('');
    $('#metho2').val('');
    $('#fechap2').val('')
    $('#reference2').val('');
}
    

