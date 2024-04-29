<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akademik = Akademik::all();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view('back.akademik.index', compact('akademik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.akademik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'link' => 'required|min:4'
        ]);

        Akademik::create([
            'nama' => $request->nama,
            'link' => $request->link
        ]);

        Alert::success('Sukses!', 'Data Berhasil Ditambah!');
        return redirect()->route('akademik.index');
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
        $akademik = Akademik::find($id);

        return view('back.akademik.edit', compact('akademik'));
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
        $data = $request->all();

        $akademik = Akademik::find($id);
        $akademik->update($data);

        Alert::success('Sukses!', 'Data Berhasil Diubah!');
        return redirect()->route('akademik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akademik = Akademik::find($id);

        $akademik->delete();

        Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        return redirect()->route('akademik.index');
    }
}
