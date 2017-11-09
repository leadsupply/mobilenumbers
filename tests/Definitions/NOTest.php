<?php


namespace Juanparati\MobileNumbers\Definitions\Tests;

use Juanparati\MobileNumbers\Tests\BaseTest;


class NOTest extends BaseTest
{

    /**
     * Country code.
     *
     * @var string country
     */
    protected $country = 'NO';


    /**
     * Mobile numbers to test.
     *
     * @var array
     */
    protected $test_valid_numbers = [
        '47338711',
        '97132164',
        '46431562',
        '+4797132164',
        '004798192768',
        '46969740',
        '581234567890',
        '+47581234567890'
    ];


    /**
     * Wrong mobile numbers to test.
     *
     * @var array
     */
    protected $test_invalid_numbers = [
        '12345678',
        '57338711',
        '464315623',
        '+226513644850',
        '0047591234567',
        '7371631402'
    ];


    /**
     * Mobile numbers with and without prefix.
     *
     * @var array
     */
    protected $test_prefix_numbers = [
        ['with' => '+4797132164' , 'without' => '97132164'],
        ['with' => '004798192768', 'without' => '98192768'],
    ];

}