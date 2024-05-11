$(document).ready(function () {
    var Url = $(location).attr('href')

    $('#title').append(Url)

    console.log(Url);
    
    getProspect()

    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=pages",
        method: "POST",
        dataType: "html",  
        success: function(data) {
            $('#paginator').html(data);
            $('#paginator').empty();
            $('#paginator').append('<div>')
            for (let index = 1; index <= data ; index++) {
                active = '';
                if (index == 1) {
                    active = 'active';
                }
                $('#paginator').append('<li class="page-item '+active+'"><a class="page-link" href="#" onclick="getProspect('+index+')" data="'+index+'">'+index+'</a></li>');
            }
            $('#paginator').append('</div>')
        }
        
    });
    
    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=model",
        method: "POST",
        dataType: "json",  
        success: function(data) {
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#model').append('<option name="" value="' + opt.id +'">' + opt.model + '</option>');
          });
      
        }
    });

    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=brand",
        method: "POST",
        dataType: "json",  
        success: function(data) {
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#brand').append('<option name="" value="' + opt.id +'">' + opt.brand + '</option>');
          });
        }
    });

    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=anno",
        method: "POST",
        dataType: "json",  
        success: function(data) {
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#anno').append('<option name="" value="' + opt.anno +'">' + opt.anno + '</option>');
          });
        }
    });

    $.ajax({
        url: "assets/app/portfolio/portfolio_controller.php?op=region",
        method: "POST",
        dataType: "json",  
        success: function(data) {
          $.each(data, function(idx, opt) {
              //se itera con each para llenar el select en la vista
              $('#region').append('<option name="" value="' + opt.id +'">' + opt.region + '</option>');
          });
        }
    }); 
    
    $.ajax({
        type: "POST",
        url: "assets/app/portfolio/portfolio_controller.php?op=showdetails",
        dataType: "json",
        //data:  {index:index},
        success: function (data) {
            //$('#prospect').html(data);
            $('#prospect').empty();
            $('#prospect').append('<div>')
            $.each(data, function(idx, opt) {
                $('#prospect').append(
                    '<div class="col-lg-4 col-md-6 portfolio-item filter-app">'+
                        '<div class="portfolio-wrap">'+
                        '<img src="assets/img/portfolio/'+opt.imgc+'" class="imgfluid" alt="">'+
                        '<div class="portfolio-info">'+
                            '<h4>'+opt.model+'</h4>'+
                            '<p>'+opt.brand+'</p>'+
                            '<p>'+opt.anno+'</p>'+
                            '<div class="portfolio-links">'+
                            '<a href="portfolio-details.php?option='+opt.id+'" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    '</div>'
                );
            });
            $('#prospect').append('</div>')
        }
    });
});

function getProspect(index) {
    if (index==undefined) {
        index=1
    }
    else{
        $('.pagination li').removeClass('active');
        page=$('.pagination li a').length
        for (let i = 0; i <= page; i++) {
            if (i==index) {
                $('.pagination li a[data="'+i+'"]').parent().addClass('active');
            }
        }
    }
    $.ajax({
        type: "POST",
        url: "assets/app/portfolio/portfolio_controller.php?op=show",
        dataType: "json",
        data:  {index:index},
        success: function (data) {
            //$('#prospect').html(data);
            $('#prospect').empty();
            $('#prospect').append('<div>')
            $.each(data, function(idx, opt) {
                $('#prospect').append(
                    '<div class="col-lg-4 col-md-6 portfolio-item filter-app">'+
                        '<div class="portfolio-wrap">'+
                        '<img src="assets/img/portfolio/'+opt.imgc+'" class="imgfluid" alt="">'+
                        '<div class="portfolio-info">'+
                            '<h4>'+opt.model+'</h4>'+
                            '<p>'+opt.brand+'</p>'+
                            '<p>'+opt.anno+'</p>'+
                            '<div class="portfolio-links">'+
                            '<a href="portfolio-details.php?option='+opt.id+'" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    '</div>'
                );
            });
            $('#prospect').append('</div>')
        }
    });   
}
