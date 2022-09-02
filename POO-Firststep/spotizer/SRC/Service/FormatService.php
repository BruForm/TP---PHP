<?php

namespace App\Service;

use \DateTime;

abstract class FormatService
{
    public static function formatPrice(float $priceIn, string $currency): string
    {
        switch ($currency) {
            case "€":
                $conversionRate = 1;
                $priceOut = number_format(($priceIn * $conversionRate), 2, ",", " ");
                break;
            case "$":
                $conversionRate = 1.09;
                $priceOut = number_format(($priceIn * $conversionRate), 2, ".", ",");
                break;
            case "£":
                $conversionRate = 0.86;
                $priceOut = number_format(($priceIn * $conversionRate), 2, ".", ",");
                break;
            default:
                $conversionRate = 1;
                $priceOut = number_format(($priceIn * $conversionRate), 2, ",", " ");
                break;
        }
        return $priceOut . " $currency";
    }

    public static function formatDuration(int $duration): string
    {
        if ($duration >= 3600) {
            return date("H:i:s", $duration);
        } else {
            return date("i:s", $duration);
        }
    }

    public static function formatDate(DateTime $date, string $format): string
    {
        return date_format($date, $format);

    }
}
