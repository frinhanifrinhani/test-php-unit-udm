<?php

namespace OrderBundle\Test\Entity;

use OrderBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;

class CostumerTest extends TestCase{

    /**
     * @test
     * @dataProvider customerAllowedDataProvider
    */
    public function isAllowedToOrder($isActive,$isBlocked,$expectedAlloed)
    {
        $customer = new Customer(
            $isActive,
            $isBlocked,
            'Thiago Frinhani',
            '+5561999995555'
        );

        $isAllowed = $customer->isAllowedToOrder();

        $this->assertEquals($expectedAlloed,$isAllowed);
    }

    public function customerAllowedDataProvider()
    {
        return [
            'shouldBeAllowedWhenIsActiveAndBlocked' => [
                'isActive' => true,
                'isBlocked' => false,
                'expectedAllowed' => true
            ],
            'shouldNotBeAllowedWhenActiveButIsBlocked' => [
                'isActive' => true,
                'isBlocked' => true,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActive' => [
                'isActive' => false,
                'isBlocked' => false,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActiveAndIsBlocked' => [
                'isActive' => false,
                'isBlocked' => true,
                'expectedAllowed' => false
            ],
        ];
    }
}
