<?php


if ( !empty( $this->options ) ) {
    $image_attributes = wp_get_attachment_image_src( $this->options, array( $this->width, $this->height ) );
    $src = $image_attributes[0];
    $value = $this->options;
} else {
    $src = $this->default_image;
    $value = '';
}
$large = '';
$medium = '';
$small = '';

switch ($this->radio) {
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
    <textarea name="booking_url" class="large-text"><?php print $this->booking_url ?></textarea>
    <label for="title">Title</label>
    <textarea name="title" class="large-text"><?php print $this->title ?></textarea>
    <label for="text">Text</label>
    <textarea name="text" class="large-text"><?php print $this->text ?></textarea>
    <label for="btn">Button Text</label>
    <textarea name="btn" class="large-text"><?php print $this->btn ?></textarea>
    <label for="tel">Phone number</label>
    <textarea name="tel" class="large-text"><?php print $this->tel ?></textarea>
    <table class="widefat">
        <tbody>
            <tr >
                
                <h2 style="text-align:center;"> General Styling </h2>
                
            </tr >
            <tr >
                <td >
                <label>Title Text Color</label>   
                <input class="pickercolor" name="tit_txt" type="text" value="<?php echo $this->color_tt ?>" data-default-color="#acacac" />
                </br>
                </br>
                </br>
                <label>Title Background Color</label> 
                <input class="pickercolor" name="tit_bg" type="text" value="<?php echo $this->color_tb ?>" data-default-color="#fff" />
                </td>                   
                <td >
                <label>Subtext Text Color</label> 
                <input class="pickercolor" name="sub_txt" type="text" value="<?php echo $this->color_st ?>" data-default-color="#acacac" />
                </br>
                </br>
                </br>
                <label>Image Background</label> 
                <?php
                    echo '
                        <div class="upload">
                            <img data-src="' . $this->default_image . '" src="' . $src . '" width="' . $this->width . 'px" height="' . $this->height . 'px" />
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
                <input class="pickercolor" name="frm_txt" type="text" value="<?php echo $this->color_ft ?>" data-default-color="#acacac" />
                </br>
                </br>
                </br>
                <label>Form Background Color</label> 
                <input class="pickercolor" name="frm_bg" type="text" value="<?php echo $this->color_fb ?>" data-default-color="#fff" />
                </td>
                <td >
                <label>Button Text Color</label> 
                <input class="pickercolor" name="btn_txt" type="text" value="<?php echo $this->color_bt ?>" data-default-color="#fff" />
                </br>
                </br>
                </br>
                <label>Button Background Color</label> 
                <input class="pickercolor" name="btn_bg" type="text" value="<?php echo $this->color_bb ?>" data-default-color="#acacac" />
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

