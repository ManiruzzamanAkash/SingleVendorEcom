<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'website_name',
        'website_logo',
        'website_footer_text',
        'email',
        'phone',
        'address',
        'shipping_cost',
        'notice',
        'info',
    ];

    public static function defaultSettings()
    {
        // Insert data for settings
        $data = [
            'website_name'        => 'The KINGSMAN',
            'website_logo'        => 'logo.png',
            'favicon'             => 'logo.png',
            'website_footer_text' => '@copy; 2021 all rights reserved',
            'email'               => 'info@kingsman.com',
            'phone'               => '01951233084',
            'address'             => 'Dhaka',
            'notice'              => null,
            'info'                => json_encode([
                'order' => [
                    'shipping_cost' => 50,
                ],
                'social' => [
                    'facebook'  => 'https://facebook.com/website',
                    'twitter'   => 'https://twitter.com/website',
                    'instagram' => 'https://instagram.com/website',
                    'linkedin'  => 'https://linkedin.com/website',
                    'pinterest' => 'https://pinterest.com/website',
                    'youtube'   => 'https://youtube.com/website'
                ],
                'theme' => [
                    'base_theme' => 'light', // default, dark
                    'slider' => [
                        'single_slider'      => true,
                        'enable_two_buttons' => false
                    ],
                    'header_menu' => [
                        'enable_all_category'    => true,
                        'enable_single_category' => false
                    ]
                ],
                'currency' => [
                    'currency_code' => 'BDT',
                    'currency_symbol' => '৳',
                    'activeCurrency' => [
                        'decimal'               => 2, // if 2 => 22.52, if 4 => 22.5245
                        'decimal_separator'     => '.',
                        'thousands_separator'     => ',',
                    ],
                ],
            ]),
        ];

        return $data;
    }

    protected $appends = ['website'];

    public function getWebsiteAttribute() {
        return json_decode($this->info);
    }

    public static function getSettings() {
        return Setting::first();
    }
}
