
(function($){
    'use strict';
    
    const startLoading = () => {
        jQuery("#submitForm").addClass("loading");
        jQuery("#desharioForm :input").prop("disabled", true);
    }

    const completeLoading = () => {
        jQuery("#submitForm").removeClass("loading");
        jQuery("#desharioForm :input").prop("disabled", false);
    }

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
                    username : jQuery("input[name='firstname']").val()
                },
                beforeSend: startLoading,
                complete: completeLoading,
                success : response => {
                    console.log(response);
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    console.log(`${xhr.status} ${ajaxOptions}`);
                    completeLoading();
                }
            });
        });

    });

})(jQuery);