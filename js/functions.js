jQuery(function($){
    var hi = $(window).height();
    
    hero_resize(hi)
    // $(document).on('load', sidebar_fix());
    $(window).resize( function(){
      var h = $(window).height();
      hero_resize(h);
    });
    function sidebar_fix(){
      if($('.lyd-sidebar-wrapper ul').length > 0){
        var li;
        var sidebar = $('.lyd-sidebar-wrapper ul');
        var items_raw = $('.lyd-sidebar-wrapper ul div').html(),
          items = items_raw;
        $('.lyd-sidebar-wrapper ul div').remove();
        items = items.split(',');
        console.log(items.length);
        items.forEach(function(item){
          if(item.indexOf('+') == -1){
            li = '<li>'+item+'</li>';
            sidebar.append(li);

          }else{
            var btn = item.split('+');
            console.log(btn);
            li = '<li>'+btn[0]+'</li>';
            btn = '<li class="reserve-btn-1"><a href="#">'+btn[1]+'</a></li>';
            sidebar.append(li);
            sidebar.append(btn);
          }
        })
      }
    }
    function hero_resize(s_height){
      if(s_height< 585){
        $('.lyd-hero').css('background-position', 'center 80%');
      }else{
        $('.lyd-hero').css('background-position', 'center 69%');

      }

    }

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