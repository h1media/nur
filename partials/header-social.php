<?php
$revers = get_field( 'revers_social_colors' );
if ( $revers ) {
	?>
	<div class="social-top no-print reversed">
<?php
} else {
	?>
	<div class="social-top no-print">
<?php
}
?>
        <div class="social-top-holder">
		<?php
		$facebook = get_field( 'atm_facebook', 'options' );
		$twitter  = get_field( 'atm_twitter', 'options' );
		$linkedin  = get_field( 'atm_linkedin', 'options' );
		if ( ! empty( $facebook ) ) { ?>
	        <a class="social" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="nofollow"><span
	                    class="fa fa-facebook" aria-hidden="true"></span></a>
		<?php
		}
		if ( ! empty( $linkedin ) ) { ?>
	        <a class="social" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="nofollow"><span
	                    class="fa fa-linkedin" aria-hidden="true"></span></a>
		<?php
		}
		if ( ! empty( $twitter ) ) { ?>
	        <a class="social" href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="nofollow"><span
	                    class="fa fa-twitter" aria-hidden="true"></span></a>
		<?php
		}
		?>
        </div>
		<?php get_template_part( 'partials/header-menu' ); ?>
	</div>
