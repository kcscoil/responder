<?php
	define('WP_USE_THEMES', false);
	$root = dirname(__FILE__) ;
	
	$root = str_replace('/wp-content/themes/longmessages', '', $root);
	require( $root . '/wp-blog-header.php');
	
query_posts(array('category_name'=>'home-top-section','posts_per_page'=>1));
while (have_posts()) : the_post(); 
?>
<div class="videopopup" id="videoPopup">
	<?php if (function_exists('get_field')) {
		$video_code = get_field('video_code');
	}
	echo $video_code; ?>
</div>
<?php endwhile; ?>