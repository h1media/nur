<?php
/**
 * Template Name: Site map
 *
 */
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		if ( ! empty( $backgroundimg[0] ) ) { ?>
			<div class="container-fluid header" style="background: linear-gradient(175deg, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 25%),, background: url('<?php echo esc_url( $backgroundimg[0] );  ?>');">
		<?php } else { ?>
			<div class="container-fluid header no-bcg">
		<?php } ?>
		<div class="container">
			<div class="row">
				<?php get_template_part( 'partials/header-logo' ); ?>
				<?php get_template_part( 'partials/header-social' ); ?>
			</div>
		</div>
		<?php get_template_part( 'partials/header-menu' ); ?>
		<?php get_template_part( 'partials/header-subtitle' ); ?>
		</div>
		<div class="container main-content site-map">
			<div class="row article">
				<div class="col-12">
					<h4><?php _e( 'Pages', 'automech' ); ?></h4>
					<?php
					$args = array(
						'post_type' => 'page',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) {
						echo '<ul>';
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
						}
						echo '</ul>';
						wp_reset_postdata();
					} else {
						echo 'No pages found';
					}
					?>
					<h4><?php _e( 'Companies', 'automech' ); ?></h4>
					<?php
					$args = array(
						'post_type' => 'atm_companies',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) {
						echo '<ul>';
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
						}
						echo '</ul>';
						wp_reset_postdata();
					} else {
						echo 'No pages found';
					}
					?>
				</div>
			</div>
			<?php get_template_part( 'partials/article-footer' ); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
