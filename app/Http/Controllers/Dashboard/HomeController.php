<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Email;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = count(Company::select('id')->get()->all());
        $category = count(Category::select('id')->get()->all());
        $email = count(Email::select('id')->where('status', 'inbox')->get()->all());

        return view('dashboard.home.home', array(
            'company' => $company,
            'email' => $email,
            'category' => $category
        ));
    }
}
