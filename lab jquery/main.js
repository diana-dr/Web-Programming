$(document).ready(function() {
	
	$("html").css("box-sizing", "border-box");

	$("body").css({
	  "font-family": "'Roboto', sans-serif",
	  "font-size": "14px",
	  "margin": "0"
	});

	$(".container").css({
	  "width": "1000px",
	  "margin": "auto"
	});

	$("a").css("text-decoration", "none");

	$("nav").css("background-color", "#29FFB6");

	$("nav ul").css( {
	  "font-size": "0",
	  "margin": "0",
	  "padding": "0"
	})

	$("nav ul li").css({
	  "display": "inline-block",
	  "position": "relative"
	});

	$("nav ul li a").css({
	  "color": "#000",
	  "display": "block",
	  "font-size": "14px",
	  "padding": "15px 14px",
	  "transition": "0.3s linear"
	});

	$("nav ul li ul").css({
	  "border-bottom": "5px solid #29FFB6",
	  "display": "none",
	  "position": "absolute",
	  "width": "250px"
	});

	$("nav ul li ul li").css("display", "block");

	$("nav li").hover(
		function() {
			$(this).css("background-color", "#fff");
	},
		function() {
        	$(this).css('background-color', ''),
        	$("ul", this).stop().slideUp(400);
    });

	$("nav li").click(
	  function() {
	    $("ul", this).stop().slideDown(400);
	});

	$("nav li ul li").hover(
    function() {
        $(this).css('background-color', '#088DA5')
    }, 
    function() {
        $(this).css('background-color', '')
    });
});
