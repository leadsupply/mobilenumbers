<?php

namespace Juanparati\MobileNumbers;


/**
 * Class Helper.
 *
 * @package Juanparati\MobileNumbers
 */
class Helper
{

    /**
     * Check if phone number has an international prefix code.
     *
     * @see https://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-OB.930-2009-OAS-PDF-E.pdf
     * @param $number
     * @return bool
     */
    public static function hasCountryCode($number) : bool
    {
        // Check that phone number starts with "+"
        if ($number[0] === '+' && strlen($number) > 4)
            return true;

        // Check that phone number starts with "00"
        if (strpos($number, '00') && strlen($number) > 5)
            return true;

        return false;
    }


    /**
     * Convert a phone number to E164 Standard
     *
     * @see https://en.wikipedia.org/wiki/E.164
     * @param $number
     * @return string
     */
    public static function convertToE164($number) : string
    {
        $number = trim($number);

        // E164 recommends "+" instead of "00"
        if (strpos($number, '00') === 0)
            return '+' . preg_replace('~\D~', '', substr($number, 2));

        if ($number[0] === '+')
            return '+' . preg_replace('~\D~', '', substr($number, 1));

        return preg_replace('~\D~', '', $number);
    }


    /**
     * Identify a phone number.
     *
     * @param string $number
     * @return string|null
     * @throws Exceptions\ValidatorException
     */
    public static function identifyNumber(string $number) : ?string
    {
        $codes = array_keys(Register::getAll());

        foreach ($codes as $country_code)
        {
            $validator = Validator::country($country_code);

            if ($validator->hasValidCountryCode($number) && $validator->isValid($number))
                return $country_code;
        }

        return null;
    }


    /**
     * Obtain all the available definitions.
     *
     * @return array
     * @throws \Exception
     */
    public static function getAllDefinitions() : array
    {
        $classes = Register::getAll();

        /** @var array $definitions */
        $definitions = array_map(function (string $class) {
            return (new $class)->getDefinition();
        }, $classes);

        return $definitions;
    }
}
