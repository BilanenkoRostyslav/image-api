<?php

namespace App\DTO\Interface;
interface CommandTaskParamDTO
{
    /**
     * @return array<string, string|int>
     */
    public function toArray(): array;
}