$(document).ready(function () {
    const session = $.trim($('#session').val());
    const windowsScreen = window.matchMedia("(max-width: 992px)")
    $('#messegep').hide();
    //************************************************/
    //**********Evento para Cargar Informacion********/
    //**************en la pagina de profile***********/
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
    //**********Condicion para ocultar columnas*******/
    //************para hacer la version movil*********/
    if (windowsScreen.matches) {
        requsertable.columns([2,3,4,5]).visible(false)
    }
});
    

