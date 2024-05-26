<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function flashMessage($type, $message)
    {
        flash()->options([
            'timeout' => 3000,
            'position' => 'bottom-right',
        ])->$type($message);
    }
}
