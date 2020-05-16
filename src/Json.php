<?php
declare(strict_types=1);

namespace Xoubaman\Json;

use JsonException;

final class Json
{
    /** @var string */
    private $input;
    /** @var array */
    private $decoded;
    /** @var string */
    private $error;
    /** @var int */
    private $errorCode;

    public function __construct(string $input)
    {
        try {
            $this->input     = $input;
            $this->decoded   = self::decode($input);
            $this->error     = '';
            $this->errorCode = JSON_ERROR_NONE;
        } catch (JsonException $ex) {
            $this->error     = $ex->getMessage();
            $this->errorCode = $ex->getCode();
        }
    }

    /**
     * @throws JsonException
     */
    public static function decode(string $json): array
    {
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     * @var mixed $input
     */
    public static function encode($input): string
    {
        return json_encode($input, JSON_THROW_ON_ERROR);
    }

    public function isValid(): bool
    {
        return $this->errorCode === JSON_ERROR_NONE;
    }

    public function input(): string
    {
        return $this->input;
    }

    public function asArray(): array
    {
        if ($this->decoded === null) {
            throw new \RuntimeException('Not valid JSON cannot be decoded');
        }

        return $this->decoded;
    }

    public function error(): string
    {
        return $this->error;
    }

    public function errorCode(): int
    {
        return $this->errorCode;
    }
}
