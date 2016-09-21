<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<div class="footer">
	<a <?/*href="#main"*/ ?> <?/*onclick="topscroll()"*/?> onclick="location.href='#main'; location.hash=''; window.location = window.location.hash.substring(1);" class="backtotop">חזרה<br /> לראש הדף</a>
	<div class="wrapper">
    	<div class="footlft">
        	<div class="fmenu">
            	<div class="white36">רב מסר</div>
                <!--<div class="white24">מובילים בחדשנות, מצוינים בשירות</div>-->
                				
				<?php

					$defaults = array(
						'menu'            => 'Footer Menu',
						'menu_class'      => 'fmenulist',
						);

					wp_nav_menu( $defaults );

					?>
            </div>
            <div class="copybox"><?php dynamic_sidebar('Copyright'); ?></div>
        </div>
        <div class="cusbox">
        	<?php dynamic_sidebar('Contact Us'); ?>
			
			<div class="footer-icons">
				<a href="<?php echo home_url(); ?>/יכולות-רב-מסר/"><img src="<?php echo get_template_directory_uri(); ?>/images/system.png" /> </a><img src="<?php echo get_template_directory_uri(); ?>/images/line.png" />
				<a href="<?php echo home_url(); ?>/רב-מסר-רב-דף-מדריכים/"><img src="<?php echo get_template_directory_uri(); ?>/images/guides.png" /> </a><img src="<?php echo get_template_directory_uri(); ?>/images/line.png" />
				<a href="<?php echo home_url(); ?>/צור-קשר/"><img src="<?php echo get_template_directory_uri(); ?>/images/help.png" /> </a>
			</div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<?php dynamic_sidebar('google_analytics'); ?>
<?php dynamic_sidebar('google_remarketing'); ?>
<?php dynamic_sidebar('addroll'); ?>
<script>(function(){
  window._fbds = window._fbds || {};
  _fbds.pixelId = 584143845012337;
  var fbds = document.createElement('script');
  fbds.async = true;
  fbds.src = '//connect.facebook.net/en_US/fbds.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(fbds, s);
})();
window._fbq = window._fbq || [];
window._fbq.push(["track", "PixelInitialized", {}]);
</script>
<noscript><img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=584143845012337&amp;ev=NoScript" /></noscript>

<!-- קוד Google לתג שיווק מחדש -->
<!--------------------------------------------------
אין לשייך תגי שיווק מחדש עם מידע המאפשר זיהוי אישי ואין להציב אותם בדפים הקשורים לקטגוריות רגישות. ראה מידע נוסף והוראות על התקנת התג ב: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 997258398;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/997258398/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


	<?php wp_footer(); ?>
<style type="text/css" media="screen">
a.linksalpha_button{
	display: none !important;
}
</style>
</body>
</html>