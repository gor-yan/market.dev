<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('home.welcome');
    }
}
