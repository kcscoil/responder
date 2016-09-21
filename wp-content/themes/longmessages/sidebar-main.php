<?php
/**
 * The sidebar containing the footer widget area.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<div class="blog_side_desc">
<?php 
	if(is_single()){
		$cat = get_the_category( $post->ID );
		$category = $cat[0];
	}
	else{
		$category = get_queried_object('cat'); 
	}
	if(category_description( $category->cat_ID )){
	?>
		<div class="blue35"><?php echo $category->name; ?></div>
	<?php 
		echo category_description( $category->cat_ID ); 
	}
?>
</div>
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->
	</div><!-- #secondary -->
<?php endif; ?>