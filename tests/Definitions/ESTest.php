<?php


namespace Juanparati\MobileNumbers\Definitions\Tests;

use Juanparati\MobileNumbers\Tests\BaseTest;


class ESTest extends BaseTest
{

    /**
     * Country code.
     *
     * @var string country
     */
    protected $country = 'ES';


    /**
     * Mobile numbers to test.
     *
     * @var array
     */
    protected $test_valid_numbers = [
        '651364485',
        '666701475',
        '670862592',
        '+34674739862',
        '0034717163140',
        '737163140'
    ];


    /**
     * Wrong mobile numbers to test.
     *
     * @var array
     */
    protected $test_invalid_numbers = [
        '12345678',
        '702332233',
        '6513644850',
        '+226513644850',
        '0034702342344',
        '7371631402'
    ];


    /**
     * Mobile numbers with and without prefix.
     *
     * @var array
     */
    protected $test_prefix_numbers = [
        ['with' => '+34670862595' , 'without' => '670862595'],
        ['with' => '0034670862595', 'without' => '670862595'],
        ['with' => '+34770862595' , 'without' => '770862595']
    ];

}