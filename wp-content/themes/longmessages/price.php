<?php
/**
 * Template Name: Price Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 get_header(); ?>
<div class="wrapper canpad">
	<?php get_sidebar(); ?>
    <div class="canrgt">



    			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/**
					 * We are using a heading by rendering the_content
					 * If we have content for this page, let's display it.
					 */
					 the_content();
					 
/* 				 	if ( '' != get_the_content() )
						get_template_part( 'content', 'intro' ); 
 */				?>

				<?php endwhile; ?>
</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>