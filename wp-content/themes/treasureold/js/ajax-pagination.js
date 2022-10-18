/* global ajaxurl */
(function($) {
        function find_page_number( element ) {
		element.find('span').remove();
		return parseInt( element.html() );
	}
	$(document).on( 'click', '.nav-links a', function( event ) {
	event.preventDefault();
        page = find_page_number( $(this).clone() );
        //alert (page);
	$.ajax({
		url: ajaxurl,
		type: 'post',
		data: {
			action: 'ajax_pagination',
                        page: page
		},
		success: function( result ) {
                        $("#ajaxrefresh").html(result);
		}
	});
});


$("#clear-cart").click( function(e){
    e.preventDefault();
    //alert("removeCookie");
    $.ajax({
		url: ajaxurl,
		type: 'post',
		data: {
			action: 'logoutfromsystem',
		},
		success: function(result) {
                        //alert(result);
                        location.reload();
		}
	});
});
})(jQuery);

