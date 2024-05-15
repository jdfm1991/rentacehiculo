$(document).ready(function () {
    //************************************************/
    //***********Funcion para Validar solo************/
    //**************Entrada de Numeros****************/
    $(function() {
        $("input[name='phone']").on('input',function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g,''));
        });
    });
    //************************************************/
    //***********Evento para Mostrar modal************/
    //**************de inicio de sesion***************/
    $("#btnLogin").click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Inicio de Sesion")
        $("#messegel").hide();
        $("#optreg").hide();
        $("#name").prop('required',false);
        $("#phone").prop('required',false);
        $("#btnRegister").hide();
        $("#btnStart").show();
        $("#options").show();	
        $('#loginModal').modal('show');	
    });
    //************************************************/
    //***********Evento para cerrar sesion************/
    //************************************************/
    $('#btnLogout').click(function (e) { 
        e.preventDefault();
        $(location).attr('href','logout.php');
    });
    //************************************************/
    //***********Evento para registrar un ************/
    //******************nuevo usuario*****************/
    $('#lnkRegister').click(function (e) { 
        e.preventDefault();
        $("#btnStart").hide();
        $("#options").hide();
        $("#optreg").show();
        $("#name").prop('required',true);
        $("#phone").prop('required',true);
        $("#btnRegister").show();
    });
    //************************************************/
    //***********Evento para enviar infor*************/
    //**************para iniciar sesion***************/
    $("#formLogin").submit(function (e) { 
        e.preventDefault();
        email = $.trim($('#email').val());
        passw = $.trim($('#pass').val());

        var datos = new FormData();
        datos.append('email', email)
        datos.append('passw', passw)
        $.ajax({
            url: "assets/app/home/home_controller.php?op=login",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
                if (data['status']==true) {
                    if (data['ut']=='Administrativo') {
                        $('#loginModal').modal('hide');
                        wipe()
                        alert('eres '+ data['ut'])
                        location.reload(); 
                    }
                    if (data['ut']=='Cliente') {
                        $('#loginModal').modal('hide');
                        wipe() 
                        alert('eres '+ data['ut'])
                        location.reload();
                    }
                } else {
                    $("#errorl").text(data['message']);
                    $("#messegel").show();
                    setTimeout(() => {
                        $("#errorl").text("");
                        $("#messegel").hide();
                    }, 3000);
                }
            }
        });
    });
    //************************************************/
    //***********Evento para guardar infor************/
    //**************de nuevo usuario******************/
    $("#btnRegister").click(function (e) { 
        e.preventDefault();
        name = $.trim($('#name').val());
        phone = $.trim($('#phone').val());
        email = $.trim($('#email').val());
        passw = $.trim($('#pass').val());
        var datos = new FormData();
        datos.append('name', name)
        datos.append('phone', phone)
        datos.append('email', email)
        datos.append('passw', passw)
        $.ajax({
            url: "assets/app/home/home_controller.php?op=register",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
                if (data['status']==true) {
                    $('#loginModal').modal('hide');
                    wipe() 
                    alert('eres '+ data['ut'])
                    location.reload();
                } else {
                    $("#errorl").text(data['message']);
                    $("#messegel").show();
                    setTimeout(() => {
                        $("#errorl").text("");
                        $("#messegel").hide();
                    }, 3000);
                }
            }
        });
    });
    //************************************************/
    //***********Evento para abril modal**************/
    //***********para recuperar contrasenna***********/
    $("#forget").click(function (e) { 
        e.preventDefault();
        $(".modal-title").text("Recuperar Contraseña")
        $("#messegef").hide();	
        $('#loginModal').modal('hide');
        $('#forgetModal').modal('show');	
    });
    //************************************************/
    //***********evento envio de informacion**********/
    //***********para recuperar contrasenna***********/
    $("#formforget").submit(function (e) { 
        e.preventDefault();
        email = $.trim($('#emailf').val());
        var datos = new FormData();
        datos.append('email', email)
        $.ajax({
            url: "assets/app/home/home_controller.php?op=forget",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
                console.log(data);
                if (data['status']==true) {
                    alert('Enviado ')
                    location.reload(); 
                } else {
                    $("#errorl").text(data['message']);
                    $("#messegel").show();
                    setTimeout(() => {
                        $("#errorl").text("");
                        $("#messegel").hide();
                    }, 3000);
                }
            }
        });
        
    });
});

function wipe() {
    $("#email").val("");
    $('#passw').val("");
}