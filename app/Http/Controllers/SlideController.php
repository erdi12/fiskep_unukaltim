<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin?';

        confirmDelete($title, $text);
        return view('back.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slide = Slide::all();
        return view('back.slide.create', compact('slide'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'judul_slide' => 'required|min:4',
        // ]);

        // if ($request->hasFile('gambar_slide')) {
        //     $uploadedFile = $request->file('gambar_slide');

        //     if ($uploadedFile->getSize() > 2048 * 1024) {
        //         return redirect()->back()->withInput()->withErrors([
        //         'gambar_slide' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
        //         ]);
        //     }
        // }

        // $data = $request->all();
        // $data['gambar_slide'] = $request->file('gambar_slide')->store('slide');

        // Slide::create($data);

        // return redirect()->route('slide.index')->with(['success' => 'Data Berhasil Tersimpan']);
        $this->validate($request, [
            'judul_slide' => 'required|min::4',
        ]);

        if ($request->hasFile('gambar_slide')) {
            $uploadedFile = $request->file('gambar_slide');

            if ($uploadedFile->getSize() > 2048*1048) {
                return redirect()->back()->withInput()->withErrors([
                    'gambar_slide' => 'Ukuram file gambar terlalu besar. Maksimum 2048 Kb.',
                ]);
            }
        }

        $data = $request->all();
        $data['gambar_slide'] = $request->file('gambar_slide')->store('slide');

        Slide::create($data);

        Alert::success('Sukses!', 'Data Berhasil Tersimpan');

        return redirect()->route('slide.index');
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
        $slide = Slide::find($id);
        return view('back.slide.edit', compact('slide'));
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
            'judul_slide' => 'required',
        ]);

        if (empty($request->file('gambar_slide'))) {
            $slide = Slide::find($id);
            $slide->update([
                'judul_slide' => $request->judul_slide,
                'link' => $request->link,
                'status' => $request->status,
            ]);

            Alert::success('Sukses!', 'Data Berhasil Diupdate!');

            return redirect()->route('slide.index');
        } else {
            $uploadedFile = $request->file('gambar_slide');

            // Validasi ukuran gambar
            if ($uploadedFile->getSize() > 2048 * 1024) {
                return redirect()->back()->withInput()->withErrors([
                    'gambar_slide' => 'Ukuran file gambar terlalu besar. Maksimum 2048 KB.',
                ]);
            }

            $slide = slide::find($id);
            Storage::delete($slide->gambar_slide);
            $slide->update([
                'judul_slide' => $request->judul_slide,
                'link' => $request->link,
                'status' => $request->status,
                'gambar_slide' => $request->file('gambar_slide')->store('slide')
            ]);
            return redirect()->route('slide.index')->with(['success' => 'Data Berhasil Diupdate']);
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
        $slide = Slide::find($id);

        Storage::delete($slide->gambar_slide);

        $slide->delete();
        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');
        return redirect()->route('slide.index');
    }
}
