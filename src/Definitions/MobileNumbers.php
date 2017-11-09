<?php


namespace Juanparati\MobileNumbers\Definitions;

use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;



abstract class MobileNumbers implements MobileNumbersContract
{

    /**
     * Country code according to ISO 3166-1 alpha-2.
     *
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
     * @var string
     */
    protected $country_alpha_code;


    /**
     * International prefix code (Without the "+" and "00" characters).
     *
     * @see https://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-E.164C-2011-PDF-E.pdf
     * @var string
     */
    protected $country_code;


    /**
     * Country flag.
     *
     * @see https://unicode.org/emoji/charts/full-emoji-list.html#country-flag
     * @var string
     */
    protected $country_flag;


    /**
     * Valid prefix codes (Do not mistake with International prefix codes).
     *
     * @var array
     */
    protected $valid_prefix_codes = [];


    /**
     * Validates a mobile phone number.
     *
     * @param string $number
     * @return bool
     */
    public function isValid($number) : bool
    {
        return $this->validate($number);
    }


    /**
     * Strip the international prefix code.
     *
     * @param $number
     * @return string
     */
    public function stripCountryCode($number) : string
    {
        $prefix = '+' . $this->country_code;

        if (strpos($number, $prefix) === 0)
            return substr($number, strlen($prefix));

        $prefix = '00' . $this->country_code;

        if (strpos($number, $prefix) === 0)
            return substr($number, strlen($prefix));

        return $number;
    }


    /**
     * Check if number has a valid international prefix.
     *
     * @param $number
     * @return bool
     */
    public function hasValidCountryCode($number) : bool
    {
        return $this->stripCountryCode($number) !== $number;
    }


    /**
     * Add the country code prefix to the mobile phone number.
     *
     * @param $number
     * @return string
     */
    public function addCountryCode($number): string
    {
        if ($this->hasValidCountryCode($number))
            return $number;

        return '+' . $this->country_code . $number;
    }


    /**
     * Validate phone number.
     *
     * @param $number
     * @return bool
     */
    protected function validate($number) : bool
    {
        // Remove international prefix code.
        $number = $this->stripCountryCode($number);

        foreach ($this->valid_prefix_codes as $prefix_code => $lengths)
        {
            if (strpos($number, (string) $prefix_code) === 0)
            {
                $number_length = strlen($number) - strlen($prefix_code);

                if ($number_length >= $lengths['min'] && $number_length <= $lengths['max'])
                    return true;
            }
        }

        return false;
    }

}