<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteContactController extends Controller
{
    public function index()
    {
        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.contact.home', array(
            'website' => $website
        ));
    }
}
