<?php 
	get_header(); 
	global $post;
?>

<div class="single_guide">
	<div class="wrapper">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php 
				$guide_video = get_field('guide_video'); 
				$guide_order = $post->menu_order + 1; 
				$guides_pages = get_pages(array(
					'meta_key' => '_wp_page_template',
					'meta_value' => 'guides.php'
				));
				$guides_page_link = get_permalink( $guides_pages[0] );
				$next_guide = get_next_post( true );
				$prev_guide = get_previous_post( true );
				
				$terms = wp_get_post_terms( $post->ID, 'guides-cat' );
				$guide_cat = $terms[0]->term_id;
				
				$args = array(
					'post_type' => 'guide',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'guides-cat', 
							'field'    => 'term_id',
							'terms'    => $guide_cat
						),
					)
				);
				$all_guides = get_posts( $args );
				$guide_count = array();
				$i=1;
				foreach( $all_guides as $guide ){
					$guide_menu_order = $guide->menu_order + 1;
					$guide_count[$guide_menu_order] = $i;
					$i++;
				}
			?>
			<a href="<?php echo $guides_page_link; ?>" class="back_to_guides">חזרה לדף מדריכים</a>
			<div class="single_guide_title">
				<span class="guide_number"><?php echo $guide_count[$guide_order]; ?></span>
				<span>
					<h5 class="blue">הדרכה בנושא:</h5>
					<h5 class="dgray"><?php echo the_title(); ?></h5>
				</span>
			</div>
			<div class="single_guide_video">
				<?php 
					if($guide_video){
						//echo do_shortcode(apply_filters("the_content", "[tube]" . $guide_video . "[/tube]")); 
						?>
							<iframe width="100%" height="450" src="//www.youtube.com/embed/<?php echo $guide_video; ?>?rel=0&autoplay=0&showinfo=0&controls=0&autohide=1" frameborder="0"  allowfullscreen></iframe>
						<?php
					}
				?>
			</div>
		<?php endwhile; endif; ?>
		<div class="clear"></div>
		
		<?php 
			$args = array(
				'post_type' => 'guide',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'guides-cat', 
						'field'    => 'term_id',
						'terms'    => $guide_cat
					),
				)
			);
			$all_guides = get_posts( $args );
			foreach( $all_guides as $single_guide ){
				$single_guide_order = $single_guide->menu_order + 1;
				if( $single_guide_order == ($guide_order+1) ){
					$next_guide_id = $single_guide->ID;
					$next_guide_title = get_the_title($next_guide_id);
					$next_guide_url = get_permalink($next_guide_id);
					$next_guide_order = $single_guide->menu_order + 1;
				}
				if( $single_guide_order == ($guide_order-1) ){
					$prev_guide_id = $single_guide->ID;
					$prev_guide_title = get_the_title($prev_guide_id);
					$prev_guide_url = get_permalink($prev_guide_id);
					$prev_guide_order = $single_guide->menu_order + 1;
				}
			}
		?>
		<?php if($prev_guide_id){ ?>
			<div class="guide_nav fr">
				<a href="<?php echo $prev_guide_url; ?>">
					<span class="prev_arrow">&nbsp;</span>
					<span class="guide_number"><?php echo $prev_guide_order; ?></span>
					<span>
						<h5 class="dgray">שלב קודם:</h5>
						<h5 class="dgray"><?php echo $prev_guide_title; ?></h5>
					</span>
				</a>
			</div>
		<?php } ?>
		<?php if($next_guide_id){ ?>
			<div class="guide_nav fl">
				<a href="<?php echo $next_guide_url; ?>">
					<span class="guide_number"><?php echo $next_guide_order; ?></span>
					<span>
						<h5 class="dgray">שלב הבא:</h5>
						<h5 class="dgray"><?php echo $next_guide_title; ?></h5>
					</span>
					<span class="next_arrow">&nbsp;</span>
				</a>
			</div>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>