$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: "assets/app/admin/admin_controller.php?op=initcount",
        dataType: "json",
        success: function (data) { 
            $('.counting').each(function () {
                $('#nclient').attr('data-count',data.Nclient);
                $('#nuser').attr('data-count',data.Nuser);
                $('#ncar').attr('data-count',data.Ncar);
                $('#nrent').attr('data-count',data.Nrent);
                var $this = $(this),
                    countTo = $this.attr('data-count')
                
                $({countNum: $this.text()}).animate({
                    countNum : countTo
                    },
                    {
                        duration:1000,
                        easing:'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum))
                        },
                        complete:function() {
                            $this.text(this.countNum)
                        },
                    }
                );
            });         
        }
    });

    $.ajax({
        type: "POST",
        url: "assets/app/admin/admin_controller.php?op=processreq",
        dataType: "json",
        success: function (data) { 
            $.each(data, function(idx, opt) {
                $("#solicitud").append(
                    '<div class="col-sm-4">'+
                        '<div class="progress">'+
                            '<span id="rents1" class="skill">('+opt.count+') '+opt.status+'<i class="val">'+opt.percent+'%</i></span>'+
                            '<div class="progress-bar-wrap">'+
                                '<div id="rents1p" class="progress-bar" role="progressbar" aria-valuenow="'+opt.percent+'" aria-valuemin="0" aria-valuemax="100">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            });
        }
    });

    $.ajax({
        type: "POST",
        url: "assets/app/admin/admin_controller.php?op=processcar",
        dataType: "json",
        success: function (data) { 
            $.each(data, function(idx, opt) {
                $("#vehiculo").append(
                    '<div class="col-sm-6">'+
                        '<div class="progress">'+
                            '<span id="rents1" class="skill">('+opt.count+') '+opt.status+'<i class="val">'+opt.percent+'%</i></span>'+
                            '<div class="progress-bar-wrap">'+
                                '<div id="rents1p" class="progress-bar" role="progressbar" aria-valuenow="'+opt.percent+'" aria-valuemin="0" aria-valuemax="100">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            });
        }
    });

    $.ajax({
        type: "POST",
        url: "assets/app/admin/admin_controller.php?op=processuser",
        dataType: "json",
        success: function (data) { 
            $.each(data, function(idx, opt) {
                $("#usuario").append(
                    '<div class="col-sm-6">'+
                        '<div class="progress">'+
                            '<span id="rents1" class="skill">('+opt.clientactive+') Clientes Activos <i class="val">'+opt.percentactive+'%</i></span>'+
                            '<div class="progress-bar-wrap">'+
                                '<div id="rents1p" class="progress-bar" role="progressbar" aria-valuenow="'+opt.percentactive+'" aria-valuemin="0" aria-valuemax="100">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-6">'+
                        '<div class="progress">'+
                            '<span id="rents1" class="skill">('+opt.clientinactive+') Clientes Inctivos <i class="val">'+opt.percentinactive+'%</i></span>'+
                            '<div class="progress-bar-wrap">'+
                                '<div id="rents1p" class="progress-bar" role="progressbar" aria-valuenow="'+opt.percentinactive+'" aria-valuemin="0" aria-valuemax="100">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            });
        }
    });
    
});