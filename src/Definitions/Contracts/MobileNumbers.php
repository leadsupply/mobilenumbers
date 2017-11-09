<?php

namespace Juanparati\MobileNumbers\Definitions\Contracts;


interface MobileNumbers
{

    /**
     * Validate phone number.
     *
     * @param $number       string
     * @return bool
     */
    public function isValid($number) : bool;


    /**
     * Validate if phone number has a valid international prefix.
     *
     * @param $number
     * @return bool
     */
    public function hasValidCountryCode($number) : bool;


    /**
     * Stripe the phone number.
     *
     * @param $number
     * @return string
     */
    public function stripCountryCode($number) : string;


    /**
     * Add the country code to a number.
     *
     * @param $number
     * @return string
     */
    public function addCountryCode($number) : string;


}