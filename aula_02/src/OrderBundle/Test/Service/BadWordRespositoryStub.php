<?php


namespace OrderBundle\Test\Service;

use OrderBundle\Repository\BadWordsRepositoryInterface;

Class BadWordRespositoryStub implements BadWordsRepositoryInterface
{

    public function findAllAsArray()
    {
        return ['bobo','chule','besta'];
    }
}