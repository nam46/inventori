<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        $data = Home::get();
        return view('index', compact('data'));

    }
}
