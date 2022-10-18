/* global ajaxurl */
(function($) {
        function find_catname( element ) {
		return  element.html();
	}
        function find_catnameall(){
            getValue= $("#allcatname").val();
            return (getValue);
        }
	$(document).on( 'click', '.topiccatlink a', function( event ) {
	event.preventDefault();
        catname = find_catname( $(this).clone() );
	  
        if(catname === "All"){
           catname = find_catnameall();
        }
        //alert(catname);
        $.ajax({
		url: ajaxurl,
		type: 'post',
		data: {
			action: 'ajax_getcatposts',
                        catname: catname
		},
		success: function( result ) {
                        $("#ajaxpostsbycat").html(result);
		}
	});
});
})(jQuery);

(function($) {
        function find_page_number( element ) {
                    element.find('span').remove();
                    return parseInt( element.html() );
            }
          function find_catnopagination(){
            getcatValue= $("#passcatidtoajax").val();
            return (getcatValue);
        }
	$(document).on( 'click', '.navlinkstopics .nav-links a', function( event ) {
	event.preventDefault();
        page = find_page_number( $(this).clone() );
        catno = find_catnopagination();
	$.ajax({
		url: ajaxurl,
		type: 'post',
		data: {
			action: 'ajax_paginationcat',
                        page: page,
                        catno : catno
		},
		success: function( result ) {
                        $("#ajaxpostsbycat").html(result);
		}
	});
});
})(jQuery);

