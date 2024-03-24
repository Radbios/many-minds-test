<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoggerService
{
    static public function log($level, $title, $message)
    {
        if(Auth::check()){
            $message = "[AUTH] [" . Auth::user()->id . " - " . Auth::user()->role->name . "] " . $message;
        }

        $message = "[" . $title . "] " . $message;

        Log::channel('system')->$level($message);
    }
}
