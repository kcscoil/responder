<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
$image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID,'' ));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header autor_header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta">
			<?php twentythirteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="fr padlft15">                    
		<div class="fr padtop4 padlft5"><img src="<?php echo get_template_directory_uri(); ?>/images/pencil.png" width="14" height="13" alt=""/></div>
		<div class="fr dgray16">מאת <?php the_author_posts_link(); ?></div>
		<div class="clear"></div>
	</div>
	<div class="fr">                    
		<div class="fr padtop4 padlft5"><img src="<?php echo get_template_directory_uri(); ?>/images/calendar.png" width="14" height="14"  alt=""/></div>
		<div class="fr lgray16"><?php the_time('l, j בF, Y') ?></div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class="clear"></div>
	<div class="bubble"><?php echo get_comments_number(); ?></div>
	<div class="clear"></div>
	<?php if($image): ?>
		<div class="imaborder">
			<img src="<?php echo  site_url(); ?>/s_img_new.php?image=<?php echo $image; ?>&height=131&width=535" alt="" class="wbdr8px" />
		</div>
	<?php endif;?>
	<div class="entry-content">
		<?php
			$content = get_the_content();
			echo truncat(strip_tags($content),400);
		?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<p><a class="bluelink16" href="<?php the_permalink(); ?>">קרא עוד ></a></p>
</article><!-- #post -->
