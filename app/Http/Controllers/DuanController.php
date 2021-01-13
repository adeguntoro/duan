<?php

namespace App\Http\Controllers;

use App\Models\Duan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Duan::all();
        return view('duan.index', ['datas' => $data ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('duan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $flight = new Duan;

        $flight->name = $request->name;
        $flight->email = $request->email;
        $flight->alamat = $request->alamat;

        $flight->save();

        return redirect('/data')->with('status', 'User '.$request->name.' telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duan  $duan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Duan::findorfail($id); //Jika data tidak ada, akan error 404
        return view('duan.view', ['user' => $data ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Duan  $duan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Duan::findorfail($id); //Jika data tidak ada, akan error 404
        return view('duan.edit', ['user' => $data ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duan  $duan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        // return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $flight = Duan::find($id);

        $flight->name = $request->name;
        $flight->email = $request->email;
        $flight->alamat = $request->alamat;

        $flight->save();

        return redirect('/data')->with('status', 'User '.$id.' telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duan  $duan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Duan::destroy($id);
        // return view('duan.index')->with('status', 'User Dihapus!');
        return redirect('/data')->with('status', 'Contact deleted!');
    }
}
