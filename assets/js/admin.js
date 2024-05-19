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
        url: "assets/app/admin/admin_controller.php?op=processbar",
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
    
});