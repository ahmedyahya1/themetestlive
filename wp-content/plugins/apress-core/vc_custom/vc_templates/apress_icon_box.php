<?php 
/*-----------------------------------------------------------------------------------*/
/* Icon Boxes
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

	extract(shortcode_atts(array(
		'icon_family'							=> '',
		'icon_fontawesome'						=> 'fa fa-adjust',
		'icon_openiconic'						=> 'vc-oi vc-oi-dial',
		'icon_typicons'							=> 'typcn typcn-adjust-brightness',
		'icon_entypo'							=> 'entypo-icon entypo-icon-note',
		'icon_linecons'							=> 'vc_li vc_li-heart',
		'icon_monosocial'						=> 'vc-mono vc-mono-fivehundredpx',
		'icon_linea'							=> 'icon-basic-heart',
		'box_style'								=> 'box_style_none',
		'box_hover_style'						=> 'box_hover_none',
		'box_hover_style1'						=> 'box_hover_none',
		'box_variation'							=> 'default',
		'box_bg'								=> '#f4f4f4',
		'box_border'							=> '#a2a2a2',
		'box_hover_bg'							=> '#00c3f3',
		'box_hover_bg1'							=> '#00c3f3',
		'box_hover_border'						=> '#00c3f3',
		'box_hover_border1'						=> '#00c3f3',	
		'icon_shadow'							=> 'no',
		'iconcolor'								=> '#0088CC',
		'iconcolor_hover'						=> '#39aae2',
		'icon_size'								=> '30',
		'icon_background_shape'					=> 'none',
		'variation_icon_bg_shape'				=> 'circle',
		'variation_icon_border_color'			=> '#27b6fe',
		'icon_background_shape_type'			=> 'solid_background',
		'shape_background_color'				=> '#27b6fe',
		'variation_icon_bg_color'				=> '#27b6fe',
		'shape_size'							=> '60',
		'iconposition'							=> 'left',
		'iconposition2'							=> 'left',
		'iconhoverstyle1'						=> 'none',
		'iconhoverstyle2'						=> 'none',
		'icon_hover_color'						=> '#cccccc',
		'icon_hover_bg_color'					=> '#27b6fe',
		'variation_icon_hover_bg_color'			=> '#27b6fe',
		'variation_icon_hover_border_color' 	=> '#27b6fe',
		'variation_icon_hover_bg_color1'		=> '#27b6fe',
		'variation_icon_hover_border_color1' 	=> '#27b6fe',
		'contentboxtitle'						=> 'This is Title',
		'contentboxtitle_size'					=> '24',
		'boxtitlepad'							=> '',
		'contentboxarea'						=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis elit nec sem laoreet tempor sit amet a quam.',
		'title_desc_color'						=> '#333333',
		'text_hover_corder'						=> '#ffffff',
		'text_hover_corder1'					=> '#ffffff',
		'box_icon_hover_color'					=> '#ffffff',
		'box_icon_hover_color1'					=> '#ffffff',
		'contentarealink'						=> '',
		'contentboxanimation'					=> 'No Animation',
		'contentboxdelay'						=> '500',	
		'css'									=> '',
	), $atts));


//RTL Colde
if ( is_rtl() ){
		if($iconposition == 'left'){
			$iconposition = 'right';
		}else if($iconposition == 'right'){
			$iconposition = 'left';
		}else{
			$iconposition = 'center';
		}
		
		if($iconposition2 == 'left'){
			$iconposition2 = 'right';
		}else if($iconposition2 == 'right'){
			$iconposition2 = 'left';
		}else{
			$iconposition2 = 'center';
		}
		
	}else{
		$iconposition = $iconposition;
		$iconposition2 = $iconposition2;
	}

//icon
switch($icon_family) {
	case 'fontawesome':
		$icon = $icon_fontawesome;
		break;
	case 'openiconic':
		$icon = $icon_openiconic;
		break;
	case 'typicons':
		$icon = $icon_typicons;
		break;
	case 'entypo':
		$icon = $icon_entypo;
		break;
	case 'linecons':
		$icon = $icon_linecons;
		break;
	case 'monosocial':
		$icon = $icon_monosocial;
		break;
	case 'linea':
		$icon = $icon_linea;
		break;	
	case 'default_arrow':
		$icon = 'icon-button-arrow';
		break;
	default:
		$icon = '';
		break;
}

if(!empty($icon_family) && $icon_family != 'none') {
	$icon = $icon;
} 
else {
	$icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_family );

//regular(grad) linea
if(!empty($icon_family) && $icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'zolo_icon_box', $atts );
$css_class = esc_attr( trim( $css_class ) );

		//Animation			
		$animatedclass = ($contentboxanimation == 'No Animation') ? 'noanimation' : 'animated hiding';			
		
		//$boxtitlepad = explode(",",$boxtitlepad);
		$boxtitlepad = esc_js(Zolo_Param_Padding::paddings_css($boxtitlepad));
		
		$contentarealink = vc_build_link( $contentarealink );
		
		$box_id = RandomString(20);	
		
		$shadow = ($icon_shadow == "yes") ? '<i class="zolo_icon_shadow '.$icon.'"></i>' : '';
		
		
		$uniqid = uniqid(rand());
		$zolo_iconbox_counter = 'acp_'.$uniqid;
		
		if($box_style == 'box_style_none'){
			$boxhoverstyle = '';
		}else{
			if($box_variation == 'default'){
				$boxhoverstyle = $box_hover_style;
			}else{
				$boxhoverstyle = $box_hover_style1;
			}
		}
		if($icon_background_shape == 'none'){
			$icon_background_shapetype = '';
		}else{
			$icon_background_shapetype = $icon_background_shape_type;
		}
		
		if($icon_background_shape_type == 'solid_background'){
			$iconbackground_shape_type_css = ' background:'.$shape_background_color.';';
		}else if($icon_background_shape_type == 'thin_bordered'){
			$iconbackground_shape_type_css = ' box-shadow: 0 0 0 1px '.$shape_background_color.' inset;';
		}else if($icon_background_shape_type == 'thick_bordered'){
			$iconbackground_shape_type_css = ' box-shadow: 0 0 0 3px '.$shape_background_color.' inset;';
		}
						
		if($box_style == 'box_style_none'){ 
		// box_style_none
		echo '<div class="zolo-icon-boxes zolo-icon-boxes-'.$zolo_iconbox_counter.' '.$box_style.' '.$boxhoverstyle.' '.$iconposition.' '.$animatedclass.' '.$css_class.'" data-animation ="'.$contentboxanimation.'" data-delay ="'.$contentboxdelay.'">';
		
		// Icon
		$hoverstyle = ($icon_background_shape_type == 'solid_background') ? $iconhoverstyle1 : $iconhoverstyle2 ;
		
		echo '<div id="rand_'.$box_id.'" class="zolo-icon-box '.$icon_background_shape.' '.$icon_background_shapetype.' '.$hoverstyle.'" style="font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;width:'.$shape_size.'px;height:'.$shape_size.'px;">';
		
		if($iconhoverstyle1 == 'flip-vertical' || $iconhoverstyle1 == 'flip-horizontal'){
			$iconhoverstyle1 = ($iconhoverstyle1 != 'solid-outline')? $iconbackground_shape_type_css : '';
		   // Only flip 
			echo '<div class="icon_front">';
				echo '<i class="zolo-icon '.$icon.'"></i>';
				echo '<span class="zolo_icon_shape" style="'.$iconhoverstyle1.'"></span>';
			echo '</div>';
			echo '<div class="icon_back">';
			echo '<i class="zolo-icon '.$icon.'"></i>';
			echo '<span class="zolo_icon_shape" style="'.$iconhoverstyle1.'"></span>';
			echo '</div>';
		}else if($iconhoverstyle1 == 'swipe-down' || $iconhoverstyle1 == 'swipe-up' || $iconhoverstyle1 == 'swipe-left' || $iconhoverstyle1 == 'swipe-right'){
			$iconhoverstyle1 = ($iconhoverstyle1 != 'solid-outline')? $iconbackground_shape_type_css : '';
			 // Only Swipe                
			echo '<div class="icon_swipe">';
				echo '<i class="zolo-icon '.$icon.'"></i>';
				echo '<span class="zolo_icon_shape" style="'.$iconhoverstyle1.'"></span>';
			echo '</div>';
			echo '<div class="icon_swipe_hover">';
				echo '<i class="zolo-icon '.$icon.'"></i>';
				echo '<span class="zolo_icon_shape" style="'.$iconhoverstyle1.'"></span>';
			echo '</div>';
			
		}else{								
			echo '<i class="zolo-icon '.$icon.'"></i>';
			echo $shadow;
			if($icon_background_shape != 'none'){ ?>

<span class="zolo_icon_shape" style=" <?php if($iconhoverstyle1 != 'solid-outline'){ echo $iconbackground_shape_type_css;} ?>"></span>
<?php						
			}
			
		 } 
		
		echo '</div>';
		
		echo '<div class="zolo-icon-content">';
		if($contentboxtitle){
			echo '<h2 style="'.$boxtitlepad.'">';
echo (esc_attr( $contentarealink['url'] )) ? '<a title="'.esc_attr( $contentarealink['title'] ).'" href="'.esc_attr( $contentarealink['url'] ).'" target="'.( strlen( $contentarealink['target'] ) > 0 ? esc_attr( $contentarealink['target'] ) : '_self' ).'">' : '';
echo $contentboxtitle;
echo (esc_attr( $contentarealink['url'])) ? '</a>' : '';
echo '</h2>';
		}
		echo $contentboxarea ? '<p>'.$contentboxarea.'</p>' : '';				
		echo '</div>';
		
		echo '</div>';
		
	}else{ ?>
<!--Variation-->

<?php if($box_variation == 'variation_modern'){?>
<div class="zolo-icon-boxes zolo-icon-boxes-<?php echo $zolo_iconbox_counter;?> center <?php echo $box_style.' '.$boxhoverstyle.' '.$box_variation.' '.$variation_icon_bg_shape .' '.$css_class;?> animated hiding" data-animation ="<?php echo $contentboxanimation; ?>" data-delay ="<?php echo $contentboxdelay;?>"> 
  
  <!--box Icon-->
  <div id="rand_<?php echo $box_id;?>" class="zolo-icon-box <?php echo $variation_icon_bg_shape;?>"> <i class="zolo-icon <?php echo $icon; ?>"></i> </div>
  <!--box Content-->
  <div class="zolo-icon-content">
    <?php if($contentboxtitle){
			echo '<h2 style="'.$boxtitlepad.'">';?>
    <?php if(esc_attr( $contentarealink['url'] )){?>
    <a title="<?php echo esc_attr( $contentarealink['title'] );?>" href="<?php echo esc_attr( $contentarealink['url'] );?>" target="<?php echo ( strlen( $contentarealink['target'] ) > 0 ? esc_attr( $contentarealink['target'] ) : '_self' )?>">
    <?php }?>
    <?php echo $contentboxtitle;?>
    <?php if(esc_attr( $contentarealink['url'] )){?>
    </a>
    <?php }?>
    </h2>
    <?php }?>
    <?php if($contentboxarea){?>
    <p><?php echo $contentboxarea; ?></p>
    <?php }?>
  </div>
</div>
<?php }else{ ?>
<div class="zolo-icon-boxes zolo-icon-boxes-<?php echo $zolo_iconbox_counter;?> <?php echo $box_style.' '.$boxhoverstyle.' '.$iconposition2.' '.$box_variation;?> animated hiding" data-animation ="<?php echo $contentboxanimation; ?>" data-delay ="<?php echo $contentboxdelay;?>">
  <?php if($box_hover_style == 'box-flip-vertical'){ ?>
  <div class="zolo-flip-box equal_height">
    <div class="box_front equal_height">
      <div class="zolo-icon-box_des equal_height">
        <div class="box_flip_pad"> 
          <!--box Icon-->
          <div id="rand_<?php echo $box_id;?>" class="zolo-icon-box <?php if($icon_background_shape_type == 'solid_background'){ echo $iconhoverstyle1; }else{echo $iconhoverstyle2;} ?>" style="font-size:<?php echo $icon_size;?>px;line-height:<?php echo $icon_size;?>px;width:<?php echo $shape_size;?>px;height:<?php echo $shape_size;?>px;"> <i class="zolo-icon <?php echo $icon; ?>"></i> </div>
          <!--box Content-->
          <div class="zolo-icon-content">
            <?php if($contentboxtitle){ 
					echo '<h2 style="'.$boxtitlepad.'">';
						if(esc_attr( $contentarealink['url'] )){?>
            <a title="<?php echo esc_attr( $contentarealink['title'] );?>" href="<?php echo esc_attr( $contentarealink['url'] );?>" target="<?php echo ( strlen( $contentarealink['target'] ) > 0 ? esc_attr( $contentarealink['target'] ) : '_self' )?>">
            <?php } ?>
            <?php echo $contentboxtitle;?>
            <?php if(esc_attr( $contentarealink['url'] )){?>
            </a>
            <?php } ?>
            </h2>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <div class="box_back equal_height">
      <div class="zolo-icon-box_des equal_height">
        <div class="box_flip_pad"> 
          <!--box Content-->
          <div class="zolo-icon-content">
            <?php if($contentboxtitle){ 
					echo '<h2 style="'.$boxtitlepad.'">';
						if(esc_attr( $contentarealink['url'] )){?>
            <a title="<?php echo esc_attr( $contentarealink['title'] );?>" href="<?php echo esc_attr( $contentarealink['url'] );?>" target="<?php echo ( strlen( $contentarealink['target'] ) > 0 ? esc_attr( $contentarealink['target'] ) : '_self' )?>">
            <?php } ?>
            <?php echo $contentboxtitle;?>
            <?php if(esc_attr( $contentarealink['url'] )){?>
            </a>
            <?php } ?>
            </h2>
            <?php }?>
            <?php if($contentboxarea){?>
            <p><?php echo $contentboxarea; ?></p>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }else{ ?>
  <div class="zolo-icon-box_des equal_height">
    <div class="box_flip_pad"> 
      <!--box Icon-->
      <div id="rand_<?php echo $box_id;?>" class="zolo-icon-box <?php if($icon_background_shape_type == 'solid_background'){ echo $iconhoverstyle1; }else{echo $iconhoverstyle2;} ?>" style="font-size:<?php echo $icon_size;?>px;line-height:<?php echo $icon_size;?>px;width:<?php echo $shape_size;?>px;height:<?php echo $shape_size;?>px;"> <i class="zolo-icon <?php echo $icon; ?>"></i> </div>
      <!--box Content-->
      <div class="zolo-icon-content">
        <?php if($contentboxtitle){ 
				echo '<h2 style="'.$boxtitlepad.'">';
				  if(esc_attr( $contentarealink['url'] )){?>
        <a title="<?php echo esc_attr( $contentarealink['title'] );?>" href="<?php echo esc_attr( $contentarealink['url'] );?>" target="<?php echo ( strlen( $contentarealink['target'] ) > 0 ? esc_attr( $contentarealink['target'] ) : '_self' )?>">
        <?php } ?>
        <?php echo $contentboxtitle;?>
        <?php if(esc_attr( $contentarealink['url'] )){?>
        </a>
        <?php } ?>
        </h2>
        <?php }?>
        <?php if($contentboxarea){?>
        <p><?php echo $contentboxarea; ?></p>
        <?php }?>
      </div>
    </div>
  </div>
  <?php }?>
</div>
<?php }} ?>
<?php
	if($box_hover_style != 'box_hover_none'){
		$box_hover_bg_css = $box_hover_bg;
	}else{
		$box_hover_bg_css = '';
	} 
	
	if($box_hover_style == 'box_hover_none'){
		$box_border_css = $box_border;
	}else{
		$box_border_css = $box_hover_border;
	}	
	if($box_hover_style == 'box_hover_none'){
		$title_color_css = $title_desc_color;
	}else{
		$title_color_css = $text_hover_corder;
	}
	if($box_hover_style == 'box_hover_none'){
		$title_color_css1 = $title_desc_color;
	}else{
		$title_color_css1 = $text_hover_corder1;
	}
	
	if($box_hover_style == 'box_hover_none'){
		$iconcolor_css = $iconcolor;
	}else{
		$iconcolor_css = $box_icon_hover_color1;
	}
	if($box_hover_style1 == 'box_hover_none'){
		$variation_icon_bg_color_css = $variation_icon_bg_color;
	}else{
		$variation_icon_bg_color_css = $variation_icon_hover_bg_color1;
	}
	if($box_hover_style1 == 'box_hover_none'){
		$variation_icon_border_color_css = $variation_icon_border_color;
	}else{
		$variation_icon_border_color_css = $variation_icon_hover_border_color1;
	}
	
	
$custom_css = '';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes h2{ font-size:'.$contentboxtitle_size.'px;}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes h2,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes h2 a,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes{color:'.$title_desc_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box {color:'.$iconcolor.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box {color:'.$icon_hover_color.'!important;}';
/*circle*/

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle.swipe-right,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle.swipe-left,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle.swipe-up,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle.swipe-down,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle .zolo_icon_shape:before,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle .zolo_icon_shape:after,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle.border-outline-thick .zolo_icon_shape:after,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle.border-outline-thick .zolo_icon_shape:before,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.circle .zolo_icon_shape{-moz-border-radius:'.$shape_size.'px;
-ms-border-radius:'.$shape_size.'px;
-webkit-border-radius:'.$shape_size.'px;
-o-border-radius:'.$shape_size.'px;
border-radius:'.$shape_size.'px;
}';
/*border-solid*/

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.border-solid .zolo_icon_shape{ box-shadow: 0 0 0 '.$shape_size.'px '.$icon_hover_bg_color.' inset !important;}';
/*fill-up*/

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.fill-up .zolo_icon_shape:before{background:'.$icon_hover_bg_color.';
transform: translateY('.$shape_size.'px);
transform: translateY('.$shape_size.'px);
transform: translateY('.$shape_size.'px);
transform: translateY('.$shape_size.'px);
transform: translateY('.$shape_size.'px);
}';
/*border-outline-thick*/



$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.thin_bordered.border-outline-thick .zolo_icon_shape:after{box-shadow: inset 0 0 0 1px '.$shape_background_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.thin_bordered.border-outline-thick .zolo_icon_shape:after{box-shadow: inset 0 0 0 1px '.$icon_hover_bg_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.thin_bordered.border-outline-thick .zolo_icon_shape:before{box-shadow: inset 0 0 0 3px '.$icon_hover_bg_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.border-outline-thick .zolo_icon_shape:after{box-shadow: inset 0 0 0 3px '.$shape_background_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.border-outline-thick .zolo_icon_shape:after{box-shadow: inset 0 0 0 3px '.$icon_hover_bg_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.border-outline-thick .zolo_icon_shape:before{box-shadow: inset 0 0 0 4px '.$icon_hover_bg_color.';}';
/*solid-outline*/
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.solid-outline .zolo_icon_shape:before{ background:'.$shape_background_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.solid-outline .zolo_icon_shape:after{box-shadow: inset 0 0 0 3px '.$shape_background_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.solid-outline .zolo_icon_shape:before{ background:'.$icon_hover_bg_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.solid-outline .zolo_icon_shape:after{box-shadow: inset 0 0 0 3px '.$icon_hover_bg_color.';}';
/*faint-circle*/
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.faint-circle .zolo_icon_shape{background:'.$icon_hover_bg_color.'!important;}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box.faint-circle .zolo_icon_shape:before{border: 3px solid '.$icon_hover_bg_color.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.flip-horizontal .zolo_icon_shape,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes:hover .zolo-icon-box.flip-vertical .zolo_icon_shape{background:'.$icon_hover_bg_color.'!important;}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes .zolo-icon-box .icon_swipe_hover .zolo_icon_shape{background:'.$icon_hover_bg_color.'!important;}';

/*BOX DESIGN CSS START*/
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle{border:1px solid '.$box_border.'; background:'.$box_bg.';}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box-flip-vertical .box_front{border:1px solid '.$box_border.'; background:'.$box_bg.';}
';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box-flip-vertical .box_back{border:1px solid '.$box_border_css.'; background:'.$box_hover_bg_css.';}';

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle:hover{border:1px solid '.$box_border_css.'; background:'.$box_hover_bg_css.';}';


$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square.variation_modern:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded.variation_modern:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle.variation_modern:hover{border:1px solid '.$box_border_css.'; background:'.$box_hover_bg_css.';}';

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded:hover h2,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle:hover h2,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square:hover h2,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded:hover h2 a,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle:hover h2 a,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square:hover h2 a,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square:hover{color:'.$title_color_css.';}';

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded.variation_modern:hover h2 a,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded.variation_modern:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle.variation_modern:hover h2 a,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle.variation_modern:hover,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square.variation_modern:hover h2 a,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square.variation_modern:hover{color:'.$title_color_css1.';}';

if($box_variation == 'default'){
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded:hover .zolo-icon-box,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle:hover .zolo-icon-box,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square:hover .zolo-icon-box {color:'.$title_color_css.';}';
}
if($box_variation == 'variation_modern'){
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_rounded:hover .zolo-icon-box,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_circle:hover .zolo-icon-box,
.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.box_style_square:hover .zolo-icon-box {color:'.$iconcolor_css.';}';
}
$modern_margin = $shape_size / 2;
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.variation_modern{margin-top:'.$modern_margin.'px;}';

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.variation_modern .zolo-icon-box{margin-top: -'.$modern_margin.'px;font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;width:'.$shape_size.'px;height:'.$shape_size.'px;}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.variation_modern .zolo-icon-box.circle{-moz-border-radius:'.$modern_margin.'px;
-ms-border-radius:'.$modern_margin.'px;
-webkit-border-radius:'.$modern_margin.'px;
-o-border-radius:'.$modern_margin.'px;
border-radius:'.$modern_margin.'px;
}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.variation_modern.full_width{margin-top:0px;}';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.variation_modern .zolo-icon-box.full_width{ margin:0 -30px 20px -30px;width: auto; display:block;line-height:'.$icon_size.'px;height:'.$shape_size.'px;}
';
$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.variation_modern .zolo-icon-box{ background:'.$variation_icon_bg_color.'; border:1px solid '.$variation_icon_border_color.'}';

$custom_css .= '.zolo-icon-boxes-'.$zolo_iconbox_counter.'.zolo-icon-boxes.variation_modern:hover .zolo-icon-box{background:'.$variation_icon_bg_color_css.';border:1px solid '.$variation_icon_border_color_css.';}';

apcore_save_plugin_dyn_styles( $custom_css );
