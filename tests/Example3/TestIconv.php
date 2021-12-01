<?php
declare(strict_types=1);

namespace Tests\Example3;

use App\Example3\Iconv;
use PHPUnit\Framework\TestCase;
use stdClass;

class TestIconv extends TestCase
{
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
}