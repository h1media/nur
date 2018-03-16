<div class="col-md-6 col-sm-12 logo">
	<?php $atm_logo = get_field( 'atm_custom_logo' );
	$atm_main_logo  = get_field( 'atm_logo', 'options' );
	if ( ! empty( $atm_logo['url'] ) && ! empty( $atm_logo['title'] ) ) { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( $atm_logo['url'] ); ?>" alt="<?php echo esc_html( $atm_logo['title'] ); ?>"/>
        </a>
		<?php
	} elseif ( ! empty( $atm_main_logo['url'] ) && ! empty( $atm_main_logo['title'] ) ) {
		?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( $atm_main_logo['url'] ); ?>"
                 alt="<?php echo esc_html( $atm_main_logo['title'] ); ?>"/>
        </a>
		<?php
	}
	?>
</div>
