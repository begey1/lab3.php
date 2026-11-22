<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\DataProcessor;
use App\Services\EntityService;
use PHPUnit\Framework\TestCase;

class Lab3Test extends TestCase
{
    public function testFindMinimumDigit(): void
    {
        $this->assertSame(0, DataProcessor::findMinimumDigit(1234076));
    }

    public function testSwapFirstAndLastWord(): void
    {
        $this->assertSame(
            'три два один',
            DataProcessor::swapFirstAndLastWord('один два три')
        );
    }

    public function testLatinLettersAreSorted(): void
    {
        $this->assertTrue(DataProcessor::areLatinLettersSorted('abcxyz'));
        $this->assertFalse(DataProcessor::areLatinLettersSorted('zyx'));
    }

    public function testApplyDiscount(): void
    {
        $this->assertSame(80.0, EntityService::applyDiscount(100.0, 20.0));
    }
}
