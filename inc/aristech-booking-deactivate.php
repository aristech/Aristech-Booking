<?php
/**
 * @package AristechBooking
 */

 class AristechBookingDeactivate
 {
    public static function deactivate() {
        flush_rewrite_rules();
    }
 }