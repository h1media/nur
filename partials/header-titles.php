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
