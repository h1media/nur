<?php
$revers = get_field( 'revers_social_colors' );
if ( $revers ) {
	?>
	<div class="mobile-nav menu-holder reversed-main">
<?php
} else {
	?>
	<div class="mobile-nav menu-holder">
<?php
}
?>
    <div id="nav-icon1">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="responsive-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</div>

