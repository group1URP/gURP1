$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 603) {
	    $(".navbar-fixed-top").css("background" , "orangered");
	  }

	  else{
		  $(".navbar-fixed-top").css("background" , "transparent");  	
	  }
  })
})