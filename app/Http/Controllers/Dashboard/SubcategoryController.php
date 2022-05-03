<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('name', 'asc')->paginate(10);

        foreach ($subcategories as $subcategory) {

            $category = Category::select('name')
                ->where('id', $subcategory['category_id'])->get()->first();

            $subcategory['category_name'] = $category['name'];
        }

        return view('dashboard.subcategory.home', array(
            'subcategories' => $subcategories
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get()->all();

        return view('dashboard.subcategory.create', array(
            'categories' => $categories
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:256',
            'category' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if (Subcategory::create($request->all())) {
            return redirect('adm/subcategoria')->with('success', 'Subcategoria cadastrada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $subcategories = Subcategory::where('name', 'like', '%' . $request['data'] . "%")
            ->orWhere('description', 'like', '%' . $request['data'] . "%")
            ->orderBy('name', 'asc')
            ->paginate(10);

        foreach ($subcategories as $subcategory) {

            $category = Category::select('name')
                ->where('id', $subcategory['category_id'])->get()->first();

            $subcategory['category_name'] = $category['name'];
        }

        return view('dashboard.subcategory.search', array(
            'subcategories' => $subcategories
        ));
    }
}
