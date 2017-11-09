<?php


namespace Juanparati\MobileNumbers\Definitions;

use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;


class MobileNumbersES extends MobileNumbers implements MobileNumbersContract
{

    /**
     * Country code according to ISO 3166-1 alpha-2.
     *
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
     * @var string
     */
    protected $country_alpha_code = 'ES';


    /**
     * International prefix code (Without the "+" and "00" characters).
     *
     * @var string
     */
    protected $country_code = '34';


    /**
     * Country flag.
     *
     * @see https://unicode.org/emoji/charts/full-emoji-list.html#country-flag
     * @var string
     */
    protected $country_flag = "🇪🇸";


    /**
     * Valid prefix codes (Do not mistake with country codes).
     * It includes the minimum and maximum lengths excluding the prefix codes).
     *
     * @var array
     */
    protected $valid_prefix_codes = [
        '6'      => ['min' => 8, 'max' => 8],
        '71'     => ['min' => 7, 'max' => 7],
        '72'     => ['min' => 7, 'max' => 7],
        '73'     => ['min' => 7, 'max' => 7],
        '74'     => ['min' => 7, 'max' => 7],
        '75'     => ['min' => 7, 'max' => 7],
        '76'     => ['min' => 7, 'max' => 7],
        '77'     => ['min' => 7, 'max' => 7],
        '78'     => ['min' => 7, 'max' => 7],
        '79'     => ['min' => 7, 'max' => 7],
    ];

}