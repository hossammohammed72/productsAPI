<?php

namespace Tests\Unit;

use App\Filters\EqualsFilter;
use App\Filters\LessThanFilter;
use App\Filters\MoreThanFilter;
use PHPUnit\Framework\TestCase;

class FiltersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLessThanFilterReturnsTrueForLessThanTest()
    {
        $value = 15;
        $comparedValue = 10;
        $this->assertTrue(LessThanFilter::filterRecord($value,$comparedValue));
    }
    public function testLessThanFilterReturnsFalseForMoreThanTest()
    {
        $value = 10;
        $comparedValue = 15;
        $this->assertFalse(LessThanFilter::filterRecord($value,$comparedValue));
    }
    public function testLessThanFilterReturnsTrueForEqualTest()
    {
        $value = 10;
        $comparedValue = 10;
        $this->assertTrue(LessThanFilter::filterRecord($value,$comparedValue));
    }
    public function testMoreThanFilterReturnsTrueForMoreThanTest()
    {
        $value = 10;
        $comparedValue = 15;
        $this->assertTrue(MoreThanFilter::filterRecord($value,$comparedValue));
    }
    public function testMoreThanFilterReturnsFalseForMoreThanTest()
    {
        $value = 15;
        $comparedValue = 10;
        $this->assertFalse(MoreThanFilter::filterRecord($value,$comparedValue));
    }
    public function testMoreThanFilterReturnsTrueForEqualTest()
    {
        $value = 10;
        $comparedValue = 10;
        $this->assertTrue(MoreThanFilter::filterRecord($value,$comparedValue));
    }
    public function testEqualsFilterReturnsTrueForEqualTest()
    {
        $value = 10;
        $comparedValue = 10;
        $this->assertTrue(EqualsFilter::filterRecord($value,$comparedValue));
    }

    public function testEqualsFilterReturnsFalseForNotEqualTest()
    {
        $value = 10;
        $comparedValue = 11;
        $this->assertFalse(EqualsFilter::filterRecord($value,$comparedValue));
    }
}
