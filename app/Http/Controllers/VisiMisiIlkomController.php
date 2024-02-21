<?php

namespace App\Http\Controllers;

use App\Models\VisiMisiIlkom;
use Illuminate\Http\Request;

class VisiMisiIlkomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisiilkom = VisiMisiIlkom::all();

        return view('back.vismisiilkom.index', compact('visimisiilkom'));
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
        $visimisiilkom = VisiMisiIlkom::findOrFail($id);

        return view('back.vismisiilkom.edit', compact('visimiilkom'));
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
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required'
        ]);

        $visimisiilkom = VisiMisiIlkom::findOrFail($id);

        $visimisiilkom->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan
        ]);

        return redirect()->route('vismisiilkom.index')->with(['success' => 'Data Berhasil Diupdate']);
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
