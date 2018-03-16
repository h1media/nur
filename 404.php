<?php get_header(); ?>
	<div class="container-fluid header no-bcg">
		<div class="container">
			<div class="row">
				<?php get_template_part( 'partials/header-logo' ); ?>
				<?php get_template_part( 'partials/header-social' ); ?>
			</div>
		</div>
		<?php get_template_part( 'partials/header-menu' ); ?>
		<?php get_template_part( 'partials/header-subtitle' ); ?>
	</div>
	<div class="container main-content">
		<div class="row article">
			<div class="col-12">
				<h1><?php _e( '404', 'automech' ); ?></h1>
				<p><?php _e( 'Page not found', 'automech' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Back to Home', 'automech' ); ?></a>
			</div>
		</div>
		<?php get_template_part( 'partials/article-footer' ); ?>
	</div>
<?php get_footer();
