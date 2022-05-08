<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Subcategory;

class WebsiteCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();

        $highlights = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
            ->orderBy('name', 'asc')
            ->get()
            ->all();

        foreach ($highlights as $company) {
            $category_name = Category::select('url')->where('id', $company['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $company['subcategory_id'])->get()->first();

            $company['category'] = $category_name['url'];
            $company['subcategory'] = $subcategory_name['url'];
        }

        return view('pages.category.home', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights
        ));
    }

    public function show($category)
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();

        $highlights = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
            ->orderBy('name', 'asc')
            ->get()
            ->all();


        $categoryFind = Category::select('id', 'name', 'url')->where('url', $category)->get()->first();
        $companies = Company::orderBy('name', "asc")->where('category_id', $categoryFind['id'])->get()->all();

        foreach ($highlights as $company) {
            $category_name = Category::select('url')->where('id', $company['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $company['subcategory_id'])->get()->first();

            $company['category'] = $category_name['url'];
            $company['subcategory'] = $subcategory_name['url'];
        }

        return view('pages.category.subcategory', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'companies' => $companies,
            'categoryFind' => $categoryFind
        ));
    }

    public function showSubcategory($category, $subcategory)
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();

        $highlights = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
            ->orderBy('name', 'asc')
            ->get()
            ->all();

        $categoryFind = Category::select('id', 'name', 'url')->where('url', $category)->get()->first();
        $subcategoryFind = Subcategory::select('id', 'name', 'url')->where('url', $subcategory)->get()->first();


        $companies = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'description')
            ->where('category_id', $categoryFind['id'])
            ->where('subcategory_id', $subcategoryFind['id'])
            ->get()->all();

        foreach ($highlights as $company) {
            $category_name = Category::select('url')->where('id', $company['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $company['subcategory_id'])->get()->first();

            $company['category'] = $category_name['url'];
            $company['subcategory'] = $subcategory_name['url'];
        }

        return view('pages.company.find', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'companies' => $companies,
            'categoryFind' => $categoryFind,
            'subcategoryFind' => $subcategoryFind
        ));
    }
}
