<?php
/**
 * Template Name: Guides Template
 */
 get_header(); ?>

<div class="guidesbox">
	<div class="wrapper">
	<?php
		$args = array(
			'hide_empty' => 0,
			'taxonomy' => 'guides-cat',
		);
		$categories = get_categories( $args );
		foreach ( $categories as $cat ) {
		$cat_layout = get_field('cat_layout', 'guides-cat_' . $cat->term_id);
		
		$args = array(
			'post_type' => 'guide',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'guides-cat', 
					'field'    => 'term_id',
					'terms'    => $cat->term_id
				),
			),
		);
	?>
		<section class="guides_cat <?php echo $cat_layout; ?>">
			<?php if($cat_layout=='layout_1'){ ?>
				<div class="blue41 padtop9 guides_cat_title"><?php echo $cat->name; ?></div>
				<div class="guides_cat_desc"><?php echo $cat->description; ?></div>
				<div class="clear"></div>
				<div class="mtop40">
				<?php
					query_posts( $args );
					$i = 1;
					if(have_posts()) : while(have_posts()) : the_post();
					$guide_order = $post->menu_order + 1;
					switch($i){
						case 1:
							$box_class = 'fr';
							break;
						case 2:
							$box_class = 'boxcenter';
							break;
						case 3:
							$box_class = 'fl';
							$i = 0;
							break;
					}
				?>
					<div class="guide box274 <?php echo $box_class; ?>">
						<a href="<?php the_permalink(); ?>">
							<div class="guide_img">
								<?php 
									if ( has_post_thumbnail() ) {
									  the_post_thumbnail('guide-thumb-1');
									} 
								?>
								<div class="guide_overlay"></div>
								<div class="guide_order"><?php echo $guide_order; ?></div>
							</div>
							<h5 class="guide_title"><?php the_title(); ?></h5>
						</a>
					</div>
					<?php if($i==0){ echo '<div class="clear"></div>'; } ?>
					<?php $i++; endwhile; endif; wp_reset_query(); ?>
					<div class="clear"></div>
				</div>
			<?php }else if($cat_layout=='layout_2'){ ?>
				<div class="blue36 padtop9 guides_cat_title"><?php echo $cat->name; ?></div>
				<div class="guides_cat_desc"><?php echo $cat->description; ?></div>
				<div class="clear"></div>
				<div class="mtop40">
				<?php
					query_posts( $args );
					$guide_order = $post->menu_order + 1;
					$i = 1;
					if(have_posts()) : while(have_posts()) : the_post();
					switch($i){
						case 1:
							$box_class = 'fr';
							break;
						case 2:
							$box_class = 'boxcenter';
							break;
						case 3:
							$box_class = 'fl';
							$i = 0;
							break;
					}
					$guide_subtitle = get_field('guide_subtitle');
				?>
					<div class="guide box274 <?php echo $box_class; ?>">
						<a href="<?php the_permalink(); ?>">
							<h5 class="guide_title"><strong><?php the_title(); ?></strong>: <?php echo $guide_subtitle; ?></h5>
							<div class="guide_img">
								<?php 
									if ( has_post_thumbnail() ) {
									  the_post_thumbnail('guide-thumb-2');
									} 
								?>
								<div class="guide_overlay"></div>
							</div>
						</a>
					</div>
					<?php if($i==0){ echo '<div class="clear"></div>'; } ?>
					<?php $i++; endwhile; endif; wp_reset_query(); ?>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</section>
	<?php
		}
	?>
	</div>
</div>
<?php get_footer(); ?>