<?php


class DiscountCalculatorTest
{

    public function ShoudApply_WhenValueIsAboveTheMinimum(){

        $discountCalculator = new DiscountCalculator();

        $totalValue = 130;
        $totalWithDiscount = $discountCalculator->apply($totalValue);

        $expectedValue = 100;
        $this->assertEquals($expectedValue,$totalWithDiscount);

    }

    public function assertEquals ($expectedValue, $actualValue){

        if($expectedValue != $actualValue){
            $message = 'Expected: ' . $expectedValue . ' but got: ' . $actualValue;
            throw \Exception($message);
        }

        echo "Test passed! \n";

    }

}