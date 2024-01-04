<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlist = Playlist::all();
        return view('back.playlist.index', compact('playlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = Playlist::all();
        return view('back.playlist.create',compact('playlist')); 
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
            'judul_playlist' => 'required|min:4',
            // 'gambar_playlist' => 'required|image|nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_playlist')) {
            $uploadedFile = $request->file('gambar_playlist');

            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                'gambar_playlist' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }
        }

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_playlist);
        if( Auth::check()){
            $data['user_id'] = Auth::id();
        }
        $data['gambar_playlist'] = $request->file('gambar_playlist')->store('playlist');

        Playlist::create($data);

        return redirect()->route('playlist.index')->with(['success' => 'Data Berhasil Tersimpan']);
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
        $playlist = Playlist::find($id);

        return view('back.playlist.edit', compact('playlist'));
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
            'judul_playlist' => 'required',
            'deskripsi' => 'required',
            // 'gambar_playlist' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
            'is_active' => 'required'
        ]);

        if (empty($request->file('gambar_playlist'))) {
            $playlist = Playlist::find($id);
            $playlist->update([
                'judul_playlist' => $request->judul_playlist,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul_playlist),
                'is_active' => $request->is_active,
                'user_id' => Auth::id()
            ]);
            return redirect()->route('playlist.index')->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            $uploadedFile = $request->file('gambar_playlist');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'gambar_playlist' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $playlist = Playlist::find($id);
            Storage::delete($playlist->gambar_playlist);
            $playlist->update([
                'judul_playlist' => $request->judul_playlist,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul_playlist),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'gambar_playlist' => $request->file('gambar_playlist')->store('playlist')
            ]);
            return redirect()->route('playlist.index')->with(['success' => 'Data Berhasil Diupdate']);
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
        $playlist = Playlist::find($id);

        Storage::delete($playlist->gambar_playlist);

        $playlist->delete();

        return redirect()->route('playlist.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}