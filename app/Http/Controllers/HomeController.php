<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use AuthorizesRequests;

    public function index() {
        return view('home.inicio');
    }
}
