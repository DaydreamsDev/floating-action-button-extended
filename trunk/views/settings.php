<?php

$activate = get_option('fz_fab_activate', '');
$position = get_option('fz_fab_position', '');
$type = get_option('fz_fab_type', '');

$main_img_id = get_option('fz_fab_main_img_id', '0');
$main_color = get_option('fz_fab_main_color', FZ_FAB_COLOR);
$main_bg_color = get_option('fz_fab_main_bg_color', FZ_FAB_BG_COLOR);
$main_img_attachment = wp_get_attachment_image_src($main_img_id, 128);
if(isset($main_img_attachment[0])){
    $main_img_src = $main_img_attachment[0];
}else{
    $main_img_src = FZ_FAB_DEFAULT_IMG;
}

$fz_fab_sub_btns = get_option('fz_fab_sub_btns', json_encode(array()));
$fz_fab_sub_btns = json_decode($fz_fab_sub_btns, TRUE);
    
?>

<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <div class="wrap" style="padding-bottom: 300px;">
            <h1 class="wp-heading-inline">
            	<?php _e('FAB (Floating Action Button)', 'floating-action-button'); ?>
            </h1>
            <table class="widefat">
                <thead>
                    <tr>
                        <th colspan="2">
                            <h1><?php _e('Basic Settings', 'floating-action-button'); ?></h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fz-td-1">
                            <?php _e('Activate', 'floating-action-button'); ?> <span class="required">*</span>	
                        </td>
                        <td>
                            <select id="fz-fab-activate" class="fz-form-element">
                                <option value="0" <?php if($activate == '0'){ echo 'selected'; } ?> ><?php _e('No', 'floating-action-button'); ?></option>
                                <option value="1" <?php if($activate == '1'){ echo 'selected'; } ?> ><?php _e('Yes', 'floating-action-button'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="fz-td-1">
                            <?php _e('Button Position', 'floating-action-button'); ?> <span class="required">*</span>	
                        </td>
                        <td>
                            <select id="fz-fab-position" class="fz-form-element">
                                <option value="1" <?php if($position == '1'){ echo 'selected'; } ?> ><?php _e('Top Left', 'floating-action-button'); ?></option>
                                <option value="2" <?php if($position == '2'){ echo 'selected'; } ?> ><?php _e('Top Right', 'floating-action-button'); ?></option>
                                <option value="3" <?php if($position == '3'){ echo 'selected'; } ?> ><?php _e('Bottom Right', 'floating-action-button'); ?></option>
                                <option value="4" <?php if($position == '4'){ echo 'selected'; } ?> ><?php _e('Bottom Left', 'floating-action-button'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="fz-td-1">
                            <?php _e('Button Type', 'floating-action-button'); ?> <span class="required">*</span>	
                        </td>
                        <td>
                            <select id="fz-fab-type" class="fz-form-element">
                                <option value="1" <?php if($type == '1'){ echo 'selected'; } ?> ><?php _e('Display on Click', 'floating-action-button'); ?></option>
                                <option value="2" <?php if($type == '2'){ echo 'selected'; } ?> ><?php _e('Display on Hover', 'floating-action-button'); ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="widefat fz-table">
                <thead>
                    <tr>
                        <td colspan="3">
                            <h1><?php _e('Main Button Settings', 'floating-action-button'); ?></h1>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fz-td-1">
                            <?php _e('Button Icon', 'floating-action-button'); ?> <span class="required">*</span>	
                        </td>
                        <td class="fz-td-2">
                            <button id="fz-fab-main-btn-icon" data-id="<?php esc_html_e($main_img_id) ?>" class="button button-small button-seconday">
                                <?php _e('Select Icon', 'floating-action-button'); ?> 
                            </button>
                            <small class="fz-fab-small"><?php _e('Size 128x128 px', 'floating-action-button'); ?></small>
                        </td>
                        <td rowspan="3" style="vertical-align: middle;">
                            <img src="<?php esc_html_e($main_img_src) ?>" id="fz-fab-main-btn-preview-img" style="background-color: <?php esc_html_e($main_bg_color) ?>; color: <?php esc_html_e($main_color) ?>;">
                        </td>
                    </tr>
                    <tr>
                        <td class="fz-td-1">
                            <?php _e('Icon Color', 'floating-action-button'); ?> <span class="required">*</span>	
                        </td>
                        <td class="fz-td-2">
                            <input id="fz-fab-main-btn-color" value="<?php esc_html_e($main_color) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="fz-td-1">
                            <?php _e('Background Color', 'floating-action-button'); ?> <span class="required">*</span>	
                        </td>
                        <td class="fz-td-2">
                            <input id="fz-fab-main-btn-bg-color" value="<?php esc_html_e($main_bg_color) ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="widefat fz-table">
                <thead>
                    <tr>
                        <th colspan="8">
                            <h1><?php _e('Sub Buttons Settings', 'floating-action-button'); ?></h1>
                        </th>
                    </tr>
                    <tr>
                        <th><?php _e('Title', 'floating-action-button'); ?> <span class="required">*</span></th>
                        <th><?php _e('Content', 'floating-action-button'); ?> <span class="required">*</span></th>
                        <th><?php _e('Button Icon', 'floating-action-button'); ?> <span class="required">*</span></th>
                        <th><?php _e('Text Color', 'floating-action-button'); ?> <span class="required">*</span></th>
                        <th><?php _e('Background Color', 'floating-action-button'); ?> <span class="required">*</span></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="fz-fab-sub-btns-tbody">
                    <?php if(is_array($fz_fab_sub_btns) && count($fz_fab_sub_btns) > 0): ?>
                        <?php foreach($fz_fab_sub_btns as $fz_fab_sub_btn): ?>
                            <?php $fz_fab_sub_btn = fz_fab_parse_content($fz_fab_sub_btn); ?>
                            <?php list($type, $title, $content, $img_id, $color, $bg_color) = explode('@ELFIN@', $fz_fab_sub_btn); ?>
                            <tr data-type="<?php esc_html_e($type) ?>">
                                <td>
                                    <div style="font-weight: bold; text-transform: uppercase;">
                                    	<?php esc_html_e($type) ?>
                                	</div>
                                    <input class="fz-fab-sub-btn-titles" value="<?php esc_html_e($title) ?>">
                                </td>
                                <td>
                                    <textarea class="fz-fab-sub-btn-contents"><?php esc_html_e($content) ?></textarea>
                                </td>
                                <td>
                                    <button data-id="<?php esc_html_e($img_id) ?>" class="button button-small button-secondary fz-fab-sub-btn-icons">
                                        <?php _e('Select Icon', 'floating-action-button'); ?>
                                    </button>
                                    <small class="fz-fab-small"><?php _e('Size 128x128 px', 'floating-action-button'); ?></small>
                                </td>
                                <td>
                                    <input class="fz-fab-sub-btn-colors" value="<?php esc_html_e($color) ?>">
                                </td>
                                <td>
                                    <input class="fz-fab-sub-btn-bg-colors" value="<?php esc_html_e($bg_color) ?>">
                                </td>
                                <td>
                                    <span class="dashicons dashicons-move fz-fab-sub-btn-sort"></span>
                                </td>
                                <td>
                                    <span class="dashicons dashicons-no fz-fab-sub-btn-rm"></span>
                                </td>
                                <td>
                                    <?php 
                                        $image_attachment = wp_get_attachment_image_src($img_id, 128);
                                        if(isset($image_attachment[0])){
                                            $image_src = $image_attachment[0];
                                        }else{
                                            $image_src = FZ_FAB_DEFAULT_IMG;
                                        }
                                    ?>
                                    <img class="fz-fab-sub-btn-preview-img" src="<?php esc_html_e($image_src) ?>" style="background-color: <?php esc_html_e($bg_color) ?>; color: <?php esc_html_e($color) ?>;">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>	
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <img onclick="fz_fab_add_sub_button('text', '#77B3D4');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/text.png" class="fz-fab-add-sub-btn-link" title="Text">
                            <img onclick="fz_fab_add_sub_button('whatsapp', '#28D044');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/whatsapp.png" class="fz-fab-add-sub-btn-link" title="WhatsApp">
                            <img onclick="fz_fab_add_sub_button('messenger', '#0084FF');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/messenger.png" class="fz-fab-add-sub-btn-link" title="Facebook Messenger">
                            <img onclick="fz_fab_add_sub_button('phone', '#DD4B3A');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/phone.png" class="fz-fab-add-sub-btn-link" title="Phone">
                            <img onclick="fz_fab_add_sub_button('email', '#1D6DF1');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/email.png" class="fz-fab-add-sub-btn-link" title="Email">
                            <img onclick="fz_fab_add_sub_button('viber', '#7D3DAF');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/viber.png" class="fz-fab-add-sub-btn-link" title="Viber">
                            <img onclick="fz_fab_add_sub_button('snapchat', '#FFFC00');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/snapchat.png" class="fz-fab-add-sub-btn-link" title="Snapchat">
                            <img onclick="fz_fab_add_sub_button('line', '#0CC200');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/line.png" class="fz-fab-add-sub-btn-link" title="Line">
                            <img onclick="fz_fab_add_sub_button('intercom', '#208CEB');" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/intercom.png" class="fz-fab-add-sub-btn-link" title="Intercom">
                        </td>
                    </tr>
                </tfoot>
            </table>
            <table>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <button id="save-changes-btn" class="button button-large button-primary">
                                <?php _e('Save Changes', 'floating-action-button'); ?>
                            </button>
                        </td>
                    </tr>  
                </tfoot>
            </table>
            <table class="widefat" style="margin-top: 40px;">
                <thead>
                    <tr>
                        <td colspan="2">
                            <h1><?php _e('Help for Content filed', 'floating-action-button'); ?></h1>
                            <h3 style="color: #008EC2;"><?php _e('If you have any suggestion or want to free/paid support, feel free to contact me at contact2farazquazi@gmail.com', 'floating-action-button'); ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Button Type', 'floating-action-button'); ?></b></td><td><b<?php _e('Content Description', 'floating-action-button'); ?>></b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b><?php _e('Text', 'floating-action-button'); ?></b></td><td><?php _e('Any type of simple text and shortcode.', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('WhatsApp', 'floating-action-button'); ?></b></td><td><?php _e('Any WhatsApp number like that 919806886806 (with country code but without any plus, preceding zero, hyphen, brackets, space)', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Facebook Messenger', 'floating-action-button'); ?></b></td><td><?php _e('Valid Facebook Page Slug', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Phone', 'floating-action-button'); ?></b></td><td><?php _e('Mobile number in this format +91-999-999-9999', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Email', 'floating-action-button'); ?></b></td><td><?php _e('Valid email address like xxxxx@yyyyy.com', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Viber', 'floating-action-button'); ?></b></td><td><?php _e('Viber Username', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Snapchat', 'floating-action-button'); ?></b></td><td><?php _e('Snapchat Username', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Line', 'floating-action-button'); ?></b></td><td><?php _e('Valid Line URL like http://line.me/ti/p/xxxxxx', 'floating-action-button'); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php _e('Intercom', 'floating-action-button'); ?></b></td><td><?php _e('App ID', 'floating-action-button'); ?></td>
                    </tr>
                </tbody>
                <tbody>
					<tr>
						<td colspan="3">
							<h3><?php _e('If you want only WhatsApp sticky button then use this plugin <a href="https://wordpress.org/plugins/wa-sticky-button" target="_blank">https://wordpress.org/plugins/wa-sticky-button</a>', 'floating-action-button'); ?></h3>
						</td>
					</tr>                	
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo wp_nonce_field('fz_fab_settings_save'); ?>
<script type="text/javascript">
jQuery(document).on("click", "#save-changes-btn", function(){
	jQuery(".fz-error").html("");
    var _wpnonce = jQuery("input[name='_wpnonce']").val();
    var _wp_http_referer = jQuery("input[name='_wp_http_referer']").val();
	var status = true;
	var activate = jQuery("#fz-fab-activate").val().trim();
	var position = jQuery("#fz-fab-position").val().trim();
	var type = jQuery("#fz-fab-type").val().trim();
	var m_img_id = jQuery("#fz-fab-main-btn-icon").data("id");
	var m_color = jQuery("#fz-fab-main-btn-color").val().trim();
	var m_bg_color = jQuery("#fz-fab-main-btn-bg-color").val().trim();
    var sub_settings = new Array();
	jQuery("#fz-fab-sub-btns-tbody").find("tr").each(function(){
        var _type = jQuery(this).data("type");
		var _title = jQuery(this).find(".fz-fab-sub-btn-titles").val().trim();
		var _content = jQuery(this).find(".fz-fab-sub-btn-contents").val().trim();
        var _img_id = jQuery(this).find(".fz-fab-sub-btn-icons").data("id");
        var _color = jQuery(this).find(".fz-fab-sub-btn-colors").val().trim();
        var _bg_color = jQuery(this).find(".fz-fab-sub-btn-bg-colors").val().trim();
		var row = _type +"@ELFIN@"+ _title +"@ELFIN@"+ _content +"@ELFIN@"+ _img_id +"@ELFIN@"+ _color +"@ELFIN@"+ _bg_color;
		sub_settings.push(row);
	});
    if(sub_settings.length == 0){
		alert("Please add at least one sub button.");
		status = false;
	}
	if(status == true){
		jQuery("#save-changes-btn").html('Saving...');
		jQuery.ajax({
	        type: "POST",
	        url: "<?php echo get_admin_url(); ?>admin-ajax.php",
	        data: {
	            "action": "fz_fab_settings_save",
                "_wpnonce": _wpnonce,
                "_wp_http_referer": _wp_http_referer,
				"activate": activate,
				"position": position,
				"type": type,
				"m_img_id": m_img_id,
				"m_color": m_color,
				"m_bg_color": m_bg_color,
				"sub_settings": sub_settings,
	        },
	        success: function(res){
				jQuery("#save-changes-btn").html('Save Changes');
	        }
	    });	
	}
});

function fz_fab_add_sub_button(type, bg_color){
    var image_html = '<img class="fz-fab-sub-btn-preview" src="<?php echo FZ_FAB_PLUGIN_URL; ?>assets/img/'+ type +'.png">';
    var html = '';
    html += '<tr data-type="'+ type +'">';
    html += '   <td>';
    html += '        <div style="font-weight: bold;">'+ type.toUpperCase() +'</div>';
    html += '        <input class="fz-fab-sub-btn-titles" value="'+ type +'">';
    html += '   </td>';
    html += '   <td>';
    html += '        <textarea class="fz-fab-sub-btn-contents"></textarea>';
    html += '   </td>';
    html += '   <td>';
    html += '       <button data-id="0" class="button button-small button-secondary fz-fab-sub-btn-icons">';
    html += '           Select Icon';
    html += '       </button>';
    html += '       <small class="fz-fab-small">Size 128x128 px</small>';
    html += '   </td>';
    html += '   <td>';
    html += '       <input class="fz-fab-sub-btn-colors" value="<?php echo FZ_FAB_COLOR; ?>">';
    html += '   </td>';
    html += '   <td>';
    html += '       <input class="fz-fab-sub-btn-bg-colors" value="'+bg_color+'">';
    html += '   </td>';
    html += '   <td>';
    html += '       <span class="dashicons dashicons-move fz-fab-sub-btn-sort"></span>';
    html += '   </td>';
    html += '   <td>';
    html += '       <span class="dashicons dashicons-no fz-fab-sub-btn-rm"></span>';
    html += '   </td>';
    html += '   <td>';
    html += '      <img class="fz-fab-sub-btn-preview-img" src="<?php echo FZ_FAB_DEFAULT_IMG; ?>" style="background-color: <?php echo FZ_FAB_BG_COLOR; ?>; color: <?php echo FZ_FAB_COLOR; ?>;">';
    html += '   </td>';
    html += '</tr>';
	jQuery("#fz-fab-sub-btns-tbody").append(html);
	fz_fab_ini_for_sub_btn();
}

jQuery(document).on("click", ".fz-fab-sub-btn-rm", function(){
	jQuery(this).parent().parent().remove();
});
</script>