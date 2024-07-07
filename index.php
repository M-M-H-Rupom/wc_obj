<?php
/**
 * Plugin Name: WC obj 
 * Description: hello
 * Version: 1.0
 * Author: Rupom
 * Text Domain: wc
 * 
 */

 function woocommerce_before_shop_callback(){
    echo 'hello';
}
// add_action( 'woocommerce_before_cart', 'woocommerce_before_shop_callback');
// add_action('woocommerce_before_cart', 'sample', 1);

// function sample() {
//     echo '<h1>hello</h1>';
// }

//order 
 function wc_obj_callback(){
    $order = wc_get_order( 106);
    $order_id = $order->get_id();
    // echo $order_id;
    $order_key = $order->get_order_key();
    update_post_meta( $order_id, 'order_key', $order_key );
    $get_order_key = get_post_meta( $order_id, 'order_key', true);
    // echo $get_order_key;
    
    $formate_order = $order->get_formatted_order_total();
    // echo $formatte_order;
    $cart_tax = $order->get_cart_tax();
    // echo $cart_tax;
    $currency = $order->get_currency();
    // echo $currency;
    $discount_tax = $order->get_discount_tax();
    $total_discount = $order->get_discount_total();
    // echo $total_discount;
    $shipping_tax = $order->get_shipping_tax();
    // $order->get_shipping_total();

    $subtotal = $order->get_subtotal();
    update_post_meta( $order_id, 'subtotal', $subtotal );
    $get_subtotal = get_post_meta( $order_id, 'subtotal', true );
    // echo $get_subtotal;
    // $order->get_subtotal_to_display();
    // $order->get_tax_location();
    // $order->get_tax_totals();
    // $order->get_taxes();
    $total = $order->get_total();
    // echo $total;
    $order->get_total_discount();
    $total_tax = $order->get_total_tax();
    // echo $total_tax;
  
    $all_ordars = wc_get_orders(array(
        'status' => array('wc-processing', 'wc-on-hold'),
    ));
    
    foreach($all_ordars as $a_order){
        foreach ( $a_order->get_items() as $item_id => $item ) {

            $product_id = $item->get_product_id();
            // echo $product_id;
            $variation_id = $item->get_variation_id();
            // echo $variation_id;
            $product = $item->get_product(); 
            // echo $product->short_description ;
            // echo $product->image_id . '<br>';

            $product_name = $item->get_name();
            // echo $product_name;
            $quantity = $item->get_quantity();
            update_post_meta($item_id , 'quentity', $quantity );
            $get_quantity = get_post_meta( $item_id, 'quentity',true );
            // echo $get_quantity . '<br>';

            $subtotal = $item->get_subtotal();
            $total = $item->get_total();
            $tax = $item->get_subtotal_tax();
            // echo $tax;
            $tax_class = $item->get_tax_class();
            $tax_status = $item->get_tax_status();
            // echo $tax_status;

            $allmeta = $item->get_meta_data();
            $allmeta_implode = implode(' ',$allmeta);
            print_r($allmeta_implode);
            $item_type = $item->get_type();
            // echo $item_type;
        }
        

    }
    $new_order = wc_get_order( 105);
    $new_order->get_item_count();
    
    $tax_class = $new_order->get_items_tax_classes();
    // print_r($tax_class) ;
    // $order->get_item_count();
    $downloadable_item = $order->get_downloadable_items();
    // echo $downloadable_item;
    $coupon_code = $order->get_coupon_codes();
    $coupon_json = json_encode($coupon_code);
    // echo($coupon_json) ;

    
    // echo $order->get_shipping_method();
    $shipping_method = $order->get_shipping_methods();
    // print_r($shipping_method) ;
    $order->get_shipping_to_display();
    
    // Get Order Dates
    $data_create = $new_order->get_date_created();
    // echo $data_create;
    // echo $data_create;
    // echo $order->get_date_modified();
    $date_complete = $new_order->get_date_completed();
    // echo $date_complete;
    $order->get_date_paid();
    
    // Get Order User, Billing & Shipping Addresses
    $customer_id = $new_order->get_customer_id();
    // echo $customer_id;
    // $order->get_user_id();
    $get_user = $new_order->get_user();
    // print_r($get_user) ;
    $order->get_customer_ip_address();
    $order->get_customer_user_agent();
    $customer_note = $order->get_customer_note();
    // echo $customer_note;
    $bill_fname = $new_order->get_billing_first_name();
    // echo $bill_fname;
    $bill_lname = $new_order->get_billing_last_name();
    // echo $bill_lname;
    // $order->get_billing_company();
    // $order->get_billing_address_1();
    // $order->get_billing_address_2();
     $new_order->get_billing_city() . $new_order->get_billing_state() . $new_order->get_billing_postcode();
    // $order->get_billing_state();
    // $order->get_billing_postcode();
    // $order->get_billing_country();
    $bill_email = $new_order->get_billing_email();
    // echo $bill_email;

    $order->get_billing_phone();
    // echo $new_order->get_shipping_first_name();

    // echo $order->get_shipping_last_name();
    $new_order->get_shipping_company();
    $new_order->get_shipping_address_1();
    $new_order->get_shipping_address_2();
    $new_order->get_shipping_city();
    $new_order->get_shipping_state();
    $new_order->get_shipping_postcode();

    $shipping_country = $order->get_shipping_country();
    // echo $shipping_country;
    // $order->get_address();
    
    // Get Order Payment Details
    $patment_method = $order->get_payment_method();
    // echo $patment_method;
    $payment_method_title = $order->get_payment_method_title();
    // echo $payment_method_title;
    // $transaction_id = $order->get_transaction_id();
    // echo $transaction_id;
    
    // // Get Order URLs
    $checkout_payment_url = $order->get_checkout_payment_url();
    // echo $checkout_payment_url;
    $order_received_url = $order->get_checkout_order_received_url();
    // echo $order_received_url;
    $view_order_url = $new_order->get_view_order_url();
    // echo $view_order_url;
    // $order->get_edit_order_url();
 }
add_action( 'init', 'wc_obj_callback' );


//product object 

function wc_product_obj_callback(){
    $product = wc_get_product(65);
    $product_id = $product->get_id();
    // echo $product_id;
  
    $product_type = $product->get_type();
    $product_name = $product->get_name();
    $product_slug = $product->get_slug();
    // print_r($product_type . $product_name . $product_slug);
    $date_created = $product->get_date_created();
    // print_r($date_created);
    $date_modify = $product->get_date_modified();
    // print_r($date_modify);
    $product_stutas = $product->get_status();
    // print_r($product_stutas);
    $product_featured = $product->get_featured();
    // echo $product_featured;
    // echo $product->get_catalog_visibility();

    $product_description = $product->get_description();
    update_post_meta( $product_id, 'description', $product_description);
    $get_description = get_post_meta( $product_id, 'description', true );
    // print_r($get_description);
    // echo $product_description;
    $short_description = $product->get_short_description();
    // echo $short_description;
    $product_sku = $product->get_sku();
    // echo $product_sku;
    $menu_order = $product->get_menu_order();
    // echo $menu_order;
    // $get_virtual = $product->get_virtual();
    // echo $get_virtual;
    $product_permalink = get_permalink( $product_id);
    // echo $product_permalink;

    
}
add_action( 'init', 'wc_product_obj_callback' );

// $args = array(
//     'post_type'      => 'product',
//     'posts_per_page' => 10,
//     'product_cat'    => 'accessories'
// );
// $all_products = get_posts( $args );
// foreach($all_products as $a_product){
//     $id = get_the_ID();
//     echo $id;
    // $a_product_name = $a_product->get_name();
    // echo $a_product_name;
// }


function product_obj_callback(){
    $all_product = wc_get_products(array(
        'category' => array( 'accessories' ),
        // 'orderby'  => 'name',
    ));
    foreach($all_product as $a_product){
        $product_info =  $a_product->get_id() . ' ' .  $a_product->get_name() . '<br>';
        $product_details = '';
        if($a_product->get_name() == 'Cap'){
            $product_price = $a_product->get_price();
            $product_details = $product_price . '<br>';
            $regular_price = $a_product->get_regular_price();
            $product_details .= $regular_price . '<br>';
            $sale_price = $a_product->get_sale_price();
            $product_details .= $sale_price; 

            // echo $a_product->get_total_sales();
            $tax_status = $a_product->get_tax_status();
            // echo $tax_status;
            $tax_class = $a_product->get_tax_class();
            // echo $tax_class;
            $stock_quantity = $a_product->get_stock_quantity();
            // echo $stock_quantity;
            // $product->get_stock_status();
            // $product->get_backorders();
            // $product->get_sold_individually();
            // $product->get_purchase_note();
            // $product->get_shipping_class_id();
          
            $product_weight = $a_product->get_weight();
            // echo $product_weight;
            $product_length = $a_product->get_length();
            // echo $product_length;
            // $a_product->get_width();
            // $a_product->get_height();
            $get_dimensions = $a_product->get_dimensions();
            // echo $get_dimensions;

            $get_downloads = $a_product->get_downloads();
            // echo $get_downloads;
            // $a_product->get_download_expiry();
            $downloadable = $a_product->get_downloadable();
            // echo $downloadable;
            $download_limit = $a_product->get_download_limit();
            // echo $download_limit;
            
            // Get Product Images
            
            $image_id = $a_product->get_image_id();
            // echo $image_id;
            $get_image = $a_product->get_image();
            $gallery_image_id = $a_product->get_gallery_image_ids();
            // print_r($gallery_image_id);
            
            // Get Product Reviews
            
            $get_reviews = $a_product->get_reviews_allowed();
            // echo $get_reviews;
            $rating_count = $a_product->get_rating_counts();
            // print_r($rating_count) ;
            // $a_product->get_average_rating();
            // $a_product->get_review_count();
        }
        // echo $product_details;
       
    }

    $order = wc_get_order( 106 );
    $items = $order->get_items();
    foreach ( $items as $item ) {
        $product = $item->get_product();
        $product->get_id();
        $product_name = $product->get_name();
        // echo $product_name . '<br>';
        // echo $item->get_name();
        echo $item->get_quantity();
    }
}
add_action( 'init','product_obj_callback' );


