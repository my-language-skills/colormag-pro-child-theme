<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */

// Display the reading time dynamically.
$reading_time_class = '';
if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
	$reading_time_class = 'readingtime';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $reading_time_class ); ?><?php echo colormag_schema_markup( 'entry' ); ?>>
	<?php do_action( 'colormag_before_post_content' ); ?>

	<?php if ( get_theme_mod( 'colormag_single_post_title_position', 'below' ) == 'above' ) { ?>
		<div class="single-title-above">
			<?php colormag_colored_category(); ?>

			<header class="entry-header">
				<h1 class="entry-title"<?php echo colormag_schema_markup( 'entry_title' ); ?>>
					<?php the_title(); ?>
				</h1>
			</header>

			<?php colormag_entry_meta(); ?>
		</div>
	<?php } ?>

	<?php
	$image_popup_id  = get_post_thumbnail_id();
	$image_popup_url = wp_get_attachment_url( $image_popup_id );
	?>

	<?php if ( ! has_post_format( array( 'gallery', 'video' ) ) ) : ?>

		<?php if ( ( get_theme_mod( 'colormag_featured_image_show', 0 ) == 0 ) && ( has_post_thumbnail() ) ) { ?>
			<div class="featured-image"<?php echo colormag_schema_markup( 'image' ); ?>>
				<?php if ( get_theme_mod( 'colormag_featured_image_popup', 0 ) == 1 ) { ?>
					<a href="<?php echo $image_popup_url; ?>" class="image-popup"><?php the_post_thumbnail( 'medium_large' ); ?></a>
				<?php } else { ?>
					<?php the_post_thumbnail( 'medium_large' ); ?>
				<?php } ?>
				<?php
				if ( get_theme_mod( 'colormag_schema_markup', '' ) == 1 ) : ?>
					<meta itemprop="url" content="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>">
				<?php endif; ?>
			</div>

			<?php if ( ( get_theme_mod( 'colormag_featured_image_caption_show', 0 ) == 1 ) && ( get_post( get_post_thumbnail_id() )->post_excerpt ) ) { ?>
				<span class="featured-image-caption">
					<?php echo wp_kses_post( get_post( get_post_thumbnail_id() )->post_excerpt ); ?>
				</span>
			<?php } ?>
		<?php } ?>

	<?php endif; ?>

	<div class="article-content clearfix">

		<?php if ( get_post_format() ) {
			get_template_part( 'inc/post-formats' );
		} ?>

		<?php if ( get_theme_mod( 'colormag_single_post_title_position', 'below' ) == 'below' ) {
			colormag_colored_category(); ?>

			<header class="entry-header">
				<h1 class="entry-title"<?php echo colormag_schema_markup( 'entry_title' ); ?>>
					<?php the_title(); ?>
				</h1>
			</header>

			<?php colormag_entry_meta();
		} ?>

		<div class="entry-content clearfix"<?php echo colormag_schema_markup( 'entry_content' ); ?>>
			<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div style="clear: both;"></div><div class="pagination clearfix">' . __( 'Pages:', 'colormag' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div>

		<?php colormag_post_view_setup( get_the_ID() ); ?>
	</div>

	<?php do_action( 'colormag_after_post_content' ); ?>
</article>
