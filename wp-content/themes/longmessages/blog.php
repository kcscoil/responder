<?php
/**
 * Template Name: Blog Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 get_header(); ?>
  <div class="rsaidbox">
	<div class="wrapper">
    	<ul class="tablist">
			<?php
				$current_cat_id = get_query_var('cat');
				$blog_cat = get_category_by_slug( 'blog' );
				$blog_cat_id = $blog_cat->cat_ID;
				$blog_cats = get_categories("child_of=$blog_cat_id&hide_empty=0&order=ASC");
					foreach ($blog_cats as $blog_cat) {
						?>
							<li <?php if($blog_cat->cat_ID == $current_cat_id){ echo 'class="activetab_item"'; }; ?>>
								<a href="<?php echo get_category_link( $blog_cat->cat_ID ); ?>" <?php if($blog_cat->cat_ID == $current_cat_id){ echo 'class="activetab"'; }; ?>>
									<?php echo $blog_cat->name; ?>
								</a>
							</li>
						<?					
					}
			?>	
        </ul>
        <div class="clear"></div>
    </div>
</div>
 <div class="wrapper canpad">
	<?php get_sidebar('blog'); ?>
    <div class="canrgt">
		<?php query_posts(array('category_name'=>'blog','posts_per_page'=>-1, 'orderby' => 'date', 'order' => 'DESC'));
				while (have_posts()) : the_post(); 
				$image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' )); 
		?>
		<div class="bbox">
			<div class="dgray24"><strong><?php the_title(); ?></strong></div>
			<div class="padtop10">
				<div class="fr padlft15">
					<div class="fr padtop4 padlft5"><img src="<?php echo get_template_directory_uri(); ?>/images/pencil.png" width="14" height="13" alt=""/></div>
					<div class="fr dgray16">מאת <?php echo get_the_author(); ?></div>
					<div class="clear"></div>
				</div>
				<div class="fr">
					<div class="fr padtop4 padlft5"><img src="<?php echo get_template_directory_uri(); ?>/images/calendar.png" width="14" height="14"  alt=""/></div>
				  <div class="fr lgray16"><?php the_time('l, j בF, Y') ?></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="bubble"><?php echo get_comments_number(); ?></div>
			<div class="clear"></div>
			<?php if($image) { ?>
			<div class="padtop15">
			<img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $image; ?>&height=131&width=535" alt="" class="wbdr8px" />
			</div>
			<?php } ?>
			<p><?php
					$content	=	get_the_content();
					$content	=	truncat($content,400);
					echo $content;

			?><br><a class="bluelink16" href="<?php the_permalink(); ?>">קרא עוד ></a></p>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>