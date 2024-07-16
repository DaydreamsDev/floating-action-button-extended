
jQuery(window).load(function(){
	jQuery(document).on("click", ".fz-fab-buttons.fz-fab-primary", function(){
		jQuery(".fz-fab-container").toggleClass("fz-fab-active");
	});
});
