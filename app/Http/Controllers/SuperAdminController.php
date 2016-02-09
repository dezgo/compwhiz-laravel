<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function phpinfo() {
        return view('content.phpinfo');
    }
}
