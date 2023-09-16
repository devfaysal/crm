<?php
namespace App\Services;

use Automattic\WooCommerce\Client;

class WoocommerceService
{
    public $techplatoon;

    public $enterprise;

    public function __construct()
    {
        $this->techplatoon = new Client(
            env('TECHPLATOON_BASE_URL'),
            env('TECHPLATOON_KEY'),
            env('TECHPLATOON_SECRET'),
            [
                'version' => 'wc/v3',
                'verify_ssl' => false
            ]
        );

        $this->enterprise = new Client(
            env('ENTERPRISE_BASE_URL'),
            env('ENTERPRISE_KEY'),
            env('ENTERPRISE_SECRET'),
            [
                'version' => 'wc/v3',
                'verify_ssl' => false
            ]
        );
    }
}