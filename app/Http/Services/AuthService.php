<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Cache;

class AuthService
{
    static public function attemptsByIp($ip)
    {
        $count = Cache::get($ip, 0);
        $count += 1;
        Cache::put($ip, $count, 60);

        return $count > 3 ? false : true;
    }
}
