<?php
/**
 * @package AristechBooking
 */
/**
 * Plugin Name: Aristech Booking
 * Description : Custom Booking form
 * Author: Aristech
 * Version: 1.0.0 
 *License:     GPL2
/* 
Aristech Booking is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Aristech Booking is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Aristech Booking. If not, see http://www.gnu.org/licenses/gpl.html.
*/

if ( ! defined('ABSPATH') ) {
    die;
}



class AristechBooking {

    public $plugin;


    function __construct() {

        $this->update();
        $this->plugin       = plugin_basename( __FILE__ );
        $this->template     = plugin_dir_path( __FILE__ ) . '/templates/';
        $this->booking_url  = get_option( 'aristech_booking_url', '' );
        $this->title        = get_option( 'aristech_title', '' );
        $this->text         = get_option( 'aristech_text', '' );
        $this->btn          = get_option( 'aristech_btn', '' );
        $this->tel          = get_option( 'aristech_tel', '' );
        $this->radio        = get_option( 'aristech_radio', 'large' );
        $this->color_tt     = get_option( 'aristech_color_tt', '#acacac' );
        $this->color_tb     = get_option( 'aristech_color_tb', '#fff' );
        $this->color_st     = get_option( 'aristech_color_st', '#acacac' );
        $this->color_ft     = get_option( 'aristech_color_ft', '#acacac' );
        $this->color_fb     = get_option( 'aristech_color_fb', '#fff' );
        $this->color_bt     = get_option( 'aristech_color_bt', '#fff' );
        $this->color_bb     = get_option( 'aristech_color_bb', '#acacac' );
        $this->bgImage      = wp_get_attachment_image_src( get_option( 'aristech_image','' ), $size = 'full')[0];
        $this->name         = 'aristech_image';
        $this->width        = 150;
        $this->height       = 150;
        $this->options      = get_option( $this->name,'' );
        $this->default_image = plugin_dir_url(__FILE__). 'images/no-image.png';

    }

    function register() {
        add_action('wp_enqueue_scripts', array($this, 'enqueueWp'));
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueAdmin'));
        add_action( 'admin_menu',array($this, 'admin_menu_option'));
        add_filter( "plugin_action_links_$this->plugin", array($this, 'settings_link'));
        add_action('wp_head',array($this , 'my_custom_styles'), 100);
        add_shortcode( 'aristech_booking', array($this ,'aristech_booking'));
    } 

    public function settings_link($links){

        $settings_link = '<a href="admin.php?page=aristech_booking">Settings</a>';

        array_push($links, $settings_link);
        return $links;

    }

    function admin_menu_option() 
    {
        wp_enqueue_media();
        add_menu_page('Aristech Booking', 'Aristech Booking', 'manage_options', 'aristech_booking', array($this,'admin_page'), 'dashicons-calendar-alt', 200);
    }

    function enqueueWp() {

        wp_enqueue_style( 'main', plugins_url( '/css/main.css', __FILE__ ) );
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style( 'wp-color-picker' );
        wp_register_style('jquery-ui', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css');
        wp_enqueue_style( 'jquery-ui' );
        wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery' ), '', true );          
        wp_enqueue_script( 'aristech_script', plugin_dir_url( __FILE__ ) . 'js/aristech_script.js',array(),'',true );

    }

    function enqueueAdmin() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'aristech_script', plugin_dir_url( __FILE__ ) . 'js/aristech_admin_script.js', array( 'wp-color-picker' ), false, true );
    }

    function update(){
        if(array_key_exists('submit_scripts_update', $_POST)) 
        {
            update_option('aristech_booking_url', $_POST['booking_url']);
            update_option('aristech_title', $_POST['title']);
            update_option('aristech_text', $_POST['text']);
            update_option('aristech_btn', $_POST['btn']);
            update_option('aristech_tel', $_POST['tel']);
            update_option('aristech_radio', $_POST['radio']);
            update_option('aristech_color_tt', $_POST['tit_txt']);
            update_option('aristech_color_tb', $_POST['tit_bg']);
            update_option('aristech_color_st', $_POST['sub_txt']);
            update_option('aristech_color_ft', $_POST['frm_txt']);
            update_option('aristech_color_fb', $_POST['frm_bg']);
            update_option('aristech_color_bt', $_POST['btn_txt']);
            update_option('aristech_color_bb', $_POST['btn_bg']);
            update_option('aristech_image', $_POST['aristech_image']);
               
        }    
        
    }

    function aristech_booking() {
        ob_start();
        require_once plugin_dir_path( __FILE__ ). 'templates/'.$this->radio.'.php';
            $data = ob_get_contents();
        ob_end_clean();
        return $data;
     }

     function my_custom_styles(){
    echo '<style>
        .reservation {
            background: '.$this->color_fb.';
        }
        .booking_room >h4 {
            color: '.$this->color_tt.';
        }
        .booking_room >p{
            color: '.$this->color_st.';
        }
        .booking_room {
            background: '.$this->color_tb.';  
            background-image: url('. $this->bgImage .')no-repeat center center;
            background-size: 100%;
        }
        input#checkin-picker, input#checkout-picker, select#wh-adults, select#wh-children {
            background: none;
            border: none;
            border-bottom: 1px solid '.$this->color_ft.';
        }
        .span1_of_1 > h5, .book_date, .book_date >input, .section_room >select, .phoneRes >a {
            color: '.$this->color_ft.';
        }
        input.btn-booking {
            color: '.$this->color_bt.';
            background: '.$this->color_bb.';         
        }
        </style>';
    }

    function admin_page() 
    {        
        require_once plugin_dir_path( __FILE__ ). 'templates/admin.php'; 
    }    
}

if (class_exists('AristechBooking')) {
    $aristechBooking =new AristechBooking();
    $aristechBooking->register();
}

//activate
require_once plugin_dir_path( __FILE__ ). 'inc/aristech-booking-activate.php';
register_activation_hook( __FILE__, array('AristechBookingActivate', 'activate') );

//deactivate
require_once plugin_dir_path( __FILE__ ). 'inc/aristech-booking-deactivate.php';
register_deactivation_hook( __FILE__, array('AristechBookingDeactivate', 'deactivate') );

