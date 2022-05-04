<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteAboutController extends Controller
{
    public function index()
    {
        return view('pages.about.home');
    }
}