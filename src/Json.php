<?php
declare(strict_types=1);

namespace Xoubaman\Json;

final class Json
{

    public static function decode(string $json): array
    {
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    /** @var object|mixed[] $input */
    public static function encode($input): string
    {
        return json_encode($input, JSON_THROW_ON_ERROR);
    }
}
