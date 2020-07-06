<?php


namespace OrderBundle\Test\Service;


use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function hasBadWords()
    {
        $badWordRepository = new BadWordRespositoryStub();

        $badWordsValidator = new BadWordsValidator($badWordRepository);

        $hasBadword = $badWordsValidator->hasBadWords('seu restaurante é muito bobo');

        $this->assertEquals(true, $hasBadword);
    }
}