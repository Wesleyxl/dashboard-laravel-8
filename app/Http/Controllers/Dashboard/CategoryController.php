<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')
            ->paginate(10);
        return view('dashboard.category.home', array(
            'categories' => $categories
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $request['url'] = static::cleanUrl($request['name']);

        if (Category::create($request->all())) {
            return redirect('adm/categoria')->with('success', 'Categoria cadastrada com sucesso!');
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
        $category = Category::find($id);
        return view('dashboard.category.edit', array(
            'category' => $category
        ));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:256',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $request['url'] = static::cleanUrl($request['name']);

        if (Category::edit($request->all(), $id)) {
            return redirect('adm/categoria')->with('success', 'Categoria editada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        try {
            //code...
            $category->delete();
            return redirect()->back()->with('warning', 'Categoria deletada com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    public function search(Request $request)
    {
        $categories = Category::where('name', 'like', '%' . $request['data'] . "%")
            ->orWhere('description', 'like', '%' . $request['data'] . "%")
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('dashboard.category.search', array(
            'categories' => $categories
        ));
    }
}
