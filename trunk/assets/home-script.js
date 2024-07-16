jQuery(window).load(function(){
	jQuery(".fz-fab-buttons fz-fab-primary").fadeIn(500);
});

jQuery(document).on("click", ".fz-fab-buttons.fz-fab-secondary", function(){
    var id = jQuery(this).data("id");
    jQuery(".fz-fab-box[data-id='"+ id +"']").fadeIn(500);
    jQuery(".fz-fab-container").fadeOut();
});

jQuery(document).on("click", ".fz-fab-box-hide", function(){
    var id = jQuery(this).data("id");
    jQuery(".fz-fab-box[data-id='"+ id +"']").fadeOut();
    jQuery(".fz-fab-container").fadeIn(500);
});