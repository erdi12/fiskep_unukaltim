<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriLabPgpaud;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GaleriLabPgpaudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foto_galeri_lab_pgpaud = GaleriLabPgpaud::all();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view('back.galerilabpgpaud.index', compact('foto_galeri_lab_pgpaud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foto_galeri_lab_pgpaud = GaleriLabPgpaud::all();

        return view('back.galerilabpgpaud.create', compact('foto_galeri_lab_pgpaud'));
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
            'foto_galeri' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
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
        $data['foto_galeri'] = $request->file('foto_galeri')->store('galerilabpgpaud');

        GaleriLabPgpaud::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('galerilabpgpaud.index');
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
        $foto_galeri_lab_pgpaud = GaleriLabPgpaud::find($id);

        return view('back.galerilabpgpaud.edit', compact('foto_galeri_lab_pgpaud'));
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
            'foto_galeri' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (empty($request->file('foto_galeri'))) {
            $foto_galeri_lab_pgpaud = GaleriLabPgpaud::find($id);
            $foto_galeri_lab_pgpaud->update([
                'foto_galeri' => $request->foto_galeri,
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('galerilabpgpaud.index');
        } else {
            $uploadedFile = $request->file('foto_galeri');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'foto_galeri' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $foto_galeri_lab_pgpaud = GaleriLabPgpaud::find($id);
            Storage::delete($foto_galeri_lab_pgpaud->foto_galeri);
            $foto_galeri_lab_pgpaud->update([
                'foto_galeri' => $request->file('foto_galeri')->store('galerilabpgpaud')
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');
            
            return redirect()->route('galerilabpgpaud.index')->with(['success' => 'Data Berhasil Diupdate']);
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
        $foto_galeri_lab_pgpaud = GaleriLabPgpaud::find($id);

        Storage::delete($foto_galeri_lab_pgpaud->foto_galeri);

        $foto_galeri_lab_pgpaud->delete();

        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');

        return redirect()->route('galerilabpgpaud.index');

    }
}
