<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MSFormController extends Controller
{
    public function index()
    {
        return view('multi-step-form');
    }
}
