<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

 get_header(); ?>

 <div class="wrapper canpad">
 
	<?php get_sidebar('blog'); ?>
    <div class="canrgt">
				<?php 
						while (have_posts()) : the_post(); 
						$image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' )); 
				 ?>

 <div class="bbox">
      	<div class="dgray24">
            <h1 class=""><?php the_title(); ?></h1>
        </div>        <div class="padtop10">
        	<div class="fr padlft15">                    
                <div class="fr padtop4 padlft5"><img src="<?php echo get_template_directory_uri(); ?>/images/pencil.png" width="14" height="13" alt=""/></div>
                <div class="fr dgray16">מאת <?php the_author_posts_link(); ?></div>
                <div class="clear"></div>
            </div>
        	<div class="fr">                    
                <div class="fr padtop4 padlft5"><img src="<?php echo get_template_directory_uri(); ?>/images/calendar.png" width="14" height="14"  alt=""/></div>
              <div class="fr lgray16"><?php the_time('l, j לF, Y') ?></div>
                <div class="clear"></div>
            </div>
        	<div class="clear"></div>
        </div>
        <div class="bubble"><?php echo get_comments_number(); ?></div>
        <div class="clear"></div>
		<?php if($image) { ?>
        <div class="imaborder">
		<img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $image; ?>&height=131&width=535" alt="" class="wbdr8px" />
		</div>
		<?php } ?>
        <p><?php 
				the_content();

		?></p>
      </div>
	  <?php endwhile; 
	  comments_template();
      ?>
</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>