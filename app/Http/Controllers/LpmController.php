<?php

namespace App\Http\Controllers;

use App\Models\Lpm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LpmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lpm = Lpm::all();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view('back.lpm.index', compact('lpm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.lpm.create');
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

        Lpm::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'link' => $request->link
        ]);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan!');

        return redirect()->route('lpm.index');
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
        $lpm = Lpm::findOrFail($id);
        return view('back.lpm.edit', compact('lpm'));
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
        $data['nama'] = Str::slug($request->nama);

        $lpm = Lpm::findOrFail($id);
        $lpm->update($data);

        Alert::success('Data Terupdate', 'Data Berhasil Diupdate!');

        return redirect()->route('lpm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lpm = Lpm::findOrFail($id);
        $lpm->delete();
        Alert::success('Data Terhapus', 'Data Berhasil Dihapus!');
        return redirect()->route('lpm.index');
    }
}
