<?php


namespace Juanparati\MobileNumbers;


use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;


/**
 * Class Register.
 *
 * @package Juanparati\MobileNumbers
 */
class Register
{

    /**
     * Default MobileNumber classes.
     *
     * @var array
     */
    protected static $defaults =
    [
        'DK' => \Juanparati\MobileNumbers\Definitions\MobileNumbersDK::class,
        'ES' => \Juanparati\MobileNumbers\Definitions\MobileNumbersES::class,
        'FI' => \Juanparati\MobileNumbers\Definitions\MobileNumbersFI::class,
        'NO' => \Juanparati\MobileNumbers\Definitions\MobileNumbersNO::class,
        'PL' => \Juanparati\MobileNumbers\Definitions\MobileNumbersPL::class,
        'SE' => \Juanparati\MobileNumbers\Definitions\MobileNumbersSE::class,
    ];


    /**
     * Register a new MobileNumber class.
     *
     * @param string $country_code
     * @param MobileNumbersContract $definition
     */
    public static function register(string $country_code, MobileNumbersContract $definition) : void
    {
        static::$defaults[strtoupper($country_code)] = $definition;
    }


    /**
     * Unregister a MobileNumber class.
     *
     * @param string $country_code
     */
    public static function unregister(string $country_code) : void
    {
        unset(static::$defaults[strtoupper($country_code)]);
    }


    /**
     * Check if MobileNumber class was registered.
     *
     * @param string $country_code
     * @return bool
     */
    public static function isDefined(string $country_code) : bool
    {
        return isset(static::$defaults[strtoupper($country_code)]);
    }


    /**
     * Obtain the MobileNumber class.
     *
     * @param string $country_code
     * @return string|null
     */
    public static function get(string $country_code) : ?string
    {
        return static::isDefined($country_code) ? static::$defaults[strtoupper($country_code)] : null;
    }


    /**
     * Obtain all the registered MobileNumber classes.
     *
     * @return MobileNumbersContract[]
     */
    public static function getAll() : array
    {
        return static::$defaults;
    }

}
