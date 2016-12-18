$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
    }
});
$(document).ready(function(){
      $(window).scroll(function() {
        if ($(document).scrollTop() > 100) {
          $(".nav1").css("background-color", "#81c784");
        } else {
          $(".nav1").css("background-color", "transparent");
        }
      });
    });  
$(document).ready(function(){
     $(window).scroll(function() { 
        if ($(document).scrollTop() > 100) {
          $(".nav2").css("background-color", "seagreen");
          $(".nav2 ul li a").css("color", "white");
          $(".brandImg").css("width", "120px");
          $(".brandImg1").css("width", "120px");
          $(".menuicon").css("color", "white");
          $(".menuicon2").css("color", "white");
          $(".mininav a").css("color", "seagreen");
          $(".brand-logo").css("color", "white");
          $(".fname2").css("color", "white");
          

        } else {
          $(".nav2").css("background-color", "white");
            $(".nav2 ul li a").css("color", "seagreen");
            $(".brandImg").css("width", "200px");
            $(".brandImg1").css("width", "120px");
            $(".menuicon").css("color", "seagreen");
            $(".menuicon2").css("color", "white");
            $(".mininav a").css("color", "seagreen");
            $(".brand-logo").css("color", "seagreen");
            $(".fname2").css("color", "white");
        }
      });
    });  