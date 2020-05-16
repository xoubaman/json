<?php
declare(strict_types=1);

namespace Xoubaman\Json\Tests;

use JsonException;
use PHPUnit\Framework\TestCase;
use Xoubaman\Json\Json;

final class JsonTest extends TestCase
{
    private const VALID_JSON          = '{"I":"am", "valid":true}';
    private const NOT_VALID_JSON      = 'I am not a valid JSON';
    private const VALID_JSON_AS_ARRAY = [
        'I'     => 'am',
        'valid' => true
    ];

    /** @test */
    public function it_decodes_valid_json(): void
    {
        self::assertEquals(self::VALID_JSON_AS_ARRAY, Json::decode(self::VALID_JSON));
    }

    /** @test */
    public function it_fails_to_decode_invalid_json(): void
    {
        $this->expectException(JsonException::class);
        Json::decode(self::NOT_VALID_JSON);
    }
}
