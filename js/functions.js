jQuery(function($){

  
      var windowW = $(window).width();

    $('.navbar-toggle').on('click', function(){
      var nav = $('.lyd-nav');
      oldL = nav.css('left');

      nav.css('left', '0');
      $(this).hide(500);

      // nav.show();
    });
    sizePage();

    $(window).on('resize', function(){
      sizePage();
    });
    function sizePage(){
      var h = $(window).height(),
        w = $(window).width();

      var bh = h - 50,
         bw = w - 50;
         console.log(bh,bw);
      // $('.navbar-toggle').css({'top':55, 'left':22})

      
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

      $('.hero-border').width(bw);    
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
      if($('main#getting-here-and-around').length > 0){
      console.log('this works');

        var mapOptions = {
          center: new google.maps.LatLng(44.675410, -74.690689),
          zoom: 12
        };
        var map = new google.maps.Map(document.getElementById('lyd-map'),
            mapOptions);
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
    // if($('#lyd-Photos').length > 0){
    //   var page_wrapper = $('.page-wraper');
    //   var photos = $('#lyd-photos > li');
    //   var old_height = parseInt(photos.height());
    //   var new_height = 0;
    //   var x = 0;
    //   for(var i = 0; i < photos.length; i++){
    //     if(i % 3 === 0){
    //       new_height += old_height;
    //       // console.log(new_height);
    //     }
    //   }

    //   // while(x < photos.length){
    //   //   x++;
    //   //   if(x % 3 === 0){
    //   //     console.log(x);
    //   //   }
    //   // }
    //   page_wrapper.height(new_height + 50);
    // }

//     if($('#campsite-book').length > 0){
//       var res_btn = $('.reserve-btn-2');
//       var form_input = [];
//       var range = [];
//       var add_inputs = true,
//           getting_range = false;
//       res_btn.on('click', function(){
//         var inputs = $('.campsite-input');

//         for (var i = 0; i < inputs.length; i++) {
//             var input_val = $(inputs[i]).val();
//             var key = $(inputs[i]).data('key');
//             // if(key.indexOf('from') != -1 || key.indexOf('to') != -1){
//               if(key.indexOf('from') != -1){
//                 range.push(new Date(input_val));
//                 form_input.push(key+':'+( new Date(input_val).toISOString()));
//                 getting_range = true;
//               }else if(key.indexOf('to') != -1){
//                 form_input.push(key+':'+( new Date(input_val).toISOString()));

//                 range.push(new Date(input_val));
//                 add_inputs = false;
//               }
//             // }
//           if(add_inputs && !getting_range){
//             form_input.push(key+':'+input_val);
//           }else if(!add_inputs && getting_range){
//             var the_range = date_range(range[0], range[1]);
//             form_input.push('range:'+the_range);
//             add_inputs = true;
//             getting_range = false;
//           }
          
//         };
//         save_booking_info();
//         console.log(form_input);
//       }); //end of reserve on click function

//      $('#camp-from').datepicker({
//         defaultDate: "+1w",
//         changeMonth: true,
//         numberofMonths: 2,
//         // dateFormat: 'yy-mm-dd',
//         onClose: function(selectedDate){
//           $('#camp-to').datepicker("option", "minDate", selectedDate);
//         }
//     });
//     $('#camp-to').datepicker({
//       defaultDate: "+1w",
//       changeMonth: true,
//       numberofMonths: 2,
//       // dateFormat: 'yy-mm-dd',
//       onClose: function(selectedDate){
//         $('#camp-to').datepicker("option", "maxDate", selectedDate);
//       }
//     });



//     }
//   function save_booking_info(){
//     var form_inputs = JSON.stringify(form_input);

//    $.ajax({
//         url: lyd.ajaxurl,
//         type: 'POST',
//         data: {
//           action: 'save_booking_info',
//           form_inputs: form_inputs
//       },
//       //on sucess, add player to table and give the user a response
//       success: function(response){
//         // console.log(response);
//         $('.response').html(response);
//       }
//     });

//   }
//   function date_range(start, end){
//     var date_array = [];
//     var current_date = start;
//     var next_date = new Date();
//     next_date.setDate(start.getDate() + 10);

//     while (current_date < end){
//       var date_time = new Date(current_date).toISOString(),
//       date_time = date_time.split('T'),
//       date = date_time[0];
//       date_array.push(date);
//       current_date = new Date(current_date.setDate(current_date.getDate() + 1));
//     }

//     var da = JSON.stringify(date_array);
//     return da;
// }

  // var windowH = $(window).height(); 
  // var homeArrow = $('#scroll-down');
  // var fl = $('#freelance');
  // var navBtns = $('#primary.myTheme_nav > ul > li > a');
  // var sections = $('section'), c = sections.length;
  // var button = $('.my-nav-button');
  // var needsHelp = browserCeck();
  // var ww = $(window).width();

  // for( var i = 0; i < c; i++){
  //   var currentDiv = $(sections[i]);
  //   var currentSec = $(currentDiv).data('magic');
  //   if(ww > 1024){
  //     if(  currentSec == 'image' ){
  //         if(i==0){
  //           currentDiv.height(windowH+100);
  //           $('header').css('bottom', -windowH);
  //         }else{
  //           currentDiv.css('bottom', -windowH);
  //         };

  //     }else if( currentSec == 'na' ){
  //       currentDiv.css('bottom', -windowH);

  //     };
  //   }else{
  //     $('#myTheme-home').height(windowH);
  //   }
  // }

  // function pageScroll(e,hash){
  //   e.preventDefault();
  //   newHash = hash.split('-')[1];
  //   var theHash = $(hash).offset().top - 50;
  //   $('html, body').animate({
  //        scrollTop: theHash
  //      }, 750, function(){
  //        window.location.hash = newHash;
  //      });    
  // };

  // function browserCeck(){
  //   var browserType = navigator.userAgent.toLowerCase();
  //   if((browserType.indexOf('chrome') > -1) || browserType.indexOf('applewebkit') > -1){
  //     wantsHelp = true;
  //   }else{
  //   var wantsHelp = false;

  //   }
  //   return wantsHelp;
  // };

  // button.on('click', function(e){
  //   if($(e.currentTarget).is('#freelance')){
  //     var thisHash = '#myTheme-contact';
  //     pageScroll(e,thisHash);
  //   }else{ 
  //     var thisHash = this.hash;
  //     pageScroll(e,thisHash);
  //   };
  // });

  // function changeOpacity(st){
  //   var hero = $('#home-content');
  //   var op = 0,
  //     fadeSt = 50,
  //     fadeEnd = 1000;

  //     if(st<=fadeSt){
  //       op = 1;
  //     }else if(st<=fadeEnd){
  //       op = 1 - st / fadeEnd;
  //     }
  //     hero.css('opacity', op);
  // };

  // var windowH = $(window).height();
  // var header = $('header'), tempHeader = $('.my-nav-temp');

  // var home = $('#myTheme-home').position().top + $('#myTheme-home').height(),
  //     about = $('#myTheme-about').position().top + $('#myTheme-about').height(),
  //     projects = $('#myTheme-projects').position().top + $('#myTheme-projects').height(),
  //     resume = $('#myTheme-resume').position().top + $('#myTheme-resume').height();
  
  // var h = document.getElementById('myTheme-home'),
  //     the_hero = document.getElementById('home-content'),
  //     ab = document.getElementById('blank-4'),
  //     cb = document.getElementById('blank-6'),
  //     s = 10;

  // window.onscroll = function(){
  //   var yOffset = window.pageYOffset;
  //   if(ww > 1024){
  //     var homePosition = -(yOffset / 10),
  //         prjBlankPos = -(yOffset/6) + 500,
  //         contBlankPos = -(yOffset/6) + 700,
  //         heroPos = -(yOffset/5);

  //     h.style.backgroundPosition = "50% "+homePosition+"px";
  //     ab.style.backgroundPosition = "50% "+prjBlankPos+"px";
  //     cb.style.backgroundPosition = "50% "+contBlankPos+"px";
      
  //     if(needsHelp){
  //       the_hero.style.webkitTransform = 'translateY('+heroPos+'px)';
  //     }

  //     the_hero.style.transform = 'translateY('+heroPos+'px)';
      
  //     changeOpacity(yOffset);

  //    if(yOffset > projects + 200){
  //       $('#myTheme-home').addClass('change-z');

  //    }else {
  //       $('#myTheme-home').removeClass('change-z');

  //    }
  //   }else{
  //     if(yOffset > about ){

  //       $('#myTheme-home').addClass('change-z');
         
  //    }else {
  //       $('#myTheme-home').removeClass('change-z');

  //    }
  //  };

  
  // }
  // $(window).scroll(function(){
  //   var yOffset = $(window).scrollTop();

  //    if(yOffset > windowH ){
  //     header.addClass('fix-nav');
  //     tempHeader.addClass('show-temp');
  //     $(navBtns[0]).addClass('active-nav');

  //   }else{
  //     $(navBtns).removeClass('active-nav');

  //     tempHeader.removeClass('show-temp');
  //     header.removeClass('fix-nav');

  //   };
  //   if(yOffset > home){
  //     $(navBtns).removeClass('active-nav');

  //     $(navBtns[0]).addClass('active-nav');
  //   }
  //   if(yOffset > about){
  //     $(navBtns).removeClass('active-nav');

  //     $(navBtns[1]).addClass('active-nav');
  //   }
  //   if(yOffset > projects){
  //     $(navBtns).removeClass('active-nav');

  //     $(navBtns[2]).addClass('active-nav');
  //   }
  //   if(yOffset > resume-50){
  //     $(navBtns).removeClass('active-nav');

  //     $(navBtns[3]).addClass('active-nav');
  //   }
  // })

});