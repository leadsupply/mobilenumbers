<?php

namespace Juanparati\MobileNumbers;



use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;
use Juanparati\MobileNumbers\Exceptions\ValidatorException;

/**
 * Validator helper class.
 *
 * @package Juanparati\MobileNumbers
 */
class Validator
{

    /**
     * @var MobileNumbersContract
     */
    protected $definition;


    /**
     * Helper instance.
     *
     * @var Helper
     */
    public $helper;


    /**
     * Validator constructor.
     *
     * @param $country_code
     * @throws ValidatorException
     */
    public function __construct($country_code)
    {
        $definition_class = Register::get($country_code);

        if (!$definition_class)
            throw new ValidatorException("Class definition for $country_code not found", 0);

        $this->definition = new $definition_class();

        $this->helper = Helper::class;
    }


    /**
     * Factory method.
     *
     * @param $country_code
     * @return static
     * @throws ValidatorException
     */
    public static function country($country_code) : Validator
    {
        return new static($country_code);
    }


    /**
     * Check if mobile phone number is valid.
     *
     * @param $number
     * @return bool
     */
    public function isValid($number) : bool
    {
        return $this->definition->isValid($number);
    }


    /**
     * Strip the international prefix code.
     *
     * @param $number
     * @return string
     */
    public function stripCountryCode($number) : string
    {
        return $this->definition->stripCountryCode($number);
    }


    /**
     * Check if number has a valid international prefix.
     *
     * @param $number
     * @return bool
     */
    public function hasValidCountryCode($number) : bool
    {
        return $this->definition->hasValidCountryCode($number);
    }


    /**
     * Add the country code prefix to the mobile phone number.
     *
     * @param $number
     * @return string
     */
    public function addCountryCode($number) : string
    {
        return $this->definition->addCountryCode($number);
    }


    /**
     * Return definition info.
     *
     * @return array
     */
    public function getDefinition() : array
    {
        return $this->definition->getDefinition();
    }

}
