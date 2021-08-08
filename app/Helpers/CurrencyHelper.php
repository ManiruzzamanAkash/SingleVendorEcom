<?php
namespace App\Helpers;

use App\Models\Setting;
use Exception;

class CurrencyHelper {

    public $activeCurrency;

    /**
     * Set the active currency after fetching from settings table
     */
    public function __construct() {
        $settings = Setting::getSettings();

        $this->activeCurrency = $settings->website->currency->active_currency;
    }

    /**
     * Format amount to active currency
     * 
     * @since 1.0.0
     *
     * @param float $amount
     * 
     * @return mixed $formattedAmount
     */
    public function formatAmount($amount) {
        $formattedAmount = $amount;

        $decimal             = $this->activeCurrency->decimal; // if 2 => 22.52, if 4 => 22.5245
        $decimal_seprator    = $this->activeCurrency->decimal_separator;
        $thousands_separator = $this->activeCurrency->thousands_separator;

        try {
            $formattedAmount = number_format((float) $amount, $decimal, $decimal_seprator, $thousands_separator);
        } catch (Exception $e) {
            // Be Silent
        }

        return $formattedAmount;
    }

}