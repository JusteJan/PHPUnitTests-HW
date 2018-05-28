<?php

namespace App\Service;


class NumberFormatter
{
    /**
     * @param float $number
     * @return string
     */
    public function format(float $number): string
    {
        if ((abs($number)/1000000 >= 0.9995)) {
            return $this->formatMillions($number);
        }
        if ((abs($number)/100000 >= 0.9995)) {
            return $this->formatHundredThousands($number);
        }
        if ((abs($number))/1000 >= 0.999995) {

            return $this->formatThousands($number);
        }

        return $this->formatLessThanThousands($number);
    }

    /**
     * @param float $number
     * @return string
     */
    private function formatMillions(float $number): string
    {
        $number = round($number, -4);
        $number = $number/1000000;
        $number = $this->addTrailingZeros($number);

        return $number . 'M';
    }

    /**
     * @param float $number
     * @return string
     */
    private function formatHundredThousands(float $number): string
    {
        $number = round($number, -3);
        $number = $number/1000;

        return $number . 'K';
    }

    /**
     * @param float $number
     * @return string
     */
    private function formatThousands(float $number): string
    {
        $number = round($number, 0);

        return substr_replace(''.$number, ' ', strlen(''.$number)-3, 0);
    }

    /**
     * @param float $number
     * @return string
     */
    private function formatLessThanThousands(float $number): string
    {
        $number = round($number, 2);
        $number = $this->addTrailingZeros($number);

        return $number;
    }

    /**
     * @param float $number
     * @return string
     */
    private function addTrailingZeros(float $number): string
    {
        $number = $number . '';
        $numberParts = explode('.', $number);
        if (count($numberParts) == 1) {
            $number = $number . '.00';
        } elseif (strlen($numberParts[1]) == 1) {
            $number = $number . '0';
        }

        return $number;
    }

    /**
     * @param float $number
     * @return bool
     */
    private function isThousandsException(float $number): bool
    {
        if (abs($number) > 999 && abs($number) < 999.9999 && round(abs($number), 2) == 1000) {
            return true;
        }

        return false;
    }

    /**
     * @param float $number
     * @return float
     */
    private function getDecimal(float $number): float
    {
        return $number - (int)$number;
    }
}