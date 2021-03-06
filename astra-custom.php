<?php
/**
 * Update the featured images size from Astra
 */
add_filter( 'astra_post_thumbnail_default_size', 'update_featured_images_size_callback' ); 
function update_featured_images_size_callback( $size ) {
    if(!is_single()) $size = array( 373, 250 ); // Update the 500(Width), 500(Height) as per your requirment.
	return $size;
}
if ( ! function_exists( 'mos_post_class_blog_grid' ) ) {
	function mos_post_class_blog_grid( $classes ) {

		if ( is_archive() || is_home() || is_search() ) {
			$classes[] = 'ast-col-md-4';
		}

		return $classes;
	}
}
add_filter( 'post_class', 'mos_post_class_blog_grid' );
// Update your custom tablet breakpoint below - like return 992;
add_filter( 'astra_tablet_breakpoint', function() {
    return 992;
});
// Update your custom mobile breakpoint below - like return 768px;
add_filter( 'astra_mobile_breakpoint', function() {
    return 768;
});
add_action('astra_header_before','custom_sticky_header');
function custom_sticky_header(){
    ?>
    <div class="main-header-bar-wrap mos-sticky-header">
        <div <?php echo astra_attr( 'main-header-bar' ); ?>>
            <div class="ast-container">
                <div class="ast-flex main-header-container">
                    <?php astra_masthead_content(); ?>
                </div><!-- Main Header Container -->
            </div><!-- ast-row -->
            <?php astra_main_header_bar_bottom(); ?>
        </div> <!-- Main Header Bar -->
    </div> <!-- Main Header Bar Wrap -->
    <?php
}
add_action('astra_main_header_bar_top', 'mos_astra_header_before', 5);
function mos_astra_header_before(){
    ?>
    <div class="main-top-bar">
        <div class="ast-container">
            <div class="ast-flex main-top-bar-container">
                <div class="column one">
                    <ul class="contact_details">
                        <li class="email"><i class="fa fa-phone"></i> <a href="mailto:mostak.shahid@gmail.com">mostak.shahid@gmail.com</a></li>
                        <li class="phone"><i class="fa fa-phone"></i> <a href="tel:(646)583-1385">(646) 583-1385</a></li>
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
    <?php
}