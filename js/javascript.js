    $(document).ready(function(){
    $('.modal-trigger').leanModal();
  });
  $('#modal1').openModal();
          
  $('.modal-trigger').leanModal({
      dismissible: true, 
      opacity: .5, 
      in_duration: 300, 
      out_duration: 200, 
      ready: function() { alert('Ready'); },
      complete: function() { alert('Closed'); } 
    }
  );
 
$( document ).ready(function() {
      $(".button-collapse").sideNav();
    });
    
$(document).ready(function() {
    $('select').material_select();
  });

 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
    $('.carousel.carousel-slider').carousel({full_width: true});



$(document).ready(function(){
      $('.slider').slider({full_width: true});
    });

$(document).ready(function(){
      $('.slider').slider({indicators: false});
    });	
$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1500);
        return false;
      }
    }
  });
});
$(function(){
/*the function showInfo is executed on mouseover and mouseout*/
$('.button').live('mouseover mouseout', function(event) {
	showInfo(event,this);
});
});
function showInfo(event, button)
{
/*if the event is mouseover*/
if (event.type=="mouseover"){
/*get the coordinates of the button element using jquery offset*/
var offset = $(button).offset();
	
/*get the top Position of the info element. $(window).scrollTop() is used to calculate the right top coordinate of the button element after the window is scrolled*/
var topOffset = $(button).offset().top- $(window).scrollTop();
  
  /*set the position of the info element*/
	 $(".info").css({
        position: "fixed",
        top: (topOffset + 35)+ "px",
        left: (offset.left) + "px",
    });
}
  else
  /*hide info element on mouseout*/
  $('.info').css({'left':-9999});
}
    