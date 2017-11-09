<?php


namespace Juanparati\MobileNumbers\Definitions;

use Juanparati\MobileNumbers\Definitions\Contracts\MobileNumbers as MobileNumbersContract;


class MobileNumbersDK extends MobileNumbers implements MobileNumbersContract
{

    /**
     * Country code according to ISO 3166-1 alpha-2.
     *
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
     * @var string
     */
    protected $country_alpha_code = 'DK';


    /**
     * International prefix code (Without the "+" and "00" characters).
     *
     * @var string
     */
    protected $country_code = '45';


    /**
     * Country flag.
     *
     * @see https://unicode.org/emoji/charts/full-emoji-list.html#country-flag
     * @var string
     */
    protected $country_flag = "🇩🇰";


    /**
     * Valid prefix codes (Do not mistake with country codes).
     * It includes the minimum and maximum lengths excluding the prefix codes).
     *
     * @var array
     */
    protected $valid_prefix_codes = [
        '2'      => ['min' => 7, 'max' => 7],
        '30'     => ['min' => 6, 'max' => 6],
        '40'     => ['min' => 6, 'max' => 6],
        '41'     => ['min' => 6, 'max' => 6],
        '42'     => ['min' => 6, 'max' => 6],
        '51'     => ['min' => 6, 'max' => 6],
        '52'     => ['min' => 6, 'max' => 6],
        '53'     => ['min' => 6, 'max' => 6],
        '60'     => ['min' => 6, 'max' => 6],
        '61'     => ['min' => 6, 'max' => 6],
        '71'     => ['min' => 6, 'max' => 6],
        '81'     => ['min' => 6, 'max' => 6],
        '91'     => ['min' => 6, 'max' => 6],
        '92'     => ['min' => 6, 'max' => 6],
        '93'     => ['min' => 6, 'max' => 6],
    ];

}