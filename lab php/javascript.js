$(document).ready(function() {  

	$(".tablesearch").hide();
	function search() {
		var query_value = $('input#search').val();
		if(query_value !== ''){
			$.ajax({
				type: "POST",
				url: "search.php",
				data: { query: query_value },
				cache: false,
				success: function(html) {
					$("table#resultTable tbody").html(html);
				}
			});
		} return false;
	}

	$("input#search").live("keyup", function(e) {

		clearTimeout($.data(this, 'timer'));

		var search_string = $(this).val();
		
		if (search_string == '') {
			$(".tablesearch").fadeOut(300);
		}else{
			$(".main-table").fadeOut();
			$(".tablesearch").fadeIn(300);
			$(this).data('timer', setTimeout(search, 100));
		};
});

});

