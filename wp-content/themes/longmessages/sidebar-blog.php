<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
?>
<div class="canlft">
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
<?php //dynamic_sidebar('Blog Page Sidebar Text'); ?>
     <div class="oalbox">
       <?php dynamic_sidebar('Contact Form'); ?>
        </div> 
       <div class="article_box">
	    <?php 
			$articles=get_field('article');
			if($articles){
			?>
        	<div class="dgray24"><strong>מאמרים</strong></div>
			 <ul class="articlelist">
			
			<?php 
			foreach($articles as $article){
			
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $article->ID ), 'single-post-thumbnail' );
			
			
		?>
            	<li>
				<?php if($image){ ?>
                	<!--<div class="fr padlft5 padtop4"><img class="wbdr3px" src="<?php echo $image; ?>" width="47" height="48"  alt=""/></div>-->
					<?php } ?>
                    <div class="fr">
                    	<a href="/?p=<?php echo $article->ID ?>"><?php echo $article->post_title ?></a>
                    </div>
                    <div class="clear"></div>
                </li>
                    <?php 
 	} ?>
<?php wp_reset_query(); ?>
			</ul>
			<?php } ?>
        </div>
        <div>

			<?php dynamic_sidebar('Facebook'); ?>
		</div>
    </div>