<?php

namespace App\Http\Controllers;

use App\Models\Ilkom;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class IlkomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ilkom = Ilkom::all();

        $ilkomWithSpecificJabatan = Ilkom::join('jabatan', 'ilkom.jabatan_id', '=', 'jabatan.id')
                    ->orderByRaw("IF(jabatan.nama_jabatan = 'Dosen', 1, 0)")
                    ->orderByRaw("IF(jabatan.nama_jabatan = 'Dosen', ilkom.nama, '')")
                    ->orderBy('jabatan.id')
                    ->orderBy('nama', 'asc')
                    ->get();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view('back.ilkom.index', compact('ilkom', 'ilkomWithSpecificJabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ilkom = Ilkom::all();
        $jabatan = Jabatan::all();

        return view('back.ilkom.create', compact('ilkom', 'jabatan'));
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
            'nidn' => 'required|min:8',
            'nama' => 'required',
            'jabatan_id' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $uploadedFile = $request->file('foto');

            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                'foto' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }
        }

        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('ilkom');

        Ilkom::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('ilkom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ilkom = Ilkom::findOrFail($id);
        $jabatan = Jabatan::all();

        return view('back.ilkom.edit', compact('ilkom', 'jabatan'));
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
            'nidn' => 'required|min:8',
            'nama' => 'required',
            'jabatan_id' => 'required',
        ]);

        if (empty($request->file('foto'))) {
            $ilkom = Ilkom::findOrFail($id);
            $ilkom->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('ilkom.index');
        } else {
            $uploadedFile = $request->file('foto');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'foto' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $ilkom = Ilkom::find($id);
            Storage::delete($ilkom->foto);
            $ilkom->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id,
                'foto' => $request->file('foto')->store('ilkom')
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('ilkom.index');
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
        $ilkom = Ilkom::findOrFail($id);

        Storage::delete($ilkom->foto);

        $ilkom->delete();

        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');

        return redirect()->route('ilkom.index');
    }
}
