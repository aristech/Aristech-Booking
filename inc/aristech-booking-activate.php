<?php
/**
 * @package AristechBooking
 */

 class AristechBookingActivate
 {
    public static function activate() {
        flush_rewrite_rules();
    }
 }
 