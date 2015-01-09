$(document).ready(function() {
  $('a.blank').click(function( event ) {
    event.preventDefault();
    // $( ".sandbox-btns" ).append( "default " + event.type + " prevented" );
  });

  $('body').on('mouseenter', '.masterTooltip', function(){
        var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');
        $('<p class="tools"></p>').text(title).appendTo('body').fadeIn('slow');
   });

   $('body').on('mouseleave', '.masterTooltip', function(){
        $(this).attr('title', $(this).data('tipText'));
        $('.tools').remove();
   });

  $('body').on('mousemove', '.masterTooltip', function(e){
        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tools').css({ top: mousey, left: mousex });
   });
});


$(document).ready(function () {

    // Open in new window
    // $(".popup-seals.social_links").click(function () {
    //     window.open($(this).find("a:first").attr("href"));
    //     return false;
    // });
        
    // Or use this to Open link in same window (similar to target=_blank)
    $(".masterTooltip").click(function(){
        window.location = $(this).attr("href");
        return false;
    });
 
    // Show URL on Mouse Hover
    $(".masterTooltip").hover(function () {
        window.status = $(this).attr("href");
    }, function () {
        window.status = "";
    });
});

$(function(){
        
  $("#box1").jScrollPane({
          autoReinitialise : true
  });
  $("#box2").jScrollPane({
          autoReinitialise : true
  });
  $("#box3").jScrollPane({
          autoReinitialise : true
  });
  $("#box4").jScrollPane({
          autoReinitialise : true,
          showArrows: true
  });

  var scrollTimerCount = 0;
   scrollTimer = setInterval(function() {
   if($('.twtr-bd div').hasClass('twtr-tweet-wrap') || scrollTimerCount == 6 ){
           $('.twtr-timeline').jScrollPane();
           
           addClickToTwitter();
           scrollTimerClear();
   }
   scrollTimerCount++;
   }, 1000);
        
   function scrollTimerClear(){
           clearInterval(scrollTimer);
           // console.debug("test");
           $(".twitter-loader").hide();
   }
        
  function addClickToTwitter(){
    $("#twitter-widget-tabs-tabs li").click(function(e) {
       e.preventDefault();
       // switch all tabs off
       if ($(this).find('a').hasClass('activa')){
       }else{
       $("#twitter-widget-tabs-tabs").find("a.activa").removeClass("activa");
       // switch this tab on
       $(this).find('a').addClass("activa");
       // slide all content up
       $(".twitter-widget-tabs-content").hide();
      
       // slide this content up
       var content_show = $(this).attr("rel");
       $("#"+content_show).show();
       }
      
    });
  }
});
              
// $(document).ready(function(){
//   $('.getoomi-twitter-widget').click(function(e){
//     e.preventDefault();
    
//     /*if($('#twitter_username1').val()){*/
//       var url = $(this).attr('href');
//     //console.debug(message);
//     if($('#twitter_username1').val() == $('#twitter_username1').attr('placeholder')){
//       $('#twitter_username1').val('');
//     }
//     if($('#message1').val() == $('#message1').attr('placeholder')){
//       $('#message1').val('');
//     }
//     var message = encodeURIComponent($('#message1').val());
//     if (message == ""){
//       message = "Check out dannyglix.com ";
//             //message = "I wish you had %23getoomi, its cool and lets you share your time online easily http://getoomi.com";
//           }
//           var usernameVal = "";
//           if ($('#twitter_username1').val()!="") {
//             usernameVal = "@"+$('#twitter_username1').val();
//           };
//           url = url+usernameVal+ " " + message + " %23dannyglix";
//      //window.location.href=url;
//      var width = 575,
//      height = 400,
//      left = ($(window).width() - width) / 2,
//      top = ($(window).height() - height) / 2,
//      url = url,
//      opts = 'status=1' +
//      ',width=' + width +
//      ',height=' + height +
//      ',top=' + top +
//      ',left=' + left;
     
//      window.open(url, 'twitter', opts);
//      return false;

//    });
// });
$(document).ready(function(){  
  $('#mycarousel').everslider({   
    mode: 'carousel',  
    //moveSlides: 1,
    itemWidth : 135,
    itemHeight: 45,
    itemMargin: 30,
    navigation: true,
    ticker: true,
    mouseWheel: true,
    tickerTimeout: 4000
  }); 
  $('.latest_news_scroller').slimscroll({
    alwaysVisible: true,
    height: 420,
    railVisible: true,
    size: '13px',
    distance: 0,
    wheelStep: 50,
    color: '#acacac',
    opacity : 1,
  });
  $('.latest_news_scroller_about').slimscroll({
    alwaysVisible: true,
    height: 435,
    railVisible: true,
    size: '13px',
    distance: 0,
    wheelStep: 50,
    color: '#acacac',
    opacity : 1,
  });
  $('#logo').shiningImage({
    opacity : 0.25,
    playOnLoad: false,
    scale : 0.7,
  });
  $(".fancybox-media").fancybox({
    type : 'iframe',
    overlayShow: true,
    padding: 5,
    afterLoad: function(current, previous){
      // $('iframe.fancybox-iframe').attr("id", "player1");
      var iframe = $("iframe.fancybox-iframe")[0],
            player = $f(iframe);

            // When the player is ready, add listeners for pause, finish, and playProgress
            player.addEvent('ready', function() {
              player.addEvent('finish', function(id) {
                $.fancybox.close();
              });
            });
    }
  });
  function ready(playerID){
    Froogaloop(playerID).addEvent('play', play(playerID));
    Froogaloop(playerID).addEvent('seek', seek);
    Froogaloop(playerID).addEvent('finish', onFinish(playerID));

    Froogaloop(playerID).api('play');
  }

  function play(playerID){
    alert(playerID + " is playing!!!");
  }

  function seek() {
    alert('Seeking');
  }

  function onFinish(playerID) {
    alert(playerID + " finished!!!");
    //$('#'+playerID).remove();
  }
  $(".member-cols").on("click", function(e){
    e.preventDefault();
    var more = $(this).find(".more");
    // var boardMemberItem = more.parents(".member-cols");
    var boardMemberItem = $(this);
    if (more.hasClass("open")) {
      more.removeClass("open");
      boardMemberItem.attr('style', '');
      more.html('more..');
    }else{
      more.addClass("open");
      boardMemberItem.css("height", 'auto');
      more.html('less..');
    }
  });
  $(".board-member-col .more").on("click", function(e){
    e.preventDefault();
  });
  $(".more-container").each(function(index){
    $(this).css('height', $(this).data('height'));
  }); 
  $(".more-container").on('click', '.more-btn', function(e){
    e.preventDefault();
    var moreContainer = $(this).parents('.more-container');
    if (moreContainer.hasClass("open")) {
      $('.more-container').removeClass('open');
    }else{
      moreContainer.addClass("open");
    }
  });
});  

$(window).load(function(){
  $(".animateOnLoad").each(function() {
    var classes = "animated "+ $(this).data("animation");
    $(this).addClass(classes);
  });
});
$(window).load(function(){
  $("#footer").addClass("fix-footer");
   $("body").css('padding-bottom', $('#footer').height());
});
$(window).resize(function(){
  $("body").css('padding-bottom', $('#footer').height());
});
$(function (){
    $('.navbar-nav li a , .left-menus li a').each(function(){
        var path = window.location.href;
        var current =  path.substring(path.lastIndexOf('/') + 1);
        var url = $(this).attr('href');
        if(url == current){
            if($(this).hasClass('child-menu')) {
              $(this).parents('.dropdown').find('a').addClass('active');
            } else {
              $(this).addClass('active');  
            }
            // $(this).append(' <div class="navbar-arrow"></div>');
        };
    });        
}); 
$(document).ready(function(){
  fixedNavHeight();
});
$(window).scroll(function(){
  fixedNavHeight();
});
$(window).resize(function(){
  fixedNavHeight();
});

// function fixedNavHeight() {
//   $navbarHeight = $('.navbar-fixed-top').height();
//   $('.outer-container').css('margin-top', $navbarHeight);
//   if ($(window).scrollTop() >= 100) {
//     $("header.navbar-fixed-top").addClass("sticky-header");
//   }else{
//     $("header.navbar-fixed-top").removeClass("sticky-header");
//   }
// }

function fixedNavHeight() {
  $navbarHeight = $('.navbar-fixed-top').height();
  console.log($navbarHeight);
  $('.outer-container').css('padding-top', $navbarHeight);
  if ($(window).scrollTop() >= 100) {
    $("header.navbar-fixed-top").addClass("sticky-header");
  }else{
    $("header.navbar-fixed-top").removeClass("sticky-header");
  }
}

$(document).ready(function(){
  $('.sitemap').click(function() {
    if($(this).text() == 'Sitemap' ) {
      /* my changes */
         $("body").css('padding-bottom','355px');
      /* my changes */
      $('.sitemap').html('<span style="margin-left:3px;">Close Sitemap</span>');   
    }
    else {
      /* my changes */
      $("body").css('padding-bottom', '182px');
      /* my changes */
      $('.sitemap').html('<span style="margin-left:3px;">Sitemap</span>');       
    } 

    $('#sitemap').slideToggle('400', function() {
        // Animation complete.
        adjustFooter();
      }); 
     $("html, body").animate({ scrollTop: $(document).height() }, 1000);
     adjustFooter();
  });
  function adjustFooter(){
    if($(window).height() > $('.outer-container').height()){
      $('.outer-container').height($(window).height());
      $('#footer').addClass('footer2');
    }else{
      $('.outer-container').css('height','100%');
      $('#footer').addClass('footer2');
    }
  }
});
$(function(){
  $('.btn-tooltip').tooltip();
});
$(function(){
  $('.slimScrollBar').mousedown(function(){
    $(this).addClass('grab');
  });
  $('.slimScrollBar').mouseup(function(){
    $(this).removeClass('grab');
  });
});
$(window).load(function(){
  var menus = $('.left-menus').clone();
  $('.inner-sub-menus').append(menus);
  // console.log(menus);

});
// $(function(){
//   var iframe = $('#fancybox-frame1411562718428')[0];
//   var player = $f(iframe);

//   // When the player is ready, add listeners for pause, finish, and playProgress
//   player.addEvent('ready', function() {
//       player.addEvent('finish', onFinish);
//   });
  
//   function onFinish(id) {
//       console.log("Finished");
//       // jQuery('#lbp-inline-href-1 iframe').attr('src', "");
//       $.fancybox.close();
//   }
// });

