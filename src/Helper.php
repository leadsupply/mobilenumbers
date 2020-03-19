<?php


namespace Juanparati\MobileNumbers;


use HaydenPierce\ClassFinder\ClassFinder;

class Helper
{

    /**
     * Internal cache used by getAllDefinitions.
     *
     * @var array|null
     */
    protected static $definitions_cache = null;


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
     * Obtain all the available definitions.
     *
     * @return array
     * @throws \Exception
     */
    public static function getAllDefinitions() : array
    {
        // Reflection is very expensive, so it's a good idea to use a static cache.
        if (static::$definitions_cache)
            return static::$definitions_cache;

        $classes = ClassFinder::getClassesInNamespace('Juanparati\MobileNumbers\Definitions');

        $classes = array_filter($classes, function ($class) {
           return preg_match('/^Juanparati\\\\MobileNumbers\\\\Definitions\\\\MobileNumbers[A-Z][A-Z]$/', $class);
        });

        static::$definitions_cache = array_map(function ($class) {
            return (new $class)->getDefinition();
        }, $classes);

        return static::$definitions_cache;
    }
}
