<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('dashboard.website.create', array(
            'website' => $website
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
        if (WebsiteSettings::edit($request->all(), $id)) {
            return redirect()->back()->with('success', 'Seus dados foram atualizados com sucesso!');
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
        //
    }
}
