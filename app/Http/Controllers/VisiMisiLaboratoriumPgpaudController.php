<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisiLaboratoriumPgpaud;

class VisiMisiLaboratoriumPgpaudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisilaboratoriumpgpaud = VisiMisiLaboratoriumPgpaud::all();

        return view('back.visimisilaboratoriumpgpaud.index', compact('visimisilaboratoriumpgpaud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $visimisilaboratoriumpgpaud = VisiMisiLaboratoriumPgpaud::findOrFail($id);

        return view('back.visimisilaboratoriumpgpaud.edit', compact('visimisilaboratoriumpgpaud'));
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
        $this->validate($request, [
            'visi' =>'required',
            'misi' =>'required',
        ]);

        $visimisilaboratoriumpgpaud = VisiMisiLaboratoriumPgpaud::findOrFail($id);

        $visimisilaboratoriumpgpaud->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('visimisilaboratoriumpgpapud.index')->with(['success' => 'Data Berhasil Diupdate']);
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
