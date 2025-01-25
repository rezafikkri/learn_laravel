<?php

namespace App\Services;

class GoodMorningService
{
    public function goodMorning(string $name): string
    {
        return "Hello $name, Good morning";
    }
}
