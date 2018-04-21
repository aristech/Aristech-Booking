<?php
    $booking_url = get_option( 'aristech_booking_url', '' );
    $title = get_option( 'aristech_title', '' );
    $btn = get_option( 'aristech_btn', '' );
    $template2 = '<div class="form-wrapper">
    <div class="online_reservation medium">
                <form id="checkinout" action="' . $booking_url . '" target="_blank">
                    <input type="hidden" name="checkin">
                    <input type="hidden" name="checkout">
                    
                    
                        
                        <div class="reservation medium">
                            <div class="booking_room medium">
                                <span class="booking-light">' . $title . '</span>
                            </div>
                            
                            <div class="booking-wrapper">  
                                <span class="booking-light">from</span>
                                <div  class="span1_of_1 left medium">
                                    
                                    <div class="book_date medium">
                                        
                                    <input type="text" id="checkin-picker" placeholder="dd mmm yyyy">
                                    <!-- <i class="fa fa-calendar in" aria-hidden="true"></i> -->
                                                                        

                                    </div>					
                                </div>
                                <span class="booking-light">to</span>
                                <div  class="span1_of_1 left medium">
                                    
                                    <div class="book_date medium">
                                        
                                    <input type="text" id="checkout-picker" placeholder="dd mmm yyyy">
                                    <!-- <i class="fa fa-calendar out" aria-hidden="true"></i> -->
                                        
                                    </div>		
                                </div>
                                <span class="booking-light">for</span>
                                <div class="span1_of_1 left medium">
                                    
                                    <!-- start section_room -->
                                    <div class="section_room">
                                    <select id="wh-adults" name="adults">
                                        <option value="1">1 adult</option>
                                        <option value="2" selected>2 adults</option>
                                        <option value="3">3 adults</option>
                                        <option value="4">4 adults</option>
                                        <option value="5">5 adults</option>
                                        <option value="6">6 adults</option>
                                        <option value="7">7 adults</option>
                                    </select>
                                    </div>					
                                </div>
                                <span class="booking-light">and</span>
                                <div class="span1_of_1 left medium">
                                    
                                    <!-- start section_room -->
                                    <div class="section_room">
                                    <select id="wh-children" name="children">
                                        <option value="0">no children</option>
                                        <option value="1">1 child</option>
                                        <option value="2">2 children</option>
                                        <option value="3">3 children</option>
                                        <option value="4">4 children</option>
                                        <option value="5">5 children</option>
                                        <option value="6">6 children</option>
                                    </select>
                                    </div>					
                                </div>
                            </div>  
                            <div class="span1_of_1 submit-btn medium">

                                    <input class="btn-booking" type="submit" value="' . $btn . '" />
        
                            </div>
                              
                            
                        </div>
                    
                </form>
            </div>
            </div>';          