
jQuery(document).ready(function(){

	jQuery("#fz-fab-sub-btns-tbody").sortable();

	jQuery(document).on("click", "#fz-fab-main-btn-icon", function(){
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: "Choose Icon Image",
            button: {
                text: "Select",
            },
            multiple: false,
        });
        file_frame.on("select", function(){
            attachment = file_frame.state().get("selection").first().toJSON();
            jQuery("#fz-fab-main-btn-icon").data("id", attachment.id);
            jQuery("#fz-fab-main-btn-preview-img").attr("src", attachment.url);
        });
        file_frame.open();
    });

	jQuery("#fz-fab-main-btn-color").wpColorPicker({
	    defaultColor: false,
	    hide: true,
	    palettes: true,
	    change: function(event, ui){
	        jQuery("#fz-fab-main-btn-preview-img").css("color", ui.color.toString());
	    },
	    clear: function(){
	    },
	});
	
	jQuery("#fz-fab-main-btn-bg-color").wpColorPicker({
	    defaultColor: false,
	    hide: true,
	    palettes: true,
	    change: function(event, ui){
	        jQuery("#fz-fab-main-btn-preview-img").css("background-color", ui.color.toString());
	    },
	    clear: function(){
	    },
	});

	jQuery(document).on("click", ".fz-fab-sub-btn-icons", function(){
        var obj = jQuery(this);
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: "Choose Icon Image",
            button: {
                text: "Select",
            },
            multiple: false,
        });
        file_frame.on("select", function(){
            attachment = file_frame.state().get("selection").first().toJSON();
            jQuery(obj).data("id", attachment.id);
            jQuery(obj).parents("tr").find(".fz-fab-sub-btn-preview-img").attr("src", attachment.url);
        });
        file_frame.open();
    });

	fz_fab_ini_for_sub_btn();
});

function fz_fab_ini_for_sub_btn(){
	jQuery(".fz-fab-sub-btn-colors").wpColorPicker({
	    defaultColor: false,
	    hide: true,
	    palettes: true,
	    change: function(event, ui){
	        jQuery(this).parents("tr").find(".fz-fab-sub-btn-preview-img").css("color", ui.color.toString());
	    },
	    clear: function(){
	    },
	});
	jQuery(".fz-fab-sub-btn-bg-colors").wpColorPicker({
	    defaultColor: false,
	    hide: true,
	    palettes: true,
	    change: function(event, ui){
	        jQuery(this).parents("tr").find(".fz-fab-sub-btn-preview-img").css("background-color", ui.color.toString());
	    },
	    clear: function(){
	    },
	});
}