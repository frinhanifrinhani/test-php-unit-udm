<?php


class DiscountCalculatorTest
{

    public function ShoudApply_WhenValueIsAboveTheMinimumTest(){

        $discountCalculator = new DiscountCalculator();

        $totalValue = 130;
        $totalWithDiscount = $discountCalculator->apply($totalValue);

        $expectedValue = 100;
        $this->assertEquals($expectedValue,$totalWithDiscount);

    }

    public function assertEquals ($expectedValue, $actualValue){

        try {
           $this->compareValue($expectedValue,$actualValue);
        }catch (Exception $e){
            echo 'Message: ' .$e->getMessage(). "\n";
        }

        echo "Test passed! \n";

    }

    public function compareValue($expectedValue,$actualValue){
        if($expectedValue !== $actualValue){
            $message =  "\n".'Expected: ' . $expectedValue . ' but got: ' . $actualValue;
            throw new Exception($message);
        }
        return true;
    }

}