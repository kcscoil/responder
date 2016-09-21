<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="sliderbox">
	<div class="insliderbg">
    	<div class="slidermain">
		<?php query_posts(array('category_name'=>'home-top-section','posts_per_page'=>1));
				while (have_posts()) : the_post(); 
				 $image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' )); 
				 if($image){
				 ?>
        	<div class="fl">
			<a href="#" class="lightbox" >
			<img src="http://www.responder.co.il/wp-content/themes/longmessages/images/new_screen.png" alt="" /></a>
			</div>
			<?php } ?>
	<div class="backdrop"></div>
	<div class="box"><div class="close">x</div>
	<div id="home_video_box"><?php //get_template_part('module', 'home-video'); ?></div>
	<div class="popupform" style="" >
	<h2 style="color:green;margin-top:0px;">ברוכים הבאים לרב מסר!</h2>
	<div class="dgray20">פתחו חשבון התנסות חינם לשבועיים בנו מסרים, פרסמו דפים בתוך דקות!</div>
	<div class="clear"></div>
	<?php 
	if (function_exists('get_field')) {
						
						$home_page_form = get_field('home_page_form');

					}
					//echo $home_page_form;
	echo do_shortcode($home_page_form); ?>
	</div>
		</div>
            <div class="sldrtxtbox">
            	<h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
            <div class="clear"></div>
			<?php endwhile; ?>
        </div>
    </div>
</div>
<div class="rsaidbox">
	<div class="rsaidboxmid">
    	<?php dynamic_sidebar('Welcome to Rabbi said'); ?>
    </div>
</div>
<div class="tabox1">
	<div class="wrapper">
	<?php query_posts(array('category_name'=>'target-audience','posts_per_page'=>1));
				while (have_posts()) : the_post(); 
				 $image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' )); 
				 $sub_image1	=	get_field('sub_information_first__image');
				 $sub_title1	=	get_field('sub_information_first_title');
				 $sub_text1		=	get_field('sub_information_first_text');
				 $sub_image2	=	get_field('sub_information_second_image');
				 $sub_title2	=	get_field('sub_information_second_title');
				 $sub_text2		=	get_field('sub_information_second_text');
				 $sub_image3	=	get_field('sub_information_third_image');
				 $sub_title3	=	get_field('sub_information_third_title');
				 $sub_text3		=	get_field('sub_information_third_text');
				 $testimonial	=	get_field_object('testimonial');
				 
				 ?>
	
    	<div class="ssmbox4head"><div class="fr numbg">1</div>
	<div class="fr blue48 padtop9"><?php the_title(); ?></div>
	<div class="clear"></div></div>
    	<div class="mtop40">
        	<div class="fr box375 dgray24"><?php the_content(); ?> </div>
			 <?php if($image){ ?>
            <div class="fl">
			<img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $image; ?>&height=283&width=571" alt="" class="wbdr8px" />
			</div>
			<?php } ?>
            <div class="clear"></div>
        </div>
		<?php if($sub_title1 || $sub_title2 || $sub_title3 || $sub_text1 || $sub_text2 || $sub_text3 || $sub_image1 || $sub_image2 || $sub_image3) {?>
        <div class="mtop50">
        	<div class="box274 fl">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image1; ?>&width=230" alt="" /></div>
            	<h5><?php echo $sub_title1; ?></h5>
            	<p><?php  echo $sub_text1; ?></p>
            </div>
       	    <div class="box274 fr">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image2; ?>&width=230" alt="" /></div>
            	<h5><?php echo $sub_title2; ?></h5>
            	<p><?php  echo $sub_text2; ?></p>
            </div>
       	    <div class="box274 boxcenter">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image3; ?>&width=230" alt="" /></div>
            	<h5><?php echo $sub_title3; ?></h5>
            	<p><?php  echo $sub_text3; ?></p>
            </div>
            <div class="clear"></div>
        </div>
		<?php } ?>
        <div class="mtop40"><?php if( $testimonial['value']){ ?>
        	<div class="fr"><img src="<?php echo get_template_directory_uri(); ?>/images/tsti_rgt.png" width="189" height="189"  alt=""/></div>
			
          <div class="tstibox"><span><?php echo $testimonial['value']; ?></span></div>
		  <?php } ?>
            <div class="clear"></div>
        </div>
		<?php endwhile; ?>
		 <?php wp_reset_query(); ?> 
    </div>	
</div>
<div class="openaccbox">
	<div class="wrapper">
    	
		<?php dynamic_sidebar('Home Contact Form'); ?>
       
    </div>
</div>
<div class="genbox2">
	<div class="wrapper">
	<?php query_posts(array('category_name'=>'	home-best-landing-pages','posts_per_page'=>1));
				while (have_posts()) : the_post(); 
				 $image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' )); 
				 $sub_image1	=	get_field('sub_information_first__image');
				 $sub_title1	=	get_field('sub_information_first_title');
				 $sub_text1		=	get_field('sub_information_first_text');
				 $sub_image2	=	get_field('sub_information_second_image');
				 $sub_title2	=	get_field('sub_information_second_title');
				 $sub_text2		=	get_field('sub_information_second_text');
				 $sub_image3	=	get_field('sub_information_third_image');
				 $sub_title3	=	get_field('sub_information_third_title');
				 $sub_text3		=	get_field('sub_information_third_text');
				 $testimonial	=	get_field('testimonial');
				
				 ?>
	
    	<div class="ssmbox4head"><div class="fr numbg">2</div>
	<div class="fr blue48 padtop9"><?php the_title(); ?></div>
	<div class="clear"></div></div>
    	<div class="mtop40">
        	<div class="fl box375 dgray24"><?php the_content(); ?> 
            </div>
            <div class="fr"><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $image; ?>&width=571" alt="" class="wbdr8px" /></div>
            <div class="clear"></div>
        </div>
		<?php if($sub_title1 || $sub_title2 || $sub_title3 || $sub_text1 || $sub_text2 || $sub_text3 || $sub_image1 || $sub_image2 || $sub_image3) {?>
        <div class="mtop50">
        	<div class="box274 fl">
            	<div>
					<img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image1; ?>&width=228" alt="" />
				</div>
            	<h5><?php echo $sub_title1; ?></h5>
            	<p><?php  echo $sub_text1; ?></p>
            </div>
       	  <div class="box274 fr">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image2; ?>&width=228" alt="" /></div>
            	<h5><?php echo $sub_title2; ?></h5>
            	<p><?php  echo $sub_text2; ?></p>
          </div>
       	  <div class="box274 boxcenter">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image3; ?>&width=228" alt="" /></div>
            	<h5><?php echo $sub_title3; ?></h5>
            	<p><?php  echo $sub_text3; ?></p>
          </div>
            <div class="clear"></div>
        </div>
		<?php } ?>
		<?php if($testimonial) { ?>
        <div class="mtop40">
		<?php if($testimonial){ ?>
        	<div class="fr"><img src="<?php echo get_template_directory_uri(); ?>/images/tsti_keren.png" width="189" height="189"  alt=""/></div>
          <div class="tstibox"><span><?php echo $testimonial; ?></span></div>
		  <?php } ?>
            <div class="clear"></div>
        </div>
		<?php } ?>
		<?php endwhile; ?>
    </div>	
</div>
<div class="smsbox3">
	<div class="wrapper">
	<?php query_posts(array('category_name'=>'home-scientific-marketing','posts_per_page'=>1));
				while (have_posts()) : the_post(); 
				 $image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' )); 
				 $sub_image1	=	get_field('sub_information_first__image');
				 $sub_title1	=	get_field('sub_information_first_title');
				 $sub_text1		=	get_field('sub_information_first_text');
				 $sub_image2	=	get_field('sub_information_second_image');
				 $sub_title2	=	get_field('sub_information_second_title');
				 $sub_text2		=	get_field('sub_information_second_text');
				 $sub_image3	=	get_field('sub_information_third_image');
				 $sub_title3	=	get_field('sub_information_third_title');
				 $sub_text3		=	get_field('sub_information_third_text');
				 $testimonial	=	get_field('testimonial');
				
				 ?>
    	<div class="ssmbox4head"><div class="fr numbg">3</div>
	<div class="fr blue48 padtop9"><?php the_title(); ?></div>
	<div class="clear"></div></div>
    	<div class="mtop40">
        	<div class="fr box375">
            	<?php the_content(); ?>      
            </div>
            <div class="fl"><img class="wbdr8px" src="<?php echo get_template_directory_uri(); ?>/images/bx3img.jpg" width="571" height="327"  alt=""/></div>
            <div class="clear"></div>
        </div>
		<?php if($sub_title1 || $sub_title2 || $sub_title3 || $sub_text1 || $sub_text2 || $sub_text3 || $sub_image1 || $sub_image2 || $sub_image3) {?>
		<div class="mtop50">
        	<div class="box274 fl">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image1; ?>&width=278" alt="" /></div>
            	<h5><?php echo $sub_title1; ?></h5>
            	<p><?php  echo $sub_text1; ?></p>
            </div>
       	  <div class="box274 fr">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image2; ?>&width=278" alt="" /></div>
            	<h5><?php echo $sub_title3; ?></h5>
            	<p><?php  echo $sub_text3; ?></p>
          </div>
       	  <div class="box274 boxcenter">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image3; ?>&width=278" alt="" /></div>
            	<h5><?php echo $sub_title2; ?></h5>
            	<p><?php  echo $sub_text2; ?></p>
          </div>
            <div class="clear"></div>
        </div>
		<?php } ?>
		<?php if($testimonial) { ?>
        <div class="mtop40"><?php if($testimonial){ ?>
        	<div class="fr"><img src="<?php echo get_template_directory_uri(); ?>/images/tsti_ester.png" width="189" height="189"  alt=""/></div>
          <div class="tstibox"><span><?php echo $testimonial; ?></span></div>
		  <?php } ?>
            <div class="clear"></div>
        </div>
		<?php } ?>
		<?php endwhile; ?>
    </div>	
</div>
<div class="ssmbox4">
	<div class="wrapper">
	<?php query_posts(array('category_name'=>'home-long-service','posts_per_page'=>1));
				while (have_posts()) : the_post(); 
				 $image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' )); 
				 $sub_image1	=	get_field('sub_information_first__image');
				 $sub_title1	=	get_field('sub_information_first_title');
				 $sub_text1		=	get_field('sub_information_first_text');
				 $sub_image2	=	get_field('sub_information_second_image');
				 $sub_title2	=	get_field('sub_information_second_title');
				 $sub_text2		=	get_field('sub_information_second_text');
				 $sub_image3	=	get_field('sub_information_third_image');
				 $sub_title3	=	get_field('sub_information_third_title');
				 $sub_text3		=	get_field('sub_information_third_text');
				 $testimonial	=	get_field('testimonial');
				
				 ?>
    	<div class="ssmbox4head"><div class="fr numbg">4</div>
	<div class="fr blue48 padtop9"><?php the_title(); ?></div>
	<div class="clear"></div></div>
    	<div class="mtop40">
        	<div class="fl box375 dgray24"><?php the_content(); ?>
            </div>
            <div class="fr"><img class="wbdr8px" src="<?php echo get_template_directory_uri(); ?>/images/bx4img.jpg" width="571" height="283"  alt=""/></div>
            <div class="clear"></div>
        </div>
		<?php if($sub_title1 || $sub_title2 || $sub_title3 || $sub_text1 || $sub_text2 || $sub_text3 || $sub_image1 || $sub_image2 || $sub_image3) {?>
		<div class="mtop50">
        	<div class="box274 fl">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image1; ?>&width=278" alt="" /></div>
            	<h5><?php echo $sub_title1; ?></h5>
            	<p><?php  echo $sub_text1; ?></p>
            </div>
       	  <div class="box274 fr">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image2; ?>&width=278" alt="" /></div>
            	<h5><?php echo $sub_title3; ?></h5>
            	<p><?php  echo $sub_text3; ?></p>
          </div>
       	  <div class="box274 boxcenter">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image3; ?>&width=278" alt="" /></div>
            	<h5><?php echo $sub_title2; ?></h5>
            	<p><?php  echo $sub_text2; ?></p>
          </div>
            <div class="clear"></div>
        </div>
		<?php } ?>
		<?php if($testimonial) { ?>
        <div class="mtop40">
        	<div class="fr"><img src="<?php echo get_template_directory_uri(); ?>/images/tsti_nir.png" width="189" height="189"  alt=""/></div>
          <div class="tstibox"><span><?php echo $testimonial; ?></span></div>
            <div class="clear"></div>
        </div>
		<?php } ?>
		<?php endwhile; ?>
    </div>	
</div>
<div class="learnbox">
	<div class="wrapper">
	<?php query_posts(array('category_name'=>'learn-more','posts_per_page'=>1));
				while (have_posts()) : the_post(); 
				
				 $sub_image1	=	get_field('learn_more_image_first');
				 $sub_title1	=	get_field('learn_more_title_first');
				 $sub_text1		=	get_field('learn_more_test_first');
				 $sub_image2	=	get_field('learn_more_image_second');
				 $sub_title2	=	get_field('learn_more_title_second');
				 $sub_text2		=	get_field('learn_more_text_second');
				 $sub_image3	=	get_field('learn_more_image_third');
				 $sub_title3	=	get_field('learn_more_title_third');
				 $sub_text3		=	get_field('learn_more_text_third');
				
				
				 ?>
	
	  	<div class="acenter blue48"><?php the_title(); ?></div>
        <div class="mtop50">
       	  <div class="box274 fl">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image3; ?>&width=228" alt="" /></div>
            		<h5><?php echo $sub_title3; ?></h5>
            	<p><?php  echo $sub_text3; ?></p>
          </div>
        	<div class="box274 fr">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image1; ?>&width=228" alt="" /></div>
            	
            		<h5><?php echo $sub_title1; ?></h5>
            	<p><?php  echo $sub_text1; ?></p>
            </div>
       	  <div class="box274 boxcenter">
            	<div><img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $sub_image2; ?>&width=228" alt="" /></div>
            		<h5><?php echo $sub_title2; ?></h5>
            	<p><?php  echo $sub_text2; ?></p>
          </div>
            <div class="clear"></div>
        </div>
	<?php endwhile; ?> 
      <div class="fbbox mtop50">
        	<div class="fbboxhead">
            	<div class="fr padlft5"><img src="<?php echo get_template_directory_uri(); ?>/images/fbarrow.png" width="24" height="23"  alt=""/></div>
            	<div class="fr">הצטרפו אלינו לפייסבוק</div>
            	<div class="clear"></div>
            </div>
       	
			<?php 
			
			
			
			dynamic_sidebar('Facebook Home'); ?>
        </div>
    </div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>