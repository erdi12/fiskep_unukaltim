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


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
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

        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Tersimpan']);

        // percobaan ke 2
        // $this->validate($request, [
        //     'judul' => 'required|min:4',
        //     'gambar_artikel' => 'image|nullable|max:512',
        // ]);
    
        // $data = $request->all();
        // $data['slug'] = Str::slug($request->judul);
    
        // if (Auth::check()) {
        //     $data['user_id'] = Auth::id();
        // }
    
        // $data['views'] = 0;
    
        // // Check file size before storing
        // $maxFileSize = 512 * 1024; // 512 KB
        // $uploadedFile = $request->file('gambar_artikel');
    
        // if ($uploadedFile && $uploadedFile->getSize() > $maxFileSize) {
        //     return redirect()->back()->withInput()->withErrors(['gambar_artikel' => 'Ukuran file gambar terlalu besar. Maksimum 512 KB.']);
        // }
    
        // $data['gambar_artikel'] = $uploadedFile->store('artikel');
    
        // Artikel::create($data);
    
        // return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Tersimpan']);


        // Percobaan Ke 3
        // $validator = Validator::make($request->all(), [
        //     'judul' => 'required|min:4',
        //     'gambar_artikel' => 'image|nullable|max:512',
        // ]);
    
        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
    
        // $data = $request->all();
        // $data['slug'] = Str::slug($request->judul);
    
        // if (Auth::check()) {
        //     $data['user_id'] = Auth::id();
        // }
    
        // $data['views'] = 0;
    
        // // Check file size before storing
        // $maxFileSize = 512 * 1024; // 512 KB
        // $uploadedFile = $request->file('gambar_artikel');
    
        // if ($uploadedFile && $uploadedFile->getSize() > $maxFileSize) {
        //     return redirect()
        //         ->back()
        //         ->withErrors(['gambar_artikel' => 'Ukuran file gambar terlalu besar. Maksimum 512 KB.'])
        //         ->withInput();
        // }
    
        // $data['gambar_artikel'] = $uploadedFile->store('artikel');
    
        // Artikel::create($data);
    
        // return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Tersimpan']);
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
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'views' => 0
            ]);
            return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Diupdate']);
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
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'views' => 0,
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel')
            ]);
            return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Diupdate']);
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

        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
