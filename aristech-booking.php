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
        $this->plugin = plugin_basename( __FILE__ );
    }

    function register() {
        add_action('wp_enqueue_scripts', array($this, 'enqueueWp'));
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueAdmin'));
        add_action( 'admin_menu',array($this, 'aristech_admin_menu_option'));
        add_filter( "plugin_action_links_$this->plugin", array($this, 'settings_link'));
    } 

    public function settings_link($links){

        $settings_link = '<a href="admin.php?page=aristech_booking">Settings</a>';

        array_push($links, $settings_link);
        return $links;

    }

    function aristech_admin_menu_option() 
    {
        wp_enqueue_media();
        add_menu_page('Aristech Booking', 'Aristech Booking', 'manage_options', 'aristech_booking', 'aristech_scripts_page', 'dashicons-calendar-alt', 200);
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

//uninstall


require_once( plugin_dir_path( __FILE__ ) . '/templates/large.php');
require_once( plugin_dir_path( __FILE__ ) . '/templates/medium.php');
require_once( plugin_dir_path( __FILE__ ) . '/templates/small.php');








function booking_temps(){
    global $template1;
    global $template2;
    global $template3;
    $temps = array(
        "t1" =>  $template1,
        "t2" => $template2,
        "t3" => $template3
    );
    return $temps;
   
}

//styles

function my_custom_styles()
{
 echo '<style>
 .reservation {
     background: '.get_option( 'aristech_color_fb', '' ).';
 }
.booking_room >h4 {
    color: '.get_option( 'aristech_color_tt', '' ).';
}
.booking_room >p{
    color: '.get_option( 'aristech_color_st', '' ).';
}
.booking_room {
    background: '.get_option( 'aristech_color_tb', '' ).';  
    background-image: url(' . wp_get_attachment_image_src( get_option( 'aristech_image','' ), $size = 'full')[0].')no-repeat center center;
    background-size: 100%;
}
input#checkin-picker, input#checkout-picker, select#wh-adults, select#wh-children {

    background: none;
    border: none;
    border-bottom: 1px solid '.get_option( 'aristech_color_ft', '' ).';
}


.span1_of_1 > h5, .book_date, .book_date >input, .section_room >select, .phoneRes >a {
    color: '.get_option( 'aristech_color_ft', '' ).';
}
input.btn-booking {
    color: '.get_option( 'aristech_color_bt', '' ).';
    background: '.get_option( 'aristech_color_bb', '' ).';
    
}
    
}
 </style>';
}
add_action('wp_head', 'my_custom_styles', 100);

function aristech_booking() {
        
    $radio = get_option( 'aristech_radio', '' );

    $running_template = null;
    switch ($radio) {
        case 'large':
            $running_template = booking_temps()['t1'];    
            break;
        case 'medium':
            $running_template = booking_temps()['t2'];
            break;
        case 'small':
            $running_template = booking_temps()['t3'];
            break;    
        
        default:
            $running_template = booking_temps()['t1'];
            break;
    }
    
    return $running_template;

 }
 add_shortcode('aristech_booking', 'aristech_booking');


 function aristech_scripts_page() 
 {

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
        

    ?>
    <div id="setting-error-settings_updated" class="updated_settings_error notice is-dismissible"><strong>All settings saved</strong></div>

    <?php
    }

    $booking_url = get_option( 'aristech_booking_url', '' );
    $title = get_option( 'aristech_title', '' );
    $text = get_option( 'aristech_text', '' );
    $btn = get_option( 'aristech_btn', '' );
    $tel = get_option( 'aristech_tel', '' );
    $radio = get_option( 'aristech_radio', '' );
    $color_tt = get_option( 'aristech_color_tt', '#acacac' );
    $color_tb = get_option( 'aristech_color_tb', '#fff' );
    $color_st = get_option( 'aristech_color_st', '#acacac' );
    $color_sb = get_option( 'aristech_color_sb', '' );
    $color_ft = get_option( 'aristech_color_ft', '#acacac' );
    $color_fb = get_option( 'aristech_color_fb', '#fff' );
    $color_bt = get_option( 'aristech_color_bt', '#fff' );
    $color_bb = get_option( 'aristech_color_bb', '#acacac' );
    $name   = 'aristech_image';
    $width = 150;
    $height = 150;
    $options = get_option( $name,'' );
    
    $default_image = plugins_url('images/no-image.png', __FILE__);

    if ( !empty( $options ) ) {
        $image_attributes = wp_get_attachment_image_src( $options, array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options;
    } else {
        $src = $default_image;
        $value = '';
    }
    $large = '';
    $medium = '';
    $small = '';
    
    switch ($radio) {
        case 'large':
            $large = 'checked';   
            break;
        case 'medium':
            $medium = 'checked';
            break;
        case 'small':
            $small = 'checked';
            break;    
        
        default:
            $large = 'checked';
            break;
    }
    
       
    ?>
    <div class="wrap">
        <h2> General Settings For Your Booking Form </h2>
        <p>Shortcode to use <strong>[aristech_booking]</strong></p>
        <form method="post" action="">
        <label for="booking_url">Booking url</label>
        <textarea name="booking_url" class="large-text"><?php print $booking_url ?></textarea>
        <label for="title">Title</label>
        <textarea name="title" class="large-text"><?php print $title ?></textarea>
        <label for="text">Text</label>
        <textarea name="text" class="large-text"><?php print $text ?></textarea>
        <label for="btn">Button Text</label>
        <textarea name="btn" class="large-text"><?php print $btn ?></textarea>
        <label for="tel">Phone number</label>
        <textarea name="tel" class="large-text"><?php print $tel ?></textarea>
        <table class="widefat">
            <tbody>
                <tr >
                    
                    <h2 style="text-align:center;"> General Styling </h2>
                    
                </tr >
                <tr >
                    <td >
                    <label>Title Text Color</label>   
                    <input class="pickercolor" name="tit_txt" type="text" value="<?php echo $color_tt ?>" data-default-color="#acacac" />
                    </br>
                    </br>
                    </br>
                    <label>Title Background Color</label> 
                    <input class="pickercolor" name="tit_bg" type="text" value="<?php echo $color_tb ?>" data-default-color="#fff" />
                    </td>                   
                    <td >
                    <label>Subtext Text Color</label> 
                    <input class="pickercolor" name="sub_txt" type="text" value="<?php echo $color_st ?>" data-default-color="#acacac" />
                    </br>
                    </br>
                    </br>
                    <label>Image Background</label> 
                    <?php
                        echo '
                            <div class="upload">
                                <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
                                <div>
                                    <input type="hidden" name="aristech_image" id="aristech_image" value="' . $value . '" />
                                    <button type="submit" class="upload_image_button button"> Upload </button>
                                    <button type="submit" class="remove_image_button button">&times;</button>
                                </div>
                            </div>
                        ';
                        ?>
                    </td>                    
                    <td >
                    <label>Form Text Color</label> 
                    <input class="pickercolor" name="frm_txt" type="text" value="<?php echo $color_ft ?>" data-default-color="#acacac" />
                    </br>
                    </br>
                    </br>
                    <label>Form Background Color</label> 
                    <input class="pickercolor" name="frm_bg" type="text" value="<?php echo $color_fb ?>" data-default-color="#fff" />
                    </td>
                    <td >
                    <label>Button Text Color</label> 
                    <input class="pickercolor" name="btn_txt" type="text" value="<?php echo $color_bt ?>" data-default-color="#fff" />
                    </br>
                    </br>
                    </br>
                    <label>Button Background Color</label> 
                    <input class="pickercolor" name="btn_bg" type="text" value="<?php echo $color_bb ?>" data-default-color="#acacac" />
                    </td>                   
                </tr>
                <tr>
                    <td>
                    
                    </td>
                    
                </tr>    
            </tbody>
        </table>
        <table class="widefat">
            <tbody>
                <tr >
                    
                        <h2 style="text-align:center;"> Select form type</h2>
                    
                </tr >
                <tr >
                    <td >
                        <label for="large">Full size with text or logo</label>
                        <input type="radio" <?php echo $large ?> id="large" name="radio" value="large">
                    </td>
                    <td >
                        <label for="medium">Simple form with text on top</label>
                        <input type="radio" <?php echo $medium ?> id="medium" name="radio" value="medium">
                    </td>
                    <td >
                        <label for="small">Just the form</label>
                        <input type="radio" <?php echo $small ?> id="small" name="radio" value="small">
                    </td>
                </tr>
                
            </tbody>
        </table>
        
        <input type="submit" name="submit_scripts_update" class="button button-primary" value="Save"</input>
        </form>
    </div> 
    <?php
 }


?>
