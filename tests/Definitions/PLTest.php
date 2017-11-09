<?php


namespace Juanparati\MobileNumbers\Definitions\Tests;

use Juanparati\MobileNumbers\Tests\BaseTest;


class PLTest extends BaseTest
{

    /**
     * Country code.
     *
     * @var string country
     */
    protected $country = 'PL';


    /**
     * Mobile numbers to test.
     *
     * @var array
     */
    protected $test_valid_numbers = [
        '506547776',
        '669823955',
        '887225325',
        '+48536901731',
        '0048515516277',
        '667912549',
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
        '+485369017312',
        '0048115516277',
        '0667912549'
    ];


    /**
     * Mobile numbers with and without prefix.
     *
     * @var array
     */
    protected $test_prefix_numbers = [
        ['with' => '+48536901711' , 'without' => '536901711'],
        ['with' => '0048515516277', 'without' => '515516277'],
    ];

}