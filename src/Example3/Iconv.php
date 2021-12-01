<?php
declare(strict_types=1);

namespace App\Example3;

use function is_array;
use function is_string;

class Iconv
{
    public const UTF8 = 'utf-8';
    public const CP1251 = 'cp1251';

    private static function convertString(string $inCharset, string $outCharset, string $value): string
    {
        $encodedValue = iconv($inCharset, $outCharset, $value);

        return $encodedValue !== false ? $encodedValue : $value;
    }

    public static function toCp1251($value)
    {
        return self::convert(self::UTF8, self::CP1251, $value);
    }

    public static function toUtf8($value)
    {
        return self::convert(self::CP1251, self::UTF8, $value);
    }

    public static function convert(string $inCharset, string $outCharset, $value)
    {
        if (is_array($value)) {
            foreach ($value as $key => $val) {
                if (is_string($key)) {
                    unset($value[$key]);
                    $key = self::convertString($inCharset, $outCharset, $key);
                }
                $value[$key] = self::convert($inCharset, $outCharset, $val);
            }
        } elseif (is_string($value)) {
            $value = self::convertString($inCharset, $outCharset, $value);
        }

        return $value;
    }
}