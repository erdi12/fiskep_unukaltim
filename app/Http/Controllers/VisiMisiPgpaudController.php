<?php

namespace App\Http\Controllers;

use App\Models\VisiMisiPgpaud;
use Illuminate\Http\Request;

class VisiMisiPgpaudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisipgpaud = VisiMisiPgpaud::all();

        return view('back.vismisipgpaud.index', compact('visimisipgpaud'));
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
        $visimisipgpaud = VisiMisiPgpaud::findOrFail($id);

        return view('back.vismisipgpaud.edit', compact('visimisipgpaud'));
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

        $visimisipgpaud = VisiMisiPgpaud::findOrFail($id);

        $visimisipgpaud->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan
        ]);

        return redirect()->route('visimisipgpaud.index')->with(['success' => 'Data Berhasil Diupdate']);
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
