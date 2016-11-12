<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package MDLWP
 */

?>

<?php
    // Gets the stored background color value 
    $color_value = get_post_meta( get_the_ID(), 'mdlwp-bg-color', true ); 
    // Checks and returns the color value
  	$color = (!empty( $color_value ) ? 'background-color:' . $color_value . ';' : '');

  	// Gets the stored title color value 
    $title_color_value = get_post_meta( get_the_ID(), 'mdlwp-title-color', true ); 
    // Checks and returns the color value
  	$title_color = (!empty( $title_color_value ) ? 'color:' . $title_color_value . ';' : '');

  	// Gets the stored height value 
    $height_value = get_post_meta( get_the_ID(), 'mdlwp-height', true ); 
    // Checks and returns the height value
  	$height = (!empty( $height_value ) ? 'height:' . $height_value . ';' : '');

  	 // Gets the uploaded featured image
  	$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  	// Checks and returns the featured image
  	$bg = (!empty( $featured_img ) ? "background-image: url('". $featured_img[0] ."');" : '');
?>

<div class="page-content mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if (!empty( $featured_img )) { ?>
			<div class="mdl-card__media<?php echo (!empty( $featured_img ) ? " has-feature-image" : '') ?>" style="<?php echo $color . $bg . $height; ?> ">
				<header>
					<?php the_title( sprintf( '<h3 style="%s"> ', $title_color, '</h3>' )); ?>
				</header>
			</div>
		<?php } else { ?>
			<div>
				<?php the_title('<h3>', '</h3>'); ?>
				<hr>
			</div>
		<?php } ?>


		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mdlwp' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div> <!-- .mdl-cell -->


