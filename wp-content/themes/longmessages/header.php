<?php
    
	 if ( is_404() ) {
      wp_redirect( '/404.html' );
      exit;
   }
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<style>
iframe{ 
max-width:none!important;
}
</style>

<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<!--[if IE 9]>
<style type="text/css">
.boxfreetrial{ 
	right:40% !important;
}
</style>
<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="/wp-content/themes/longmessages/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="/wp-content/themes/longmessages/favicon.ico">
	<!--[if lt IE 9]>
	<script src="/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/wp-content/themes/longmessages/responsive/responsive.css" rel="stylesheet" type="text/css" />
    
    
    
	<script src="/wp-content/themes/longmessages/js/jquery-1.10.2.min.js"></script>
<script>
function topscroll() {
	$('body,html').animate({
				scrollTop: 0
			}, 800);
	}
$(document).ready(function(){
$('body')
	  .delay(10)
	  .queue( 
	  	function(next){ 
	    	$(this).css('padding-right', '1px'); 
	  	}
	  );
});
</script>
<script src="/js/custom.js"></script>


<!--Facebook-->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', "584143845012337"]);
})();
window._fbq = window._fbq || [];
window._fbq.push(["track", "PixelInitialized", {}]);
</script>
<noscript><img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=584143845012337&ev=NoScript" /></noscript>
<!--Facebook End-->


</head>

<body>
<?php
$chrome = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? true : false;
$safari = strpos($_SERVER["HTTP_USER_AGENT"], 'Safari') ? true : false;
if($safari && !$chrome) {
 ?>

<?php } 
if($chrome)
{ ?>
<style>
	.blue35 {
	font-size:30px !important;
}
.dgray24 p {
	margin-top:7px !important;
}
/*.dgray24 {
	font-size:20px;
}*/
.padtop18 {
	padding-top:8px;
}
input.openaccsmall {
	font-size:17px !important;
	padding:13px 0px 11px 0px !important;
}
.textwidget {
	margin-bottom:12px;
}
</style>
	<?php } else { ?>
<style>
	.dgray24 p {
	margin-top:0px !important;
}
    
div.canrgt p { 
            font-size: 17px !important;
           }
</style>

<?php } if(is_home()) {?>
<style>
/*.freetry a{
    -moz-border-bottom-colors: none!important;
    -moz-border-left-colors: none!important;
    -moz-border-right-colors: none!important;
    -moz-border-top-colors: none!important;
    background: linear-gradient(to bottom, #76CB6C 5%, #59AE4F 100%) repeat scroll 0 0 #76CB6C!important;
    border-color: #77AA71 #77AA71 #5A9952!important;
    border-image: none!important;
    border-radius: 3px 3px 3px 3px!important;
    border-style: solid!important
    border-width: 1px!important;
    box-shadow: 0 2px 1px 0 #86D47C inset!important;
    color: #FFFFFF!important;
	border: none!important;
  }*/
</style>
<?php } ?>
<div id="main">
<?php wp_nav_menu(array('container_class' => 'mobile-menu')); ?>
<div class="header">
  <div class="wrapper_fixed">
  <div class="wrapper">
  <a class="toggle-mobile-menu"><img src="/images/responsive-icon.png" /></a>
  <div class="logo"><a href="/"><img src="/images/logo.png" alt=""/></a></div>
        <div class="fl">
        	<div class="headlink">
			               	<?php $items = wp_get_nav_menu_items("header_menu");
									$count = count($items);
									$i=0;
									foreach($items as $manu_items){ ?>
							<a href="<?php echo $manu_items->url; ?>"><?php echo $manu_items->title; ?></a> 
									<?php $i++; 
								if($i!=$count){	
									echo "|";
									}
								} ?>
			</div>
          <?php dynamic_sidebar('Phone Number');  ?>
        </div>
        
				
<?php

$defaults = array(
	'theme_location'  => '',
	'menu'            => '',
	'container'       => 'ul',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'nav',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );

?>
        <div class="clear"></div>
    </div>
  </div>
  <div class="logoarrow"></div>
</div>
<?php if(!is_home()){?> 
<div class="sliderbox">
	<div class="insliderbg">
    	<?php 
		$id = get_category_by_slug('blog');
		$parent_id = $id->cat_ID; 
		$rows = get_categories("include=$parent_id");
		$cat_name = $rows[0]->name;
		$page_title	= get_the_title();
		$cat_title = get_queried_object()->name;
		$cat_link = get_category_link( get_queried_object()->term_id );
		$heb_name_of_day = array(0 => "ראשון", 1 => "שני", 2 => "שלישי", 3 => "רביעי", 4 => "חמישי", 5 => "שישי", 6 => "שבת");
		$blog_link = get_category_link( $rows[0]->term_id );
		if($page_title) {
		?>
		<h1 class="pagehead">
			<?php if(in_category('blog') && !is_author() && !is_single()) {
				//echo '<style>
				//.pagehead {
				//	/* 
				//	padding:0 !important;
				//	padding-top:10px !important;
				//	*/
				//}
				//</style>';
				echo '<a href="' . $blog_link . '">' . $rows[0]->name . '</a>';
				if ($cat_title != "בלוג") echo '// <a href="' . $cat_link . '">' . $cat_title . '</a>';
				echo ' // <span class="dgray24">יום '.$heb_name_of_day[date("w")].' '.date("d.m.Y").'</span>';
			}
			else if(is_author()) {
				//echo '<style>
				//.pagehead { 
				//	/*
				//	padding:0 !important;
				//	padding-top:10px !important;
				//	*/
				//}
				//</style>';
				echo '<a href="' . $blog_link . '">' . $rows[0]->name . '</a>';
				if ($cat_title != "בלוג") echo '// '.get_the_author();
				echo ' // <span class="dgray24">יום '.$heb_name_of_day[date("w")].' '.date("d.m.Y").'</span>';
			}else if ( is_singular( 'guide' ) ) {
				$guides_pages = get_pages(array(
					'meta_key' => '_wp_page_template',
					'meta_value' => 'guides.php'
				));
				echo get_the_title( $guides_pages[0] );
			}else if(is_single()) {
				//echo '<style>
				//.pagehead { 
				//	/*
				//	padding:0 !important;
				//	padding-top:10px !important;
				//	*/
				//}
				//</style>';
				$cat_obj = get_the_category( $post->ID );
				$in_cat_name = $cat_obj[0]->name;
				
				echo '<a href="' . $blog_link . '">' . $rows[0]->name . '</a>';
				if ($in_cat_name != "בלוג"){ 
					$category_link = get_category_link( $cat_obj[0]->term_id );
					echo '// <a href="' . $category_link . '">' . $cat_obj[0]->name . '</a>';
				} else { 
					$category_link = get_category_link( $cat_obj[1]->term_id );
					echo '// <a href="' . $category_link . '">' . $cat_obj[1]->name . '</a>'; 
				}
				echo ' // <span class="dgray24">יום '.$heb_name_of_day[date("w")].' '.date("d.m.Y").'</span>';
			}
			else
			{
				the_title();
			} ?>
		</h1>
		<?php } ?>
    </div>
</div>
<?php } ?>

<script>
/* -----------mobile menu ------------*/

jQuery(function($) {
	$('.toggle-mobile-menu').click(function() {
		$('.mobile-menu').slideToggle();
	});
});
/* -----------function for featured video lightbox ------------*/
	 $(document).ready(function() {	
	$('.lightboxfreetrial').click(function(){
					$('.backdropfreetrial, .boxfreetrial').animate({'opacity':'.50'}, 300, 'linear');
					$('.boxfreetrial').animate({'opacity':'1.00'}, 300, 'linear');
					$('.backdropfreetrial, .boxfreetrial').css('display', 'block');
				});
 				$('.closefreetrial').click(function(){
					close_boxfreetrial();
				});
 				$('.backdropfreetrial').click(function(){
					close_boxfreetrial();
				});
				function close_boxfreetrial()
			{
				$('.backdropfreetrial, .boxfreetrial').animate({'opacity':'0'}, 300, 'linear', function(){
					$('.backdropfreetrial, .boxfreetrial').css('display', 'none');
				});

			}
			
			$('body').bind('touchmove', function(event) { event.preventDefault() }); // turns off

			$('body').unbind('touchmove'); // turns on
						
			});
			</script>
	<div class="backdropfreetrial"></div>
	<div class="boxfreetrial oalbox"><div class="closefreetrial close black">x</div>

 <div class="textwidget"><div class="blue35">נסו את המערכת כעת!</div>
<!-- Generated by responder.co.il -->
<script type="text/javascript">
<!--
function responder_validation(form) {
	var inputs = form.getElementsByTagName('input');
	var selects = form.getElementsByTagName('select');
	var filter_email = /^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i;
	var filter_phone = /^(?:|(?:050|052|053|054|055|057|058|02|03|04|08|09)\d{7,7})$/;

	for (a=0; a<inputs.length; a++) {
		switch (inputs[a].name) {
			case 'fields[subscribers_email]':
				if (!filter_email.test(inputs[a].value)) {
					alert('כתובת הדוא"ל אינה חוקית');
					inputs[a].focus();
					return false;
				}

				break;
			case 'fields[subscribers_phone]':
				var phone = inputs[a].value.replace(/-|\s/g, '');
				if (!filter_phone.test(phone.length==0 || phone.charAt(0)=='0' ? phone : '0' + phone)) {
					alert('מספר הטלפון הנייד אינו חוקי');
					inputs[a].focus();
					return false;
				}

				break;
		}
	}

	for (a=0; a<selects.length; a++) {
		switch (selects[a].name) {
		}
	}

	if (document.charset)
		form.encoding.value = document.charset;
	else if (document.defaultCharset)
		form.encoding.value = document.defaultCharset;
	else if (document.characterSet)
		form.encoding.value = document.characterSet;

	return true;
}
//-->
</script>
<form method="post" action="https://cp.responder.co.il/subscribe.php" onsubmit="return responder_validation(this);">
<table border="0" dir="rtl" class="trial_form form_col">
	<tbody>
		<tr>
			<td><input type="text" name="fields[subscribers_name]" class="oalin placeholder" size="14" dir="rtl" placeholder="שם פרטי"></td>
		</tr>
		<tr>
			<td><input type="text" name="fields[שם משפחה]" class="oalin placeholder" size="14" dir="rtl" placeholder="שם משפחה"></td>
		</tr>
		<tr>
			<td><input type="email" name="fields[subscribers_email]" class="oalin placeholder" size="14" dir="rtl" placeholder="דואר אלקטרוני *" oninvalid="setCustomValidity('.נא להזין כתובת דוא״ל תקינה')"></td>
		</tr>
		<tr>
			<td><input type="hidden" name="fields[מקור]" size="14" dir="rtl" placeholder="" class="placeholder" value=""></td>
		</tr>
		<tr>
			<td><input type="hidden" name="fields[טופס]" size="14" dir="rtl" value="Other" placeholder=""></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="form_id" value="5403">
				<input type="hidden" name="encoding" value="">
				<input type="submit" class="oalbtn" value="פתח חשבון התנסות">
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>                
                
<!--		<?php dynamic_sidebar('Free Trial'); ?>
-->	</div>