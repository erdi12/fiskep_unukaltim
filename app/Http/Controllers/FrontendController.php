<?php

namespace App\Http\Controllers;

use App\Models\Hi;
use App\Models\Iklan;
use App\Models\Ilkom;
use App\Models\Slide;
use App\Models\Pgpaud;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index() {
        $category   = Kategori::all();
        $articles   = Artikel::latest('created_at')->get()->take(6);
        // $articles   = Artikel::take(6)->get();
        $slide      = Slide::all();
        $visimisi   = VisiMisi::first();
        // $timeupload = $article->updated_at->diffForHumans();
        return view('front.home', compact('category', 'slide', 'visimisi', 'articles'));
    }

    public function berita() {
        $category   = Kategori::all();
        $article    = Artikel::latest('created_at')->paginate(6);
        $popularArticle = Artikel::orderBy('views', 'desc')->get()->take(3);

        return view('front.artikel.berita', compact('category', 'article', 'popularArticle'));
    }

    public function detail($slug){
        $category   = Kategori::all();
        $slide      = Slide::all();
        $iklan      = Iklan::all();
        $article    = Artikel::where('slug', $slug)->first();
        $article->increment('views');

        return view('front.artikel.detail-artikel', [
            'article' => $article,
            'category' => $category,
            'slide' => $slide,
            'iklan' => $iklan
        ]);
    }

    public function about() {
        $visimisi = VisiMisi::first();

        return view('front.about.about', compact('visimisi'));
    }

    public function hubi() {
        
        $hubi2 = Hi::first();
        $hubi3 = Hi::skip(1)->take(1)->get();
        $hubi = Hi::get()->skip(2);
        // $hubi = DB::table('hi')
        //         ->join('jabatan', 'hi.jabatan_id', '=', 'jabatan.id')
        //         ->select('hi.*', 'jabatan.nama_jabatan')
        //         ->offset(2) // Mengabaikan dua baris pertama
        //         ->limit(PHP_INT_MAX) // Mengambil semua baris setelahnya
        //         ->get();
        

        return view('front.hubi.hubi', compact('hubi','hubi2','hubi3'));
    }

    public function mukom() {

        $mukom = Ilkom::all();

        return view('front.mukom.mukom', compact('mukom'));
    }

    public function guru() {
        $guru = Pgpaud::all();

        return view('front.guru.guru', compact('guru'));
    }
}
