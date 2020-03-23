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


    /**
     * Test all definitions.
     *
     * @group Juanparati.mobilenumbers
     * @throws \Exception
     */
    public function test_definitions()
    {
        $definitions = Helper::getAllDefinitions();

        $this->assertNotEmpty($definitions);

        foreach ($definitions as $definition)
        {
            $this->assertArrayHasKey('country_alpha_code', $definition);
            $this->assertArrayHasKey('country_code', $definition);
            $this->assertArrayHasKey('country_flag', $definition);
            $this->assertArrayHasKey('valid_prefix_codes', $definition);
            $this->assertNotEmpty('valid_prefix_codes', $definition);

            foreach ($definition['valid_prefix_codes'] as $valid_prefix)
            {
                $this->assertArrayHasKey('min', $valid_prefix);
                $this->assertArrayHasKey('min', $valid_prefix);
            }
        }
    }


    /**
     * Test number identificator.
     *
     * @group Juanparati.mobilenumbers
     * @throws \Juanparati\MobileNumbers\Exceptions\ValidatorException
     */
    public function test_identify_number()
    {
        $this->assertEquals('DK', Helper::identifyNumber('+4560514180'));
        $this->assertEquals('ES', Helper::identifyNumber('0034717163140'));
        $this->assertEquals('FI', Helper::identifyNumber('+358501234567'));
        $this->assertNull(Helper::identifyNumber('34717163140'));
    }
}
