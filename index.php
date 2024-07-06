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
    echo $view_order_url;
    // $order->get_edit_order_url();
 }
add_action( 'init', 'wc_obj_callback' );