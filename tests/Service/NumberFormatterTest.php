<?php

namespace App\Tests\Service;


use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    public function getConvertData()
    {
        return [
            [1835480, '1.84M'],
            [1834999, '1.83M'],
            [1009999, '1.01M'],
            [1000001, '1.00M'],
            [1000000, '1.00M'],
            [999999, '1.00M'],
            [999500, '1.00M'],
            [999499.99, '999K'],
            [999499, '999K'],
            [100999, '101K'],
            [100499.99, '100K'],
            [99950, '100K'],
            [99949.99, '99 950'],
            [99949, '99 949'],
            [1000.99, '1 001'],
            [1000, '1 000'],
            [999.9999, '1 000'],
            [999.9998, '1 000'],
            [999.999, '1 000'],
            [999.9950, '1 000'],
            [999.9949, '999.99'],
            [999.992, '999.99'],
            [999.99, '999.99'],
            [999.989, '999.99'],
            [999.98, '999.98'],
            [999.945, '999.95'],
            [999.94, '999.94'],
            [999.9, '999.90'],
            [999.1, '999.10'],
            [999, '999.00'],
            [500, '500.00'],
            [500.1, '500.10'],
            [55.55555, '55.56'],
            [1, '1.00'],
            [0.1, '0.10'],
            [0.01, '0.01'],
            [0, '0.00'],
            [-0.01, '-0.01'],
            [-0.1, '-0.10'],
            [-1, '-1.00'],
            [-55.55555, '-55.56'],
            [-500.1, '-500.10'],
            [-500, '-500.00'],
            [-999, '-999.00'],
            [-999.1, '-999.10'],
            [-999.9, '-999.90'],
            [-999.94, '-999.94'],
            [-999.945, '-999.95'],
            [-999.98, '-999.98'],
            [-999.989, '-999.99'],
            [-999.99, '-999.99'],
            [-999.992, '-999.99'],
            [-999.999, '-1 000'],
            [-999.9998, '-1 000'],
            [-999.9999, '-1 000'],
            [-1000, '-1 000'],
            [-1000.99, '-1 001'],
            [-99949, '-99 949'],
            [-99950, '-100K'],
            [-100999, '-101K'],
            [-999499, '-999K'],
            [-999500, '-1.00M'],
            [-999999, '-1.00M'],
            [-1000000, '-1.00M'],
            [-1000001, '-1.00M'],
            [-1009999, '-1.01M'],
            [-1834999, '-1.83M'],
            [-1835480, '-1.84M']
            ];
    }

    /**
     * @dataProvider getConvertData
     */
    public function testFormat($number, $expected)
    {
        $formatter = new NumberFormatter();
        $result = $formatter->format($number);
        $this->assertEquals($expected, $result);
    }
}