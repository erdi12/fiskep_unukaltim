<?php

namespace App\Http\Controllers;

use App\Models\Hi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hi = Hi::all();
        $hiWithSpecificJabatan = Hi::join('jabatan', 'hi.jabatan_id', '=', 'jabatan.id')
                    ->orderByRaw("IF(jabatan.nama_jabatan = 'Dosen', 1, 0)")
                    ->orderByRaw("IF(jabatan.nama_jabatan = 'Dosen', hi.nama, '')")
                    ->orderBy('jabatan.id')
                    ->get();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view('back.hi.index', compact('hi', 'hiWithSpecificJabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hi = Hi::all();
        $jabatan = Jabatan::all();

        return view('back.hi.create', compact('hi', 'jabatan'));
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
        $data['foto'] = $request->file('foto')->store('hi');

        Hi::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('hi.index');
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
        $hi = Hi::find($id);
        $jabatan = Jabatan::all();

        return view('back.hi.edit', compact('hi', 'jabatan'));
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
            $hi = HI::find($id);
            $hi->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('hi.index');
        } else {
            $uploadedFile = $request->file('foto');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'foto' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $hi = Hi::find($id);
            Storage::delete($hi->foto);
            $hi->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id,
                'foto' => $request->file('foto')->store('hi')
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('hi.index');
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
        $hi = Hi::find($id);

        Storage::delete($hi->foto);

        $hi->delete();

        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');

        return redirect()->route('hi.index');
    }
}
