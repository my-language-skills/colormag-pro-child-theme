<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<?php
$featured_image_size = 'colormag-featured-image';
$class_name_layout_two = '';
if ( get_theme_mod( 'colormag_archive_search_layout', 'double_column_layout' ) == 'single_column_layout' ) {
	$featured_image_size = 'colormag-featured-post-medium';
	$class_name_layout_two = 'archive-layout-two';
} elseif ( get_theme_mod( 'colormag_archive_search_layout', 'double_column_layout' ) == 'full_width_layout' ) {
	$class_name_layout_two = 'archive-layout-full-width';
} elseif ( get_theme_mod( 'colormag_archive_search_layout', 'double_column_layout' ) == 'grid_layout' ) {
	$featured_image_size = 'colormag-featured-post-medium';
	$class_name_layout_two = 'archive-layout-grid';
}

// Display the reading time dynamically.
$reading_time       = '';
$reading_time_class = '';
if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
	$reading_time       = 'data-file="' . get_the_permalink(). '" data-target="article"';
	$reading_time_class = 'readingtime';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( $class_name_layout_two, $reading_time_class ) ); ?><?php echo colormag_schema_markup( 'entry' ); ?> <?php echo $reading_time; ?>>
	<?php do_action( 'colormag_before_post_content' ); ?>
	<?php if ( ! has_post_format( array( 'gallery', 'video' ) ) ) : ?>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( $featured_image_size ); ?></a>
		</div>

		<?php if ( ( get_theme_mod( 'colormag_featured_image_caption_show', 0 ) == 1 ) && ( get_post( get_post_thumbnail_id() ) -> post_excerpt ) ) { ?>
			<span class="featured-image-caption">
				<?php echo wp_kses_post( get_post( get_post_thumbnail_id() ) -> post_excerpt ); ?>
			</span>
		<?php } ?>
	<?php } ?>
	<?php endif; ?>

	<div class="article-content clearfix">

		<?php if ( get_post_format() ) {
			get_template_part( 'inc/post-formats' );
		} ?>

		<?php colormag_colored_category(); ?>

		<header class="entry-header">
			<h2 class="entry-title"<?php echo colormag_schema_markup( 'entry_title' ); ?>>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
		</header>

			<?php colormag_entry_meta(); ?>

            <div style="text-align: justify;" class="entry-content clearfix"<?php echo colormag_schema_markup( 'entry_summary' ); ?>>
			<?php
			if ( (get_theme_mod( 'colormag_archive_content_excerpt_display', 'excerpt' ) == 'content') && ! ((get_theme_mod( 'colormag_archive_search_layout', 'double_column_layout' ) == 'grid_layout') || (get_theme_mod( 'colormag_archive_search_layout', 'double_column_layout' ) == 'double_column_layout')) ) :
				the_content(
						'<span>' . get_theme_mod( 'colormag_read_more_text', esc_html__( 'Read more', 'colormag' ) ) . '</span>'
				);

			else :
				?>
                    <a style="color: #191919" class="excerpt-link-to-post" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_excerpt() ?></a>
				

			<?php endif; ?>
		</div>

	</div>

<?php do_action( 'colormag_after_post_content' ); ?>
</article>
