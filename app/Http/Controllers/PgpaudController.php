<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pgpaud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PgpaudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pgpaud = Pgpaud::all();
        $pgpaudWithSpecificJabatan = Pgpaud::join('jabatan', 'pgpaud.jabatan_id', '=', 'jabatan.id')
                    ->orderByRaw("IF(jabatan.nama_jabatan = 'Dosen', 1, 0)")
                    ->orderByRaw("IF(jabatan.nama_jabatan = 'Dosen', pgpaud.nama, '')")
                    ->orderBy('jabatan.id')
                    ->get();
        $jabatan = Jabatan::all();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view('back.pgpaud.index', compact('pgpaud', 'jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pgpaud = Pgpaud::all();
        $jabatan = Jabatan::all();

        return view('back.pgpaud.create', compact('pgpaud', 'jabatan'));
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
        $data['foto'] = $request->file('foto')->store('pgpaud');

        Pgpaud::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('pgpaud.index');
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
        $pgpaud = Pgpaud::findOrFail($id);
        $jabatan = Jabatan::all();

        return view('back.pgpaud.edit', compact('pgpaud', 'jabatan'));
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
            $pgpaud = Pgpaud::findOrFail($id);
            $pgpaud->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('pgpaud.index');
        } else {
            $uploadedFile = $request->file('foto');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'foto' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $pgpaud = Pgpaud::find($id);
            Storage::delete($pgpaud->foto);
            $pgpaud->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id,
                'foto' => $request->file('foto')->store('pgpaud')
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('pgpaud.index');
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
        $pgpaud = Pgpaud::findOrFail($id);

        Storage::delete($pgpaud->foto);

        $pgpaud->delete();

        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');

        return redirect()->route('pgpaud.index');
    }
}
