<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\admin;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }
}
