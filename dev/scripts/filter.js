$(function() {

	let newSelection = "";
	
	$("#field-nav a").click(function(){
	
	    $("#all-fields").fadeTo(200, 0.10);
	
		$("#field-nav a").removeClass("current");
		$(this).addClass("current");
		
		newSelection = $(this).attr("rel");
		
		$(".field").not("."+newSelection).slideUp();
		$("."+newSelection).slideDown();
		
	    $("#all-fields").fadeTo(600, 1);
		
	});
	
});