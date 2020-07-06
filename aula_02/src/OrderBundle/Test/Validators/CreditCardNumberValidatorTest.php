<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardNumberValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {

        $creditCardNumberValidator = new CreditCardNumberValidator($value);

        $isValid = $creditCardNumberValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);

    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsACreditCard' => ['value' => 5448280000000007,'expectedResult' => true],
            'shouldBeValidWhenValueIsACreditCardAsString' => ['value' => '5448280000000007','expectedResult' => true],
            'shouldNotBeValidWhenValueIsNotACreditCardAsString' => ['value' => '123','expectedResult' => false],
            'shouldNotBeValidWhenValueIsEmpty' => ['value' => '','expectedResult' => false]
        ];
    }



}