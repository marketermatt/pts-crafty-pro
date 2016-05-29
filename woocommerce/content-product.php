<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $virtue;

// Store loop count we're currently on
if( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if( empty($woocommerce_loop['columns']) ) 
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
    
if ($woocommerce_loop['columns'] == '3') {
    $itemsize = 'grid-25 tablet-grid-25 mobile-grid-100';
    $productimgwidth = 245;
}
else {
    $itemsize = 'grid-33 tablet-grid-33 mobile-grid-100';
    $productimgwidth = 340;
}
// Ensure visibility
if( !$product || !$product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();

$classes[] = 'grid_item';
$classes[] = 'product_item';
$classes[] = 'clearfix';
?>
<div class="<?php echo $itemsize;?> az-product3col">
    <div <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php the_permalink(); ?>" class="product_item_link">
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
            //do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
        <?php echo woocommerce_show_product_loop_sale_flash($post, $product); ?>
        <?php
            if( has_post_thumbnail() ) {
                $product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'woo-featured' );
                $product_image_url = $product_image[0];
                if( empty($image_product) ) {
                    $image_product = $product_image_url;
                }
        ?>
            <img width="<?php echo $productimgwidth;?>" height="<?php echo $productimgwidth;?>" src="<?php echo $image_product;?>" class="attachment-shop_catalog wp-post-image" alt="<?php the_title();?>" />
        <?php
            }
            elseif( woocommerce_placeholder_img_src() ) {
                echo woocommerce_placeholder_img( 'shop_catalog' );
            }  
        ?>
    </a>
             
    <div class="az-producttitle">
        <h2><a href="<?php the_permalink(); ?>" class="product_item_link"><?php the_title(); ?></a></h2>
    </div>

        <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent az-productdetails">
            <div class="grid-70 tablet-grid-50 mobile-grid-100 grid-parent az-viewprice">
                Price: <?php echo $product->get_price_html(); ?>
            </div> <!-- end of az-viewprice -->
            <div class="grid-30 tablet-grid-50 mobile-grid-100 grid-parent az-viewrating">
            <?php 
                $count = $product->get_rating_count();
                $average = $product->get_average_rating();
            ?>
            <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <?php 
                if( $count > 0 ) : ?>
                    <div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
                    <span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
                        <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?>
                    </span>
                    </div>
            <?php else : ?>
                    <div class="star-rating" title="<?php printf( __( 'Rated 0 out of 5', 'woocommerce' ), $average ); ?>">
                    <span style="width:0%">
                        <strong itemprop="ratingValue" class="rating">0</strong> <?php _e( 'out of 5', 'woocommerce' ); ?>
                    </span>
                    </div>
            <?php endif; ?>
            </div>
            </div> <!-- end of az-viewrating -->
            
        </div> <!-- end of az-productdetails -->

        <div class="grid-100 tablet-grid-100 mobile-grid-100 az-morebuttons">
            <center><a class="az-morebutton" href="<?php the_permalink(); ?>"><i class="fa fa-search"></i>More Details</a></center>
        </div> <!-- end of az-morebuttons -->

    </div>
</div>
