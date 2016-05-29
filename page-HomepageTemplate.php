<?php
/**
 * @package WordPress
 * @subpackage Corban
 * Template Name: Custom Home Page Template 
 */


get_header( 'shop' );
global $corban_options, $woocommerce;
$counter = 0;

?>

<div class="grid-100 tablet-grid-100 mobile-grid-100" id="az-maincontent">

    <?php echo do_shortcode('[fullwidth menu_anchor="" color="#ffffff" backgroundcolor="" backgroundimage="http://craftythemes.com/wp-content/uploads/bg3.jpg" backgroundrepeat="no-repeat" backgroundposition="center top" backgroundattachment="fixed" bordersize="0px" bordercolor="" borderstyle="solid" paddingtop="30px" paddingbottom="30px" margintop="-50px" marginbottom="0px" class="az-frontslogan" id=""]<h1 style="padding:20px;text-align:center;font-size:32pt;font-family:\'Lobster\', sans-serif;color:#00B0D8;background:rgba(0, 0, 0, 0.4);text-shadow:-1px 1px 1px #222;">Premium Modern & Responsive WordPress Themes</h1><br/><h2 style="padding:20px;text-align:center;font-size:26pt;font-family:\'Lobster\', sans-serif;color:#F80000;background:rgba(0, 0, 0, 0.4);text-shadow:-1px 1px 1px #222;">Clean, Professional And Exclusive Themes For Your Websites And Blogs</h2>[/fullwidth]'); ?>
    
    <?php echo do_shortcode('[content_boxes layout="icon-on-top" columns="4" class="" id=""][content_box title="Clean & Modern" backgroundcolor="" icon="fa-flask" size="3x" iconcolor="#039ed2" circlecolor="#ffffff" circlebordercolor="#ffffff" iconflip="" iconrotate="" iconspin="no" image="" image_width="75" image_height="75" link="" linktarget="_self" linktext=""]Our theme offer super clean and modern look and feel for your website.[/content_box][content_box title="Responsive" backgroundcolor="" icon="fa-mobile" size="3x" iconcolor="#039ed2" circlecolor="#ffffff" circlebordercolor="#ffffff" iconflip="" iconrotate="" iconspin="no" image="" image_width="75" image_height="75" link="" linktarget="_self" linktext=""]Our theme offer super clean and modern look and feel for your website.[/content_box][content_box title="Lifetime Update" backgroundcolor="" icon="fa-paper-plane-o" size="3x" iconcolor="#039ed2" circlecolor="#ffffff" circlebordercolor="#ffffff" iconflip="" iconrotate="" iconspin="no" image="" image_width="75" image_height="75" link="" linktarget="_self" linktext=""]Free lifetime updates for every theme you purchase from us.[/content_box][content_box title="Friendly Support" backgroundcolor="" icon="fa-users" size="3x" iconcolor="#039ed2" circlecolor="#ffffff" circlebordercolor="#ffffff" iconflip="" iconrotate="" iconspin="no" image="" image_width="75" image_height="75" link="" linktarget="_self" linktext=""]We offer complete free and friendly after sales support.[/content_box][/content_boxes]'); ?>

    <?php echo do_shortcode('[fullwidth menu_anchor="" backgroundcolor="#36ABD9" backgroundimage="" backgroundrepeat="no-repeat" backgroundposition="left top" backgroundattachment="scroll" bordersize="0px" bordercolor="" borderstyle="solid" paddingtop="20px" paddingbottom="20px" class="" id=""]<h2 style="text-align:center;font-size:32pt;font-family:\'Lobster\', sans-serif;color:#fff;text-shadow:-1px 1px 1px #444;">Our Premium Responsive WordPress Themes</h2>[/fullwidth]'); ?>

	<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
        <?php
           $args = array(
                        'post_type' => 'product', 
                        'posts_per_page' => 3,
                        'orderby' => 'rand'
                );
            $loop = new WP_Query( $args );
            
            while ( $loop->have_posts() ) : $loop->the_post(); $_product;
            if( function_exists('get_product') ) {
                $_product = get_product( $loop->post->ID );
            } else {
                $_product = new WC_Product( $loop->post->ID );
            }
        ?>
        <div class="grid-33 tablet-grid-100 mobile-grid-100 az-product3col">
        
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'woo-featured' ); ?>
            <?php $imagesrc = $image[0]; ?>
        <?php else : ?>
            <?php $imagesrc = get_first_image(); ?>
        <?php endif; ?>

        <?php if( $imagesrc != '' ) { ?>
        <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent az-featuredimg">
            <img src="<?php echo $imagesrc; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
        </div> <!-- end of az-featuredimg -->
        <?php } ?>

        <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent az-producttitle">
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        </div> <!-- end of az-producttitle -->

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
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
            
    </div> <!-- end of  -->
    
    <?php echo do_shortcode('[fullwidth menu_anchor="" backgroundcolor="#36ABD9" backgroundimage="" backgroundrepeat="no-repeat" backgroundposition="left top" backgroundattachment="scroll" bordersize="0px" bordercolor="" borderstyle="solid" paddingtop="20px" paddingbottom="20px" class="" id=""]<h2 style="text-align:center;font-size:26pt;font-family:\'Lobster\', sans-serif;color:#fff;text-shadow:-1px 1px 1px #444;">Join More Than 5,000 Proud and Satisfied Clients Who Love CraftyThemes</h2>[/fullwidth]'); ?>

    <p>CraftyThemes.com offers premium WordPress themes that are clean, professional and easy to use. Our WordPress Templates suitable for personal or business blogs, websites, news sites and online magazines. These Premium WordPress Themes are crafted with care and amazingly beautiful coupled with advanced functionality and awesome support.</p>

    <?php echo do_shortcode('
    [one_third last="no" class="" id=""]
    [checklist icon="fa-check" circle="yes" size="medium" class="" id=""]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Clean and Modern Layout[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Responsive Grid Based Design[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]WooCommerce Compatible[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Font Awesome Integrated[/li_item]
    [/checklist]
    [/one_third]
    [one_third last="no" class="" id=""]
    [checklist icon="fa-check" circle="yes" size="medium" class="" id=""]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Multiple Premium Slider Options[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Free Lifetime Update[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Power Admin Control Panel[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Complete Customization Options[/li_item]
    [/checklist]
    [/one_third]
    [one_third last="yes" class="" id=""]
    [checklist icon="fa-check" circle="yes" size="medium" class="" id=""]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Unlimited Custom Sidebars[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Unlimited Google Fonts Options[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]Font Awesome Integrated[/li_item]
    [li_item icon="fa-check" iconcolor="#ffffff" circle="" circlecolor="#36abd9"]SEO Optimized[/li_item]
    [/checklist]
    [/one_third]'); ?>

    <?php echo do_shortcode('[fullwidth menu_anchor="" backgroundcolor="#36ABD9" backgroundimage="" backgroundrepeat="no-repeat" backgroundposition="left top" backgroundattachment="scroll" bordersize="0px" bordercolor="" borderstyle="solid" paddingtop="20px" paddingbottom="20px" class="" id=""]<center><img src="http://craftythemes.com/wp-content/uploads/brand-logo.png" alt="Premium WordPress Themes by OlaThemes.com" title="Premium Responsive WordPress Themes by CraftyThemes.com" /></center>[/fullwidth]'); ?>

    <?php echo do_shortcode('[testimonials backgroundcolor="" textcolor="" class="" id=""][testimonial name="Sheryl Harvey" avatar="image" image="http://craftythemes.com/wp-content/uploads/SherylHarvey.jpg" company="" link="" target="_self"]Best theme I have ever used, many great features and lots of customization options. Excellent job guys![/testimonial][testimonial name="James Barnhart" avatar="image" image="http://craftythemes.com/wp-content/uploads/JamesBarnhart.jpg" company="" link="" target="_self"]Super clean layout, solid structure, running great on my sites and the support is awesome.[/testimonial][/testimonials]'); ?>

</div> <!-- end of az-maincontent -->

<?php get_footer( 'shop' ); ?>
