<?php


namespace Juanparati\MobileNumbers\Definitions;

use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;


class MobileNumbersSE extends MobileNumbers implements MobileNumbersContract
{

    /**
     * Country code according to ISO 3166-1 alpha-2.
     *
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
     * @var string
     */
    protected $country_alpha_code = 'SE';


    /**
     * International prefix code (Without the "+" and "00" characters).
     *
     * @var string
     */
    protected $country_code = '46';


    /**
     * Country flag.
     *
     * @see https://unicode.org/emoji/charts/full-emoji-list.html#country-flag
     * @var string
     */
    protected $country_flag = "🇸🇪";


    /**
     * Valid prefix codes (Do not mistake with country codes).
     * It includes the minimum and maximum lengths excluding the prefix codes).
     *
     * @var array
     */
    protected $valid_prefix_codes = [
        '070'      => ['min' => 7, 'max' => 7],
        '071'      => ['min' => 7, 'max' => 7],
        '072'      => ['min' => 7, 'max' => 7],
        '073'      => ['min' => 7, 'max' => 7],
        '076'      => ['min' => 7, 'max' => 7],
    ];


    /**
     * Strip the international prefix code.
     *
     * @param $number
     * @return string
     */
    public function stripCountryCode($number): string
    {
        $number_stripped = parent::stripCountryCode($number);

        return $number === $number_stripped ? $number : '0' . $number_stripped;
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

        // Remove the initial 0
        // @see: https://www.itu.int/dms_pub/itu-t/opb/sp/T-SP-E.164C-2011-PDF-E.pdf
        //
        // The '0' is used on all domestic calls, including in the same city, but is omitted when dialling
        // from other countries.

        return '+' . $this->country_code . substr($number, 1);
    }

}