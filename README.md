[![Build Status](https://travis-ci.org/juanparati/mobilenumbers.svg?branch=master)](https://travis-ci.org/juanparati/mobilenumbers)


MobileNumbers
=============


## What is it?

A library that validate and parse mobile phone numbers.

Right now only phone numbers from the following countries are validated:

|Country|Code|
|:-------|----|
|Spain   | ES |
|Denmark | DK |
|Norway  | NO |
|Poland  | PL |
|Sweden  | SE |
|Finland | FI |

Feel free to to fork this project and add new countries.


## How it works

Validate a phone number:

        Validator::country('ES')->isValid('651365485');
        


It is possible to validate phone numbers that contains the international country code:
        
        Validator::country('DK')->isValid('+4560514180');
        Validator::country('SE')->isValid('0046767164315');
        

The library provides helper that convert different phone number formats to E.164:

        $validator = Validator::country('PL');
        $raw_number = '(669) 823-955';
        
        $e164_number = $validator->helper->convertToE164($mobile_number);   // Convert number to "669823955"
        echo $validator->isValid($e164_number) ? 'Valid!' : 'Not Valid!');
        
        
        $validator = Validator::country('SE');
        $raw_number = '(+46) 7 37322 0-66';
        
        $e164_number = $validator->helper->convertToE164($mobile_number);   // Convert number to "+46737322066"
        echo $validator->isValid($e164_number) ? 'Valid!' : 'Not Valid!');
                
        
It is also possible to add a valid country code to number without country code:

        Validator::country('SE')->addCountryCode('0737321066');    // +46737321066
        Validator::country('DK')->addCountryCode('60515290');      // +4560515290
        
        Validator::country('DK')->addCountryCode('+4560515290');   // +4560515290  (Country code is not added again)
        Validator::country('DK')->addCountryCode('004560515290');  // 004560515290 (Country code is not added again)
                 
        

or stripe the country code

        Validator::country('SE')->stripCountryCode('0046737321066');   // 0737321066
        Validator::country('FI')->stripCountryCode('00358411234567');  // 0411234567
        Validator::country('ES')->stripCountryCode('+34670862595');    // 670862595
        

Other methods:

        Validator::countr('ES')->helper->hasCountryCode('0030670862595'); // True
        Validator::country('ES')->hasValidCountryCode('0030670862595');  // False


## Definitions list

Using the helper method "getAllDefinitions" it will obtain the information about the all the codes used in all the definitions:

        $definitions = Helper::getAllDefinitions();

The definitions include country prefix code, country code and country flag information.


## Identify phone numbers

Using the helper method "identifyNumber" is possible the identify the country which belongs the phone number.
The phone number should contains the international prefix.

Example:

        Helper::identifyNumber('+4560514180');  // Returns DK
        

## Add your country definition

1. Fork this project
2. Add a new definition into ./src/Definitions
3. Add a new unit test into ./tests/Definitions

## Backers and contributors

- [Matchbanker.fi](https://matchbanker.fi) (Backer)
