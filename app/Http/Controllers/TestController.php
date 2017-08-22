<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Settisizer\Settisizable;

class TestController extends Controller
{
    use Settisizable;

    public function test() {
        $this->setSetting('name', 'hansi');
    }
}
