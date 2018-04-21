<?php
/**
 * 
 * @package AristechBooking
 */


if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
} 

global $wpdb;
$array = array( 'aristech_booking_url','aristech_title','aristech_text','aristech_btn','aristech_tel','aristech_radio','aristech_color_tt','aristech_color_tb','aristech_color_st','aristech_color_ft','aristech_color_fb','aristech_color_bt','aristech_color_bb','aristech_image',);

foreach ($array as $item) {
    $item = esc_sql( $item );
    $wpdb->query( "DELETE FROM wp_options WHERE option_name = '$item'" );
}


