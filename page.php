<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'header-bcg' );
		if ( ! empty( $backgroundimg[0] ) ) { ?>
            <div class="container-fluid header" style="background: url('<?php echo esc_url( $backgroundimg[0] ); ?>');">
            <div class="container-fluid header-holder">
		<?php } else { ?>
            <div class="container-fluid header no-bcg">
            <div class="container-fluid header-holder">
		<?php } ?>
        <div class="container">
            <div class="row top">
				<?php get_template_part( 'partials/header-logo' ); ?>
				<?php get_template_part( 'partials/header-social-contact' ); ?>
            </div>
        </div>
        </div>
        <div class="container-fluid titles-holder">
            <div class="container">
				<?php get_template_part( 'partials/header-titles' ); ?>
            </div>
        </div>
        </div>
		<?php
		$page_bcg = get_field( 'page_background_image' );
		if ( $page_bcg['url'] ) {
			?>
            <div class="container-fluid content-holder" style="background:url('<?php echo esc_url( $page_bcg['url'] ); ?>')">
			<?php
		} else {
			?>
            <div class="container-fluid content-holder" style="background:#ccc;">
			<?php
		}
		?>
        <div class="conrainer-fluid main-content">
            <div class="container">
				<?php get_template_part( 'partials/article-body' ); ?>
            </div>
        </div>
        <div class="container-fluid footer-content">
            <div class="container">
				<?php get_template_part( 'partials/article-footer' ); ?>
            </div>
        </div>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
