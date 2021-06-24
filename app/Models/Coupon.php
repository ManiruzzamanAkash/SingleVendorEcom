<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    public $fillable = [
        'title',
        'code',
        'description',
        'is_order_discount',
        'discount_amount',
        'direct_amount_or_percentage',
        'total_quantity',
        'valid_date'
    ];

    /**
     * isValid()
     *
     * @param String $coupon_code
     * @return boolean Return true if coupon is valid, false otherwise
     */
    public static function isValid($coupon_code)
    {
        $coupon = Coupon::where('valid_date', '>=', date('Y-m-d'))->where('code', $coupon_code)->first();
        if(!is_null($coupon)){
            if(is_null($coupon->total_quantity)){
                return true;
            }else{
                if ($coupon->total_quantity > 0) {
                    return true;
                }else{
                    return false;
                }
            }
        }
        return false;
    }
    
    /**
     * getCoupon
     *
     * @param string $coupon_code
     * @return Object Coupon Object or none
     */
    public static function getCoupon($coupon_code)
    {
        if (Coupon::isValid($coupon_code)) {
            return Coupon::where('code', $coupon_code)->first();
        }else{
            return null;
        }
    }

    /**
     * getDiscountAmount()
     * 
     * Return the total discount amount based on that coupon criteria
     *
     * @param String $coupon_code
     * @param Float $total_items
     * @param Float $total_price
     * @return Float
     */
    public static function getDiscountAmount($coupon_code, $total_items, $total_price, $check_validity=true)
    {
        $discount_amount = 0;
        if ($check_validity) {
            $coupon = Coupon::getCoupon($coupon_code);
        }else{
            $coupon = Coupon::where('code', $coupon_code)->first();
        }
        
        if (!is_null($coupon)) {
            
            $coupon_order_or_item = $coupon->is_order_discount;
            $direct_amount_or_percentage = $coupon->direct_amount_or_percentage;
            $discount_amount_applied = $coupon->discount_amount;

            if ($coupon_order_or_item) {
                // Coupon For Order Product
                if($total_price >= $coupon->criteria_amount){
                    if($direct_amount_or_percentage){
                        $discount_amount = $discount_amount_applied;
                    }else{
                        $discount_amount = (float) $total_price * $discount_amount_applied / 100;
                    }
                }
            }else{
                // Total Item Buy Coupon
                if($total_items >= $coupon->criteria_amount){
                    
                    if($direct_amount_or_percentage){
                        
                        $discount_amount = $discount_amount_applied;
                    }else{
                        $discount_amount = (float) $total_price * $discount_amount_applied / 100;
                    }
                }
            }
        }
        return $discount_amount;
    } 

    
}
