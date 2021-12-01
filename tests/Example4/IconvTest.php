<?php
declare(strict_types=1);

namespace Tests\Example4;

use App\Example3\Iconv;
use PHPUnit\Framework\TestCase;
use stdClass;

class IconvTest extends TestCase
{
    private const BAD_CHARSET = 'Windowsz-1251';

    /**
     * @dataProvider skippedDataProvider
     * @dataProvider dataProvider
     */
    public function testToUtf8($value, $expected): void
    {
        $result = Iconv::toUtf8($value);

        static::assertEquals($expected, $result);
    }

    /**
     * @dataProvider skippedDataProvider
     * @dataProvider dataProvider
     */
    public function testToCp1251($expected, $value): void
    {
        $result = Iconv::toCp1251($value);

        static::assertEquals($expected, $result);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testInvalidInCharset($value): void
    {
        $result = Iconv::convert(self::BAD_CHARSET, Iconv::UTF8, $value);

        static::assertEquals($value, $result);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testInvalidOutCharset($value): void
    {
        $result = Iconv::convert(Iconv::UTF8, self::BAD_CHARSET, $value);

        static::assertEquals($value, $result);
    }

    /**
     * Типы данных, которые будут конвертированы
     */
    public function dataProvider(): array
    {
        return [
            ['Тестовая строка', 'РўРµСЃС‚РѕРІР°СЏ СЃС‚СЂРѕРєР°'],
            [
                [
                    0 => 'Юнит тест',
                    1 => 'Тестовая строка',
                    'Юнит тест' => [
                        'key' => 'Тест',
                        0 => '',
                        1 => 123,
                    ],
                    2 => '!@#$%^&*()_+',
                    'key' => '123',
                ],
                [
                    0 => 'Р®РЅРёС‚ С‚РµСЃС‚',
                    1 => 'РўРµСЃС‚РѕРІР°СЏ СЃС‚СЂРѕРєР°',
                    'Р®РЅРёС‚ С‚РµСЃС‚' => [
                        'key' => 'РўРµСЃС‚',
                        0 => '',
                        1 => 123,
                    ],
                    2 => '!@#$%^&*()_+',
                    'key' => '123',
                ]
            ],
        ];
    }

    /**
     * Типы данных, которые не нуждаются в конвертации
     */
    public function skippedDataProvider(): array
    {
        return [
            [true, true],
            [false, false],
            [123456789, 123456789],
            [123456789.123, 123456789.123],
            [null, null],
            [new stdClass(), new stdClass()],
        ];
    }
}