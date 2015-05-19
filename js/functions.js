jQuery(function($){
    
    $(window).on('resize', function(e){
      sizePage(e);
    });

    $(window).on('load', function(e){
      sizePage(e);
    });

    var windowW = $(window).width();

    $('.navbar-toggle').on('click', function(){
      var nav = $('.lyd-nav');
      oldL = nav.css('left');

      nav.css('left', '0');
      $(this).hide(500);

      // nav.show();
    });

    
    function sizePage(ev){

      var h = $(window).height(),
        w = $(window).width();

      var bh = h - 50,
         bw = w - 50;
      if(ev.type == 'load'){
        if(w > 1950){
          $('.home .navbar-toggle').css('left', '17px');
        }
        if(w < 1950 && h < 905){
          $('.home .navbar-toggle').css('left', '22px');

        }
        if((w < 1028) && (w > 768)){
          $('.home .navbar-toggle').css('left', '22px');

        }
        if((w < 768) && (w > 414)){
          if(w < 645 && h < 365){
            $('.home .navbar-toggle').css('left', '22px');
          }else{
            $('.home .navbar-toggle').css('left', '17px');
          }
        }
      
        if(w < 414){
          $('.home .navbar-toggle').css('left', '22px');

        }
      }else{
        $('.home .navbar-toggle').css('left', '22px');
      }

      $('.hero-border').width(bw);    


      if(w <= 800 && h > 360){
        var nh = h / 2,
            nbh = (h-100) / 2;
        $('.main_content').height(nh);
        $('.lyd-page').height(nh);
        $('.lyd-nav').height(h);
        $('.hero-border').height(nbh);
      }else{
        $('.main_content').height(h);
        $('.lyd-page').height(h);
        $('.lyd-nav').height(h);
        $('.hero-border').height(bh);
      }

    }

    $('.close-nav').on('click', function(){
      // $('.lyd-nav').hide();
      var nav = $('.lyd-nav');

      if(windowW <= 361){
        var l = -50+'%';

      }else if(windowW <= 768){
        var l = -33+'%';

      }else{
        var l = -26+'%';
      }

      nav.css('left', l);

      $('.navbar-toggle').show(500);
    });

    // function initialize() {
    if($('main#getting-here').length > 0){
    console.log('google maps works');
      var campLocation = new google.maps.LatLng(44.675410, -74.690689);
      var mapOptions = {
        center: campLocation,
        zoom: 14,
        scrollwheel: false
      };
      var map = new google.maps.Map(document.getElementById('lyd-map'),
          mapOptions);

      var marker = new google.maps.Marker({
        position: campLocation,
        map: map,
        title: "Lydia's place inc RV campsite"
      });


    }

    $('#book-now').on('click', function(e){
        var target = $(this).children();
        
        if( target.length ) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top + 250
            }, 1000);
        }
    });
    // }
    // google.maps.event.addDomListener(window, 'load', initialize);
    var newDate = new Date();

    $('#camp-from').datepicker({
        defaultDate: "+1w",
        // minDate: 
        numberOfMonths: 2,
        minDate: new Date(newDate.getFullYear(), '04', '22'),
        maxDate: new Date(newDate.getFullYear(), '07', '30'),
        onClose: function( selectedDate ) {
          $( "#camp-to" ).datepicker( "option", "minDate", selectedDate );
        }      
    });
    $('#camp-to').datepicker({
        defaultDate: "+1w",
        // minDate: 
        numberOfMonths: 2,
        minDate: new Date(newDate.getFullYear(), '04', '22'),
        maxDate: new Date(newDate.getFullYear(), '07', '30'),
        onClose: function( selectedDate ) {
          $( "#camp-from" ).datepicker( "option", "maxDate", selectedDate );
        }
    });

});