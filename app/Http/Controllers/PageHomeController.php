<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PageHomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
