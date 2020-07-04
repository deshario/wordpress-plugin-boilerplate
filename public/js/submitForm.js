
(function( $ ) {
	'use strict';
    
    jQuery(window).load(function(){
        
        console.log('jQuery Version : ',jQuery.fn.jquery);

        console.log('wp_localize_script : ',desharioLocalize);

        jQuery("#submitForm").click(function(e){
            e.preventDefault();
            jQuery.ajax({
                url : desharioLocalize.ajax_url,
                type : 'POST',
                data : {
                    // action : 'testAjaxRequest',
                    action : 'postSampleAjaxRequest',
                    security : desharioLocalize.deshario_nonce, // Validate None
                    username : 'deshario'
                },
                success : function( response ) {
                    console.log(response);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(`${xhr.status} ${ajaxOptions}`);
                }
            });
        });

        window.ajaxSubmit = () => {
            var BookingForm = jQuery(this).serialize();
            console.log('BookingForm :: ',BookingForm);
        }

    });

})(jQuery);