<div class="col-lg-6 col-md-12 logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php $comp_logo = get_field( 'comp_logo' );
		$atm_main_logo   = get_field( 'atm_logo', 'options' );
		if ( ! empty( $comp_logo['url'] ) && ! empty( $comp_logo['title'] ) ) {
			?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $comp_logo['url'] ); ?>"
                     alt="<?php echo esc_html( $comp_logo['title'] ); ?>"/>
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
    </a>
</div>
