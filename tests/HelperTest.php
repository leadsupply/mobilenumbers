<?php
/**
 * Created by PhpStorm.
 * User: juanlago
 * Date: 08/11/2017
 * Time: 11.42
 */

namespace Juanparati\MobileNumbers\Tests;


use Juanparati\MobileNumbers\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{

    private $numbers =  [
        ['before' => '+34 (679) 386808', 'after' => '+34679386808', 'international_prefix' => true]
    ];


    /**
     * Test format conversion to e164 and international prefix detection.
     *
     * @group Juanparati.mobilenumbers
     */
    public function test_e164_format()
    {
        foreach ($this->numbers as $number)
        {
            $e164 = Helper::convertToE164($number['before']);

            $this->assertEquals($e164, $number['after']);
            $this->assertEquals($number['international_prefix'], Helper::hasCountryCode($e164));
        }

    }
}