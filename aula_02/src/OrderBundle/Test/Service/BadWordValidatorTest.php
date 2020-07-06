<?php


namespace OrderBundle\Test\Service;


use OrderBundle\Repository\BadWordsRepository;
use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordValidatorTest extends TestCase
{
    /**
     * @test
     * @dataProvider badWordsDataProvider
     */
    public function hasBadWords($badWordList,$text,$foundBadWords)
    {
        $badWordRepository = $this->createMock(BadWordsRepository::class);

        $badWordRepository->method('findAllAsArray')
            ->willReturn($badWordList);

        $badWordsValidator = new BadWordsValidator($badWordRepository);

        $hasBadword = $badWordsValidator->hasBadWords($text);

        $this->assertEquals($foundBadWords, $hasBadword);
    }

    public function badWordsDataProvider()
    {
        return [
            'shouldFindWhenHasBadWords' => [
                'badWordList' => ['bobo','chule','besta'],
                'text' => 'seu restaurante é muito bobo',
                'foundBadWords' => true
            ],
            'shouldNotFindWhenHasNoBadWords' => [
                'badWordList' => ['bobo','chule','besta'],
                'text' => 'trocar batata por salada',
                'foundBadWords' => false
            ],
            'shouldNotFindWhenTextIsEmpty' => [
                'badWordList' => ['bobo','chule','besta'],
                'text' => '',
                'foundBadWords' => false
            ],
            'shouldNotFindWhenBadWordListIsEmpty' => [
                'badWordList' => [],
                'text' => 'seu restaurante é muito bobo',
                'foundBadWords' => false
            ],
        ];
    }
}