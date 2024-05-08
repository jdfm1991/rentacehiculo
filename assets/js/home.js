$(document).ready(function () {
    $(function() {
        $("input[name='phone']").on('input',function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g,''));
        });
    });

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

    $('#btnLogout').click(function (e) { 
        e.preventDefault();
        $(location).attr('href','logout.php');
    });

    $('#lnkRegister').click(function (e) { 
        e.preventDefault();
        $("#btnStart").hide();
        $("#options").hide();
        $("#optreg").show();
        $("#name").prop('required',true);
        $("#phone").prop('required',true);
        $("#btnRegister").show();
    });

    $("#formLogin").submit(function (e) { 
        e.preventDefault();
        email = $.trim($('#email').val());
        passw = $.trim($('#pass').val());

        var datos = new FormData();
        datos.append('name', name)
        datos.append('phone', phone)
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
                console.log(data);
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
            url: "assets/app/home/home_controller.php?op=login",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
                console.log(data);
                if (data['status']==true) {
                    if (data['ut']=='Administrativo') {
                        $('#loginModal').modal('hide');
                        wipe()
                        alert('eres '+ data['ut'])
                    }
                    if (data['ut']=='Cliente') {
                        $('#loginModal').modal('hide');
                        wipe() 
                        alert('eres '+ data['ut'])
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
});

function wipe() {
    $("#email").val("");
    $('#passw').val("");
}