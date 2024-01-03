<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * index for return welcome page
     *
     * @return View
     */
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }
}
