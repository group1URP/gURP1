$(document).ready(function(){
	//navbar and back-to-top btn display behavior
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 603) {
			$(".navbar-fixed-top").css("background" , "orangered");
			$("#toTop").fadeIn('faster');
	  }

	  else{
			$(".navbar-fixed-top").css("background" , "transparent");
			$("#toTop").fadeOut();
	  }
	})
	
	$('#toTop').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    });
})