<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Subcategory;

class WebsiteHomeController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')
            ->limit(12)
            ->get();

        $subcategories = Subcategory::select('id', 'name', 'category_id', 'url')
            ->orderBy('name', 'asc')
            ->get()
            ->all();

        $companies = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
            ->orderBy('name', 'asc')
            ->get()
            ->all();

        foreach ($companies as $company) {
            $category_name = Category::select('url')->where('id', $company['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $company['subcategory_id'])->get()->first();

            $company['category'] = $category_name['url'];
            $company['subcategory'] = $subcategory_name['url'];
        }

        return view('pages.home.home', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'companies' => $companies,
        ));
    }
}
