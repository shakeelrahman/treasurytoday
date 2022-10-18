/* global ajaxurl */
(function($) {
        function find_page_number( element ) {
		element.find('span').remove();
                
		//var pageno =  parseInt( element.html() );
                var pageno =  element.html();
                //alert pageno;
                if(pageno == '<i class="fa-solid fa-arrow-right text-secondary ps-3"></i>')
                {
                    pageno = parseInt($("#wacurrentpageno").val()) + 1;
                }
                else
                    if (pageno =='<i class="fa-solid fa-arrow-left text-secondary pe-3"></i>')
                        {
                            pageno = parseInt($("#wacurrentpageno").val()) - 1;
                        }
                     else
                         pageno =  parseInt( pageno );
                return pageno;
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

