<?php


namespace Juanparati\MobileNumbers\Definitions\Tests;

use Juanparati\MobileNumbers\Tests\BaseTest;


class SETest extends BaseTest
{

    /**
     * Country code.
     *
     * @var string country
     */
    protected $country = 'SE';


    /**
     * Mobile numbers to test.
     *
     * @var array
     */
    protected $test_valid_numbers = [
        '0702344020',
        '0736314054',
        '0727106552',
        '+46737322066',
        '0046767169315',
        '0767271727',
        '0790130413'
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
        ['with' => '+46737322066' , 'without' => '0737322066'],
        ['with' => '0046737322066', 'without' => '0737322066'],
    ];

}