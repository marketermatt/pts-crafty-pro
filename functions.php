<?php

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function display_images_in_list($size = thumbnail) {

	if( $images = get_posts( array(
        'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => -1, // show all
		'post_status'    => null,
		'post_mime_type' => 'image',
                'orderby'        => 'menu_order',
                'order'           => 'ASC',
        ))
    ) {
        foreach($images as $image) {
            $attimg   = wp_get_attachment_image($image->ID, $size);
            echo '<li>'. $attimg .'</li>';
		}
	}
}


add_filter( 'woocommerce_product_tabs', 'woo_rename_tab', 98);
function woo_rename_tab($tabs) {
	$tabs['description']['title'] = 'Theme Details';
	return $tabs;
}


?>