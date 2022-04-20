<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
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
        $companies = Company::orderBy('name', 'asc')
            ->paginate(10);

        foreach ($companies as $company) {
            $category_name = Category::select('id', 'name')
                ->where('id', $company['category_id'])->first();
            $company['category_name'] = $category_name['name'];
        }

        return view('dashboard.company.home', array(
            'companies' => $companies
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->all();
        return view('dashboard.company.create', array(
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
            'email' => 'required|string|email',
            'code' => 'string',
            'category' => 'required|string',
            'description' => 'required|string|min:3',
            'cep' => 'required|string',
            'uf' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'required|string',
            'street' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if (Company::create($request->all())) {
            return redirect('adm/empresa')->with('success', 'Empresa cadastrada com sucesso!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $categories = Category::get()->all();

        $category_name = Category::select('id', 'name')
            ->where('id', $company['category_id'])->first();

        $company['category_name'] = $category_name['name'];

        return view('dashboard.company.edit', array(
            'company' => $company,
            'categories' => $categories
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
            'email' => 'required|string|email',
            'code' => 'string',
            'category' => 'required|string',
            'description' => 'required|string|min:3',
            'cep' => 'required|string',
            'uf' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if (Company::edit($request->all(), $id)) {
            return redirect('adm/empresa')->with('success', 'Empresa editada com sucesso!');
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
        $company = Company::find($id);

        try {
            //code...
            $company->delete();
            return redirect()->back()->with('warning', 'Empresa deletada com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    public function search(Request $request)
    {
        $companies = Company::where('name', 'like', '%' . $request['data'] . "%")
            ->orWhere('code', 'like', '%' . $request['data'] . "%")
            ->orWhere('description', 'like', '%' . $request['data'] . "%")
            ->orderBy('name', 'asc')
            ->paginate(10);

        foreach ($companies as $company) {
            $category_name = Category::select('id', 'name')
                ->where('id', $company['category_id'])->first();
            $company['category_name'] = $category_name['name'];
        }

        return view('dashboard.company.search', array(
            'companies' => $companies
        ));
    }
}
