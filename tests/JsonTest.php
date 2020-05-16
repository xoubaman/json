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

    /** @test */
    public function it_encodes_arrays(): void
    {
        self::assertEquals(self::VALID_JSON, Json::encode(self::VALID_JSON_AS_ARRAY));
    }

    /** @test */
    public function it_fails_to_encode_input_too_nested(): void
    {
        $this->expectException(JsonException::class);
        Json::encode($this->buildTooNestedObjectTree());
    }

    private function buildTooNestedObjectTree(): Doge
    {
        $currentLevel = new Doge();
        for ($i = 0; $i < 512; $i++) {
            $currentLevel = new Doge($currentLevel);
        }

        return $currentLevel;
    }
}
