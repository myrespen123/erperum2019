$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 10) {
	    $(".site-navbar").addClass('sitenav-active');
	  }

	  else{
		  $(".site-navbar").removeClass('sitenav-active');  	
	  }
  });
});

$(document).ready(function() {
	$('.nav-small').click(function() {
		$('.main-menu').slideToggle();
	});
});


$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 10) {
	    $(".dev-profile").addClass('dev-sticky');
	  }

	  else{
	    $(".dev-profile").removeClass('dev-sticky');
	  }
  });
});

// $('.carousel').carousel();
$('.carousel').carousel({
    interval: 2500
});
	 
