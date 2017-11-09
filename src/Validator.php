<?php

namespace Juanparati\MobileNumbers;


use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;

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
     */
    public function __construct($country_code)
    {
        $definition_class = 'Juanparati\\MobileNumbers\\Definitions\\MobileNumbers' . strtoupper($country_code);
        $this->definition = new $definition_class();

        $this->helper = Helper::class;
    }


    /**
     * Factory method.
     *
     * @param $country_code
     * @return static
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