<?php
namespace App\Services;

class PriceRange
{
    private const TEN_MILLION = 10000000;

    public function calculatePriceRange(string $rangeOption){
       if ($rangeOption === 'range1') {
            return [self::TEN_MILLION, 4 * self::TEN_MILLION];
        } elseif ($rangeOption === 'range2') {
            return [4 * self::TEN_MILLION, 8 * self::TEN_MILLION];
        } elseif ($rangeOption === 'range3') {
            return [8 * self::TEN_MILLION, 12 * self::TEN_MILLION];
        } elseif ($rangeOption === 'range4') {
            return [12 * self::TEN_MILLION, 15 * self::TEN_MILLION];
        }elseif( $rangeOption === 'range5') {
            return [15 * self::TEN_MILLION, 20 * self::TEN_MILLION];
        }elseif ($rangeOption === 'range6') {
            return [20 * self::TEN_MILLION, 100 * self::TEN_MILLION];
        }
    }
}