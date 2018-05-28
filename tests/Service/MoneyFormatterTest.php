<?php


namespace App\Tests\Service;


use App\Service\MoneyFormatter;
use App\Service\NumberFormatter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function testFormatEur()
    {
        /** @var NumberFormatter|MockObject $numberFormatterMock */
        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock
            ->expects($this->once())
            ->method('format')
            ->with(1000)
            ->willReturn('1 000');


        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $this->assertEquals('1 000 €', $moneyFormatter->formatEur(1000));
    }

    public function testFormatUsd()
    {
        /** @var NumberFormatter|MockObject $numberFormatterMock */
        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock
            ->expects($this->once())
            ->method('format')
            ->with(1001)
            ->willReturn('1 001');

        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $this->assertEquals('$1 001', $moneyFormatter->formatUsd(1001));
    }
}