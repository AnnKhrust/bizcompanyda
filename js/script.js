$(document).ready(function () {
	$(".scroll").click(function() {
		$("html, body").animate({
		  scrollTop: $($(this).attr("href")).offset().top  - 0 + "px"
		}, {
		  duration: 700
		});
		return false;
	  });
	});
