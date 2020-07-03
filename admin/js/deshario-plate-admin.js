(function($){
	'use strict';

	console.log('Admin Loaded');
	
	$( window ).load(function(){
		console.log('Ready');
		jQuery('.menu .item').tab();
	});
	
	window.userFormSubmit = () => {
		let user = jQuery("#username").val();
		alert(`Welcome : ${user}`);
	}

})(jQuery);