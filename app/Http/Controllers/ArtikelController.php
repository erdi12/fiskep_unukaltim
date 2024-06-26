<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::latest('created_at')->get();

        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);

        return view ('back.artikel.index', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view ('back.artikel.create', compact('kategori'));
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
            'judul' => 'required|min:4',
            'gambar_artikel' => 'image|nullable|max:2048',
        ]);

        if ($request->hasFile('gambar_artikel')) {
            $uploadedFile = $request->file('gambar_artikel');

            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                // 'gambar_artikel' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }
        }

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        if( Auth::check()){
            $data['user_id'] = Auth::id();
        }
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');

        Artikel::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $artikel = Artikel::findOrFail($id);

        // $artikel->increment('views');
        // return view('front.artikel.detail-artikel', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();

        return view('back.artikel.edit', [
            'artikel' => $artikel,
            'kategori' => $kategori
        ]);
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
            'body' => 'required',
            // 'gambar_artikel' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
            'kategori_id' => 'required',
            'is_active' => 'required'
        ]);

        if (empty($request->file('gambar_artikel'))) {
            $artikel = Artikel::find($id);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
                'views' => 0
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('artikel.index');
        } else {
            $uploadedFile = $request->file('gambar_artikel');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'gambar_artikel' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
                'views' => 0,
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel')
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('artikel.index');
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
        $artikel = Artikel::find($id);

        Storage::delete($artikel->gambar_artikel);

        $artikel->delete();

        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');

        return redirect()->route('artikel.index');
    }
}
