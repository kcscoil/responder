<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div class="sliderbox">
	<div class="insliderbg">
    	<div class="pagehead"><?php _e( 'Not found', 'twentythirteen' ); ?></div>
    </div>
</div>
<div class="wrapper canpad">
	<?php get_sidebar(); ?>
    <div class="canrgt">
		<div class="page-wrapper">
			<div class="page-content">
				<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen' ); ?></h2>
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>
				<?php //get_search_form(); ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>