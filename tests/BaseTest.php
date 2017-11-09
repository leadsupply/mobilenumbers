<?php
namespace Juanparati\MobileNumbers\Tests;

use Juanparati\MobileNumbers\Validator;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{

    /**
     * Country code.
     *
     * @var string country
     */
    protected $country = '';


    /**
     * Mobile numbers to test.
     *
     * @var array
     */
    protected $test_valid_numbers = [];


    /**
     * Wrong mobile numbers to test.
     *
     * @var array
     */
    protected $test_invalid_numbers = [];


    /**
     * Mobile numbers with and without prefix.
     *
     * @var array
     */
    protected $test_prefix_numbers = [];


    /**
     * Check valid mobile phone numbers
     *
     * @group Juanparati.mobilenumbers
     */
    public function test_right_numbers()
    {
        $validator = Validator::country($this->country);

        foreach ($this->test_valid_numbers as $number)
            $this->assertTrue($validator->isValid($number), "Phone number: $number ({$this->country}) is invalid");
    }


    /**
     * Check invalid phone numbers
     *
     * @group Juanparati.mobilenumbers
     */
    public function test_wrong_numbers()
    {
        $validator = Validator::country($this->country);

        foreach ($this->test_invalid_numbers as $number)
            $this->assertFalse($validator->isValid($number), "Wrong phone number: $number ({$this->country}) is valid");
    }

    /**
     * Check invalid phone numbers
     *
     * @group Juanparati.mobilenumbers
     */
    public function test_prefix_numbers()
    {
        $validator = Validator::country($this->country);

        foreach ($this->test_prefix_numbers as $prefix_number)
        {
            $this->assertEquals($prefix_number['with']
                , $validator->addCountryCode($prefix_number['without'])
                , "Country code was not correctly added: {$prefix_number['with']} - {$prefix_number['without']}"
            );

            $this->assertEquals($prefix_number['without']
                , $validator->stripCountryCode($prefix_number['with'])
                , "Country code was not correctly stripped: {$prefix_number['with']} - {$prefix_number['without']}"
            );
        }
    }

}