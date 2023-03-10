<?php

namespace App\Http\Controllers;

use App\Models\Flora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FloraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Floras=Flora::all();
        return view('options.flora.index',['floras'=>$Floras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('options.flora.create');
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
        $request->validate([
            'name'=>['required', 'min:2','max:100'],
            'number'=>['required'],
            'note'=>['required','max:255']
        ]);
        $flora=new Flora();
        $flora->name=$request->name;
        $flora->user_id=Auth::user()->id;
        $flora->number=$request->number;
        $flora->note=$request->note;

        $flora->save();
        return redirect()->route('flora.index');
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
        $flora=Flora::findorFail($id);
        $this->authorize('update', $flora);
        return view('options.flora.edit', ['flora'=>$flora]);
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
        $flora=Flora::findorFail($id);
        $request->validate([
            'name'=>['required'],

        ]);
        $flora->name=$request->name;
        $flora->number=$request->number;
        $flora->note=$request->note;

        $flora->update();

        return redirect()->route('flora.index')->with('updateMsg','Entry updated successfully');
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
        $flora=Flora::findorFail($id);
        $this->authorize('delete', $flora);
        $flora->delete();
        return redirect()->route('flora.index')->with('delMsg', 'Crop deleted successfully');
    }
}
