<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class SuperAdminController extends Controller
{
    public function phpinfo()
    {
        return view('content.phpinfo');
    }

    public function useradmin()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
