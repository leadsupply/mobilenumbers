<?php


namespace Juanparati\MobileNumbers\Definitions\Tests;

use Juanparati\MobileNumbers\Tests\BaseTest;


class FITest extends BaseTest
{

    /**
     * Country code.
     *
     * @var string country
     */
    protected $country = 'FI';


    /**
     * Mobile numbers to test.
     *
     * @var array
     */
    protected $test_valid_numbers = [
        '0412312221',
        '+358412312221',
        '0451231221',
        '0501234567',
        '+358501234567'
    ];


    /**
     * Wrong mobile numbers to test.
     *
     * @var array
     */
    protected $test_invalid_numbers = [
        '12345678',
        '702332233',
        '06513644850',
        '+23737322066',
        '0034737322066',
        '7371631402',
        '+460737322066',
        '0780130213'
    ];


    /**
     * Mobile numbers with and without prefix.
     *
     * @var array
     */
    protected $test_prefix_numbers = [
        ['with' => '+358412312221' , 'without' => '0412312221'],
        ['with' => '00358501111111', 'without' => '0501111111'],
    ];

}