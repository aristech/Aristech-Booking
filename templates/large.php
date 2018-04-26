<div class="form-wrapper">
    <div class="online_reservation">
                <form id="checkinout" action="<?php echo $this->booking_url ?>" target="_blank">
                    <input type="hidden" name="checkin">
                    <input type="hidden" name="checkout">
                    
                    
                        
                        <div class="reservation">
                            <div class="booking_room">
                                <h4><?php echo $this->title ?></h4>
                                <p><?php echo $this->text ?></p>
                            </div>
                            
                                
                            <div  class="span1_of_1 left">
                                <h5>check-in-date:</h5>
                                <div class="book_date">
                                    
                                <input type="text" id="checkin-picker" placeholder="dd mmm yyyy">
                                <i class="fa fa-calendar in" aria-hidden="true"></i>
                                                                    

                                </div>					
                            </div>
                            <div  class="span1_of_1 left">
                                <h5>check-out-date:</h5>
                                <div class="book_date">
                                    
                                <input type="text" id="checkout-picker" placeholder="dd mmm yyyy">
                                <i class="fa fa-calendar out" aria-hidden="true"></i>
                                    
                                </div>		
                            </div>
                            <div class="span1_of_1 left">
                                <h5>Adults:</h5>
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
                            <div class="span1_of_1 left">
                                <h5>Children:</h5>
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
                            <div class="span1_of_1 submit-btn">

                                    <input class="btn-booking" type="submit" value="<?php echo $this->btn ?>" />
                                    <div class="number">
                                        <span class="phoneRes" data-phone="'.$tel.'" data-url="'.$booking_url.'">
                                            <a href="tel:<?php echo $this->tel ?>" hidefocus="true" style="outline: none;"><i class="fa fa-phone" aria-hidden="true"></i>
                                            <?php echo $this->tel ?>
                                            </a>  
                                        </span>
                                    </div>

              
                            </div>
                              
                            
                        </div>
                    
                </form>
            </div>
<<<<<<< HEAD
            </div>        
=======
            </div>'
>>>>>>> 320a0a1e894fb028c70ba180a76fd24ba2384a91
