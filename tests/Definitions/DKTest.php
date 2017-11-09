<?php


namespace Juanparati\MobileNumbers\Definitions\Tests;

use Juanparati\MobileNumbers\Tests\BaseTest;


class DKTest extends BaseTest
{

    /**
     * Country code.
     *
     * @var string country
     */
    protected $country = 'DK';


    /**
     * Mobile numbers to test.
     *
     * @var array
     */
    protected $test_valid_numbers = [
        '23714550',
        '41461716',
        '60515180',
        '+4560514180',
        '004523724750',
        '28257667',
    ];


    /**
     * Wrong mobile numbers to test.
     *
     * @var array
     */
    protected $test_invalid_numbers = [
        '70461749',
        '+1023714750',
        '282576660',
        '004623714750',
        '0034702342344',
        '004577410010'
    ];


    /**
     * Mobile numbers with and without prefix.
     *
     * @var array
     */
    protected $test_prefix_numbers = [
        ['with' => '+4560515190' , 'without' => '60515190'],
        ['with' => '004523714751', 'without' => '23714751'],
    ];

}