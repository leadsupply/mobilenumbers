<?php


namespace Juanparati\MobileNumbers\Definitions;

use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;


class MobileNumbersPL extends MobileNumbers implements MobileNumbersContract
{

    /**
     * Country code according to ISO 3166-1 alpha-2.
     *
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
     * @var string
     */
    protected $country_alpha_code = 'PL';


    /**
     * International prefix code (Without the "+" and "00" characters).
     *
     * @var string
     */
    protected $country_code = '48';


    /**
     * Country flag.
     *
     * @see https://unicode.org/emoji/charts/full-emoji-list.html#country-flag
     * @var string
     */
    protected $country_flag = "🇵🇱";


    /**
     * Valid prefix codes (Do not mistake with country codes).
     * It includes the minimum and maximum lengths excluding the prefix codes).
     *
     * @var array
     */
    protected $valid_prefix_codes = [
        '45'      => ['min' => 7, 'max' => 7],
        '50'      => ['min' => 7, 'max' => 7],
        '51'      => ['min' => 7, 'max' => 7],
        '53'      => ['min' => 7, 'max' => 7],
        '57'      => ['min' => 7, 'max' => 7],
        '60'      => ['min' => 7, 'max' => 7],
        '66'      => ['min' => 7, 'max' => 7],
        '69'      => ['min' => 7, 'max' => 7],
        '72'      => ['min' => 7, 'max' => 7],
        '73'      => ['min' => 7, 'max' => 7],
        '78'      => ['min' => 7, 'max' => 7],
        '79'      => ['min' => 7, 'max' => 7],
        '88'      => ['min' => 7, 'max' => 7],
    ];

}