<?php
declare(strict_types=1);

namespace Xoubaman\Json\Tests;

final class Doge
{
    /** @var Doge|null */
    public $subdoge;

    public function __construct(?Doge $subdoge = null)
    {
        $this->subdoge = $subdoge;
    }
}
