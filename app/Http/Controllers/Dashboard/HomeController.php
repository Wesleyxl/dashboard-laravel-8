<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Email;
use App\Models\WebsiteSettings;
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

        //Detect special conditions devices
        $iPod    = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
        $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
        $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
        $webOS   = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");

        //do something with this information
        if ($iPod || $iPhone) {
            //browser reported as an iPhone/iPod touch -- do something here
            return "<h1 style='margin: 20px auto'>Iphone</h1>";
        } else if ($iPad) {
            //browser reported as an iPad -- do something here
            return "<h1 style='margin: 20px auto'>Ipad</h1>";
        } else if ($Android) {
            //browser reported as an Android device -- do something here
            return "<h1 style='margin: 20px auto'>Android</h1>";
        } else if ($webOS) {
            //browser reported as a webOS device -- do something here
            return "<h1 style='margin: 20px auto'>WenOs</h1>";
        } else {
            return "<h1 style='margin: 20px auto'>Sei lá</h1>";
        }


        // $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        // foreach ($notifications as $notification) {
        //     $notification['time'] = static::runningTime($notification['created_at']);
        // }

        // $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        // $company = count(Company::select('id')->get()->all());
        // $category = count(Category::select('id')->get()->all());
        // $email = count(Email::select('id')->where('status', 'inbox')->get()->all());

        // return view('dashboard.home.home', array(
        //     'company' => $company,
        //     'email' => $email,
        //     'category' => $category,
        //     'notifications' => $notifications,
        //     'website' => $website
        // ));
    }
}
