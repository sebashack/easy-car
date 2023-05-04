<?php

namespace Tests\Unit;

use App\Util\PriceRange;
use PHPUnit\Framework\TestCase;

class PriceRangeTest extends TestCase
{
    public function testCalculatePriceReturnsCorrectPriceForFirstRange()
    {
        $priceOption = 'range1';
        $priceRange = new PriceRange();
        $price = $priceRange->calculatePriceRange($priceOption);
        $this->assertEquals([10000000, 4 * 10000000], $price);
    }

    public function testCalculatePriceReturnsCorrectPriceForSecondRange()
    {
        $priceOption = 'range2';
        $priceRange = new PriceRange();
        $price = $priceRange->calculatePriceRange($priceOption);
        $this->assertEquals([10000000 * 4, 8 * 10000000], $price);
    }

    public function testCalculatePriceReturnsCorrectPriceForThirdRange()
    {
        $priceOption = 'range3';
        $priceRange = new PriceRange();
        $price = $priceRange->calculatePriceRange($priceOption);
        $this->assertEquals([10000000 * 8, 12 * 10000000], $price);
    }

    public function testCalculatePriceReturnsCorrectPriceForFourthtRange()
    {
        $priceOption = 'range4';
        $priceRange = new PriceRange();
        $price = $priceRange->calculatePriceRange($priceOption);
        $this->assertEquals([10000000 * 12, 15 * 10000000], $price);
    }

    public function testCalculatePriceReturnsCorrectPriceForFifthRange()
    {
        $priceOption = 'range5';
        $priceRange = new PriceRange();
        $price = $priceRange->calculatePriceRange($priceOption);
        $this->assertEquals([10000000 * 15, 20 * 10000000], $price);
    }

    public function testCalculatePriceReturnsCorrectPriceForSixthRange()
    {
        $priceOption = 'range6';
        $priceRange = new PriceRange();
        $price = $priceRange->calculatePriceRange($priceOption);
        $this->assertEquals([10000000 * 20, 100 * 10000000], $price);
    }

    public function testCalculatePriceReturnsCorrectPriceForNullRange()
    {
        $priceOption = 'null';
        $priceRange = new PriceRange();
        $price = $priceRange->calculatePriceRange($priceOption);
        $this->assertEquals(null, $price);
    }
}
