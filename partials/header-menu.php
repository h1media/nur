<?php
$color  = get_field( 'revers_social_colors' );
	?>
	<div class="mobile-nav menu-holder
	<?php
	if( $color['value'] ) {
	    ?>
	    color-<?php echo esc_html( $color['value'] ); ?>
	    <?php
	}
	?>">

    <div id="nav-icon1">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="responsive-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</div>

