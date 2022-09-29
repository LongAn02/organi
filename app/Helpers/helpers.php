<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

if (!function_exists('randomTime')) {
    function randomTime() {
        $date = Carbon::now()->toArray();
        $str = strtoupper(Str::random(5));
        return $str.substr($date['micro'],1,6);
    }
}
