<?php

namespace App\Http\Controllers;

use App\Models\Dekan;
use App\Models\Jabatan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DekanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dekan = Dekan::all();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view('back.dekan.index', compact('dekan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dekan = Dekan::all();
        $jabatan = Jabatan::all();

        return view('back.dekan.create', compact('dekan', 'jabatan'));
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
            'jabatan_id' => 'required',
        ]);

        if ($request->hasFile('foto_dekan')) {
            $uploadedFile = $request->file('foto_dekan');

            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                'foto_dekan' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }
        }

        $data = $request->all();
        $data['foto_dekan'] = $request->file('foto_dekan')->store('dekan');
        // $data['jabatan_id'] = $request->input('jabatan_id');

        Dekan::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('dekan.index');

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
        $dekan = Dekan::findOrFail($id);
        $jabatan = Jabatan::all();

        return view('back.dekan.edit', compact('dekan', 'jabatan'));
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

        if (empty($request->file('foto_dekan'))) {
            $dekan = Dekan::find($id);
            $dekan->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('dekan.index');
        } else {
            $uploadedFile = $request->file('foto_dekan');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'foto_dekan' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $dekan = Dekan::find($id);
            Storage::delete($dekan->foto_dekan);
            $dekan->update([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan_id,
                'foto_dekan' => $request->file('foto_dekan')->store('dekan')
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('dekan.index');
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
        $dekan = Dekan::find($id);

        Storage::delete($dekan->foto_dekan);

        $dekan->delete();

        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');

        return redirect()->route('dekan.index');
    }
}
