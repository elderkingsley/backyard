<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentralController extends Controller
{
        public function centralIndex ()
    {
        return view('central.index');
    }
}
