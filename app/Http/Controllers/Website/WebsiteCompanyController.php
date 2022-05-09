<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Subcategory;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteCompanyController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();

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

        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.company.home', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'companies' => $companies,
            'website' => $website
        ));
    }

    public function show($categoryUrl, $subcategoryUrl, $companyUrl)
    {
        $categories = Category::select('id', 'name', 'url')->orderBy('name', 'asc')->get()->all();

        $subcategories = Subcategory::select('id', 'name', 'url', 'category_id')
            ->orderBy('name', 'asc')->get()->all();

        $highlights = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
            ->orderBy('name', 'asc')->get()->all();

        $company = Company::where('url', $companyUrl)->get()->first();
        $categoryFind = Category::where('url', $categoryUrl)->get()->first();
        $subcategoryFind = Subcategory::where('url', $subcategoryUrl)->get()->first();

        foreach ($highlights as $companyShow) {
            $category_name = Category::select('url')->where('id', $companyShow['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $companyShow['subcategory_id'])->get()->first();

            $companyShow['category'] = $category_name['url'];
            $companyShow['subcategory'] = $subcategory_name['url'];
        }

        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.company.show', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'company' => $company,
            'categoryFind' => $categoryFind,
            'subcategoryFind' => $subcategoryFind,
            'website' => $website
        ));
    }
}
