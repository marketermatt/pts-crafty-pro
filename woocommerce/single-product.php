<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header( 'shop' );
?>
<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent" id="az-maincontent">

    <div class="grid-100 grid-parent az-ProductHeader">
    <?php
        $terms = wp_get_post_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
        if(!empty($terms)) {
            $main_term = $terms[0];
        } else {
            $main_term = "";
        }
        if( $main_term ) {
            echo '<div class="cat_back_btn headerfont"><i class="icon-arrow-left"></i> '.__('Back to', 'azkaban').' <a href="'.get_term_link($main_term->slug, 'product_cat').'">'.$main_term->name.'</a></div>';
        } 
        else {
            echo '<div class="cat_back_btn headerfont"><i class="icon-arrow-left"></i> '.__('Back to', 'azkaban').' <a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'">'.__('Shop','virtue').'</a></div>';
        }
    ?>
    </div>

<div id="az-productslider" class="flexslider">
    <ul class="slides">
        <?php display_images_in_list('full'); ?>
    </ul>
</div>
<script>
jQuery(document).ready(function() {
    jQuery('#az-productslider').flexslider({
        animation: "slide",
        slideshowSpeed: 5000,
        animationSpeed: 1000,
        randomize: false,
        pauseOnHover: true,
        prevText: "",
        nextText: "",
        after: function(slider) {
		jQuery('#az-productslider .slider-caption').animate({bottom:12,}, 400)
	},
	before: function(slider) {
        jQuery('#az-productslider .slider-caption').animate({ bottom:-300,}, 400)
	},	
	start: function(slider) {
		jQuery('#az-productslider .slider-caption').animate({ bottom:12,}, 400)
	}
  });
});
</script>
<?php wp_reset_query(); ?>
    
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent az-producttitle">
        <h1><?php the_title(); ?></h1>
    </div> <!-- end of az-producttitle -->

    <div class="grid-70 tablet-grid-100 mobile-grid-100 grid-parent">
        <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
    </div>
    <div class="grid-30 tablet-grid-100 mobile-grid-100" id="az-productsidebar">
        <div class="grid-100 tablet-grid-100 mobile-grid-100" id="az-productdetails">
            <h4>Single Site License <span class="az-price">$45.00</span> Only</h4>
            <center><a href="<?php echo do_shortcode('[add_to_cart_url id='.$product->id.']'); ?>" class="az-addtocartbutton" ><i class="fa fa-shopping-cart"></i> Add To Cart</a></center>
        </div>
        <div class="grid-100 tablet-grid-100 mobile-grid-100" id="az-packagedetails">
            <h4>Theme Package Includes:</h4>
            <ul>
                <li><?php print_r($product->post->post_title); ?></li>
                <li>Azkaban Theme Framework</li>
                <li>Documentation</li>
                <li>Logo PSDs and Ai Files</li>
                <li>Fonts</li>
                <li>Demo Data</li>
                <li>Extras</li>
            </ul>
        </div>
        <div class="grid-100 tablet-grid-100 mobile-grid-100" id="az-featurelist">
            <i class="fa fa-bolt"></i>
            <h5>Free Lifetime Update</h5>
        </div>
        <div class="grid-100 tablet-grid-100 mobile-grid-100" id="az-featurelist">
            <i class="fa fa-file-text-o"></i>
            <h5>Complete Documentation</h5>
        </div>
        <div class="grid-100 tablet-grid-100 mobile-grid-100" id="az-featurelist">
            <i class="fa fa-group"></i>
            <h5>24/7 Support</h5>
        </div>
        <div class="grid-100 tablet-grid-100 mobile-grid-100" id="az-featurelist">
            <i class="fa fa-thumbs-o-up"></i>
            <h5>100% Satisfaction Guarantee</h5>
        </div>
    </div>
    <?php endwhile; // end of the loop. ?>

</div>
<?php
get_footer( 'shop' );
?>
