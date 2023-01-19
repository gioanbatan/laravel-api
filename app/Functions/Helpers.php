<?php

namespace App\Functions;

use Illuminate\Support\Str;

class Helpers
{
    public static function generateSlug($textToSlug)
    {
        return Str::slug($textToSlug, '-');
    }
}
