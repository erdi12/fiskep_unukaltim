<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklan = Iklan::all();
        
        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);
        
        return view('back.iklan.index', compact('iklan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iklan = Iklan::all();

        return view('back.iklan.create', compact('iklan'));
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
            'judul' => 'required|min::4',
        ]);

        if ($request->hasFile('gambar_iklan')) {
            $uploadedFile = $request->file('gambar_iklan');

            if ($uploadedFile->getSize() > 2048*1048) {
                return redirect()->back()->withInput()->withErrors([
                    'gambar_iklan' => 'Ukuram file gambar terlalu besar. Maksimum 2048 Kb.',
                ]);
            }
        }

        $data = $request->all();
        $data['gambar_iklan'] = $request->file('gambar_iklan')->store('iklan');

        Iklan::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('iklan.index');
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
        $iklan = Iklan::find($id);
        return view('back.iklan.edit', compact('iklan'));
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
            'judul' => 'required',
        ]);

        if (empty($request->file('gambar_iklan'))) {
            $iklan = Iklan::find($id);
            $iklan->update([
                'judul' => $request->judul,
                'link' => $request->link,
                'status' => $request->status,
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('iklan.index');
        } else {
            $uploadedFile = $request->file('gambar_iklan');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'gambar_iklan' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $iklan = Iklan::find($id);
            Storage::delete($iklan->gambar_iklan);
            $iklan->update([
                'judul' => $request->judul,
                'link' => $request->link,
                'status' => $request->status,
                'gambar_iklan' => $request->file('gambar_iklan')->store('iklan')
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('iklan.index');
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
