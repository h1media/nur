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
                <div class="row">
					<?php
					get_template_part( 'partials/header-subtitle' );
					$featured_text = get_field( 'atm_featured_text' );
					if ( ! empty( $featured_text ) ) {
						?>
                        <div class="row featured">
                            <div class="col-12">
								<?php echo wp_kses_post( $featured_text ); ?>
                            </div>
                        </div>
						<?php
					}
					?>
                </div>
            </div>
        </div>
        </div>
        <div class="container main-content">
			<?php get_template_part( 'partials/article-body' ); ?>
			<?php get_template_part( 'partials/article-footer' ); ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
