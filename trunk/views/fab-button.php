<?php 

$position = get_option('fz_fab_position', '3'); 

$main_img_id = get_option('fz_fab_main_img_id', 0);
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

<style type="text/css">
<?php if($position == '1'): ?>
    .fz-fab-container{
        top: 0px !important;
        left: 0px !important;
    }
    .fz-fab-buttons.fz-fab-secondary{
        -webkit-transform: translateY(-50px) !important;
        -ms-transform: translateY(-50px) !important;
        transform: translateY(-50px) !important;
    }
    .fz-fab-box{
        top: 15px !important;
        left: 15px !important; 
    } 
<?php elseif($position == '2'): ?>
    .fz-fab-container{
        top: 0px !important;
        right: 0px !important;
    }
    .fz-fab-buttons.fz-fab-secondary{
        -webkit-transform: translateY(-50px) !important;
        -ms-transform: translateY(-50px) !important;
        transform: translateY(-50px) !important;
    }
    .fz-fab-box{
        top: 15px !important;
        right: 15px !important; 
    } 
<?php elseif($position == '3'): ?>
    .fz-fab-container{
        bottom: 0px !important;
        right: 0px !important;
    }
    .fz-fab-buttons.fz-fab-secondary{
        -webkit-transform: translateY(50px) !important;
        -ms-transform: translateY(50px) !important;
        transform: translateY(50px) !important;
    }
    .fz-fab-box{
        bottom: 15px !important;
        right: 15px !important; 
    } 
<?php elseif($position == '4'): ?>
    .fz-fab-container{
        bottom: 0px !important;
        left: 0px !important;
    }
    .fz-fab-buttons.fz-fab-secondary{
        -webkit-transform: translateY(50px) !important;
        -ms-transform: translateY(50px) !important;
        transform: translateY(50px) !important;
    }
    .fz-fab-box{
        bottom: 15px !important;
        left: 15px !important; 
    } 
<?php endif; ?>
.fz-fab-container{
    position: fixed !important;
    margin: 1em !important;
    z-index: 999999999 !important;
}
.fz-fab-buttons:active,
.fz-fab-buttons:focus,
.fz-fab-buttons:hover{
    box-shadow: 1px 4px 14px 1px rgba(0, 0, 0, 0.20) !important;
}
.fz-fab-buttons.fz-fab-primary{
    box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.20) !important;
    border-radius: 100% !important;
    display: block !important;
    width: 64px !important;
    height: 64px !important;
    margin: 10px auto 0 !important;
    position: relative !important;
    -webkit-transition: all .1s ease-out !important;
    transition: all .1s ease-out !important;
    text-align: center !important;
    font-size: 28px !important;
    z-index: 999 !important;
}
.fz-fab-buttons.fz-fab-primary img{
    border-radius: 50% !important;
    width: 64px !important;
    height: 64px !important;
}
.fz-fab-buttons.fz-fab-secondary{
    box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.20) !important;
    border-radius: 100% !important;
    display: block !important;
    width: 48px !important;
    height: 48px !important;
    margin: auto !important;
    position: relative !important;
    text-align: center !important;
    font-size: 24px !important;
    z-index: 100 !important;
    opacity: 0 !important;
    transition: all .1s ease-out !important;
    -webkit-transition: all 0.1s ease-out !important;
    -ms-transition: all 0.1s ease-out !important;
}
.fz-fab-buttons.fz-fab-secondary img{
    width: 48px !important;
    height: 48px !important;
    border-radius: 50% !important;
}
.fz-fab-active .fz-fab-buttons.fz-fab-secondary{
    transform: none !important;
    -webkit-transform: none !important;
    -ms-transform: none !important;
    opacity: 1 !important;
    margin: 7px auto 0px !important;
}
.fz-fab-box{
    width: auto !important; 
    height: auto !important; 
    min-width: 320px !important; 
    min-height: 320px !important; 
    max-width: 460px !important; 
    max-height: auto !important; 
    background-color: #fff !important; 
    position: fixed !important; 
    z-index: 9999999999 !important; 
    box-shadow: -3px 20px 20px 0px rgba(0, 0, 0, 0.1) !important; 
    overflow: hidden !important;
    display: none;
} 
@media (max-width: 460px){
    .fz-fab-box{
        width: 100% !important; 
        height: 100% !important;
        min-width: 100% !important; 
        min-height: 100% !important; 
        top: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
    } 
}
.fz-fab-box-head{
    line-height: 40px !important; 
    vertical-align: middle !important;
    padding: 0px 15px !important;
}
.fz-fab-box-hide{
    float: right !important; 
    display: inline-block !important; 
    opacity: 0.7 !important;
}
.fz-fab-box-hide:hover{
    cursor: pointer !important;
    opacity: 1 !important;
}
</style>

<nav class="fz-fab-container"> 
	<?php if($position == '1' || $position == '2'): ?>
	    <a href="javascript: void(0);" class="fz-fab-buttons fz-fab-primary" style="display: none; background-color: <?php esc_html_e($main_bg_color) ?> !important; color: <?php esc_html_e($main_color) ?> !important;">
	    	<img src="<?php esc_html_e($main_img_src) ?>">
	    </a>
	<?php endif; ?>    

	<?php if(is_array($fz_fab_sub_btns) && count($fz_fab_sub_btns) > 0): ?>
		<?php foreach($fz_fab_sub_btns as $i => $fz_fab_sub_btn): ?>
			<?php 
                list($type, $title, $content, $img_id, $color, $bg_color) = explode('@ELFIN@', $fz_fab_sub_btn); 
                $image_attachment = wp_get_attachment_image_src($img_id, 128);
                if(isset($image_attachment[0])){
                    $image_src = $image_attachment[0];
                }else{
                    $image_src = FZ_FAB_DEFAULT_IMG;
                }
            ?>
            <a id="fz-fab-btn-<?php echo $i; ?>" data-id="<?php echo $i; ?>" title="<?php esc_html_e($title) ?>" href="javascript: void(0);" class="fz-fab-buttons fz-fab-secondary">
                <img src="<?php esc_html_e($image_src) ?>" style="color: <?php esc_html_e($color) ?> !important; background-color: <?php esc_html_e($bg_color) ?> !important;">
			</a>
		<?php endforeach; ?>	
	<?php endif; ?>	

	<?php if($position == '3' || $position == '4'): ?>
	    <a href="javascript: void(0);" class="fz-fab-buttons fz-fab-primary" style="display: none; background-color: <?php esc_html_e($main_bg_color) ?> !important; color: <?php esc_html_e($main_color) ?> !important;">
	    	<img src="<?php esc_html_e($main_img_src) ?>">
	    </a>
	<?php endif; ?>
</nav>


<?php if(is_array($fz_fab_sub_btns) && count($fz_fab_sub_btns) > 0): ?>
    <?php foreach($fz_fab_sub_btns as $i => $fz_fab_sub_btn): ?>
        <?php 
            list($type, $title, $content, $img_id, $color, $bg_color) = explode('@ELFIN@', $fz_fab_sub_btn); 
            $content = fz_fab_parse_content($content);
            $content = esc_html($content);
            $image_attachment = wp_get_attachment_image_src($img_id, 128);
            if(isset($image_attachment[0])){
                $image_src = $image_attachment[0];
            }else{
                $image_src = FZ_FAB_DEFAULT_IMG;
            }
        ?>
        <?php if($type == 'intercom'): ?>
            <script type="text/javascript">(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/<?php esc_html_e($content, 'floating-action-button'); ?>';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
            <script type="text/javascript">
            window.intercomSettings = {
                app_id: "<?php esc_html_e($content, 'floating-action-button'); ?>",
                hide_default_launcher: true,
                custom_launcher_selector: "#fz-fab-btn-<?php echo $i; ?>",
            };
            Intercom('onHide', function(){
                jQuery(".fz-fab-container").fadeIn(500);
            });
            </script>
        <?php else: ?>    
            <div data-id="<?php echo $i; ?>" class="fz-fab-box">
                <div class="fz-fab-box-head" style="background-color: <?php esc_html_e($bg_color) ?>; color: <?php esc_html_e($color) ?>; position: relative;">
                    <div style="display: inline-block; width: 30px;">
                        <span style="position: absolute; display: block; background-image: url('<?php esc_html_e($image_src) ?>'); width: 27px; height: 27px; background-size: cover; background-repeat: no-repeat; background-position: center; margin-top: -20px;"></span>
                    </div>
                    <?php esc_html_e($title, 'floating-action-button'); ?>
                    <span data-id="<?php echo $i; ?>" class="fz-fab-box-hide">x</span>
                </div>
                <div class="fz-fab-body" style="padding: 20px; font-family: courier;">
                    <?php if($type == 'whatsapp'): ?>
						<?php
							$number = $content;
							$invalid_array = array(' ', '+', '-', '(', ')', '{', '}', '[', ']');
							$number = str_replace($invalid_array, '', $number);
							$whatsapp_url = 'https://wa.me/'.$number.'?text=Hi';
						?>
                        <div style="display: block; margin-bottom: 32px; text-align: center; font-size: 16px; font-weight: bold;">
                            <p>
                                <?php esc_html_e('WhatsApp Number', 'floating-action-button'); ?>
                            </p>
                            <p>
                                <?php esc_html_e($content, 'floating-action-button'); ?>
                            </p>
                        </div>
                        <div style="color: <?php esc_html_e($bg_color) ?>; text-align: center; font-size: 18px;">
                            <a href="<?php esc_html_e($whatsapp_url) ?>" target="_blank" style="padding: 10px 15px; border-radius: 3px; background-color: <?php esc_html_e($bg_color) ?>; color: <?php esc_html_e($color) ?>; text-decoration: none;">
                                <?php esc_html_e('Message', 'floating-action-button'); ?>
                            </a>
                        </div>
                    <?php elseif($type == 'messenger'): ?>
                        <iframe style="border: none; border-radius: 0 0 16px 16px; overflow: hidden;" scrolling="no" allowtransparency="true" src="https://www.facebook.com/plugins/page.php?href=http://facebook.com/<?php esc_html_e($content, 'floating-action-button'); ?>/&tabs=messages&small_header=true&width=300&height=320&adapt_container_width=true&hide_cover=true&show_facepile=false&appId=" width="300" height="320" frameborder="0"></iframe>
                    <?php elseif($type == 'phone'): ?>
                        <a href="tel:<?php echo str_replace(' ', '-', $content); ?>" style="display: block; text-align: center; margin-top: 10px; font-size: 24px; color: <?php esc_html_e($bg_color) ?>;">
                            <?php esc_html_e($content, 'floating-action-button'); ?>
                        </a>
                    <?php elseif($type == 'email'): ?>
                        <a href="mailto:<?php esc_html_e($content, 'floating-action-button'); ?>" style="display: block; text-align: center; margin-top: 10px; font-size: 24px; color: <?php esc_html_e($bg_color) ?>;">
                            <?php esc_html_e($content, 'floating-action-button'); ?>
                        </a>
                    <?php elseif($type == 'viber'): ?>
                        <a href="http://chats.viber.com/<?php esc_html_e($content, 'floating-action-button'); ?>" onclick="window.open(this.href, 'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=800, height=800'); return false;" style="display: block; text-align: center; margin-top: 10px; font-size: 24px; color: <?php esc_html_e($bg_color) ?>;">
                            <?php esc_html_e($content, 'floating-action-button'); ?>
                        </a>
                    <?php elseif($type == 'snapchat'): ?>
                        <div style="width: 300px; text-align: center;">
                            <object data="https://feelinsonice-hrd.appspot.com/web/deeplink/snapcode?username=<?php esc_html_e($content, 'floating-action-button'); ?>&type=PNG" type="image/png" width="200px" height="200px"></object>
                            <div style="display: block; text-align: center; margin-top: 10px; font-size: 24px; color: <?php esc_html_e($bg_color) ?>;">
                                <?php esc_html_e($content, 'floating-action-button'); ?>
                            </div>
                        </div>
                    <?php elseif($type == 'line'): ?>
                        <iframe style="height: 490px; margin-top: -115px;" scrolling="no" allowtransparency="true" src="<?php esc_html_e($content, 'floating-action-button'); ?>" frameborder="0"></iframe>
                    <?php else: ?>
                        <div class="post-content">
                            <?php echo do_shortcode($content); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>   
    <?php endforeach; ?>
<?php endif; ?>