<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Email;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::orderBy('id', 'desc')
            ->where('status', 'inbox')
            ->where('read', 1)
            ->paginate(10);

        $unreads = Email::orderBy('id', 'desc')
            ->where('read', 0)
            ->where('status', 'inbox')
            ->get()->all();

        return view('dashboard.email.home', array(
            'emails' => $emails,
            'unreads' => $unreads
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.send', array(
            'unread' => $unread
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
            'from' => 'required|string',
            'to' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }


        if (Email::create($request->all())) {
            return redirect('/adm/email')->with('success', 'Email cadastrado com sucesso');
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
        $email = Email::find($id);
        $email['read'] = 1;
        $email->save();

        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.show', array(
            'email' => $email,
            'unread' => $unread
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Email::find($id);
        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.edit', array(
            'email' => $email,
            'unread' => $unread
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
        $email = Email::find($id);

        try {
            //code...
            $email->delete();
            return redirect()->back()->with('warning', 'Email deletado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sketch()
    {
        $emails = Email::where('status', 'sketch')->get()->all();
        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.sketch', array(
            'emails' => $emails,
            'unread' => $unread
        ));
    }
}
