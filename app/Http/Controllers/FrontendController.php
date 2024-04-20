<?php

namespace App\Http\Controllers;

use App\Models\Hi;
use App\Models\Iklan;
use App\Models\Ilkom;
use App\Models\Slide;
use App\Models\Pgpaud;
use App\Models\Artikel;
use App\Models\Dekan;
use App\Models\Kategori;
use App\Models\Lpm;
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
        $iklan = Iklan::all();

        return view('front.home', compact('category', 'slide', 'visimisi', 'articles', 'iklan'));
    }

    public function berita() {
        $category   = Kategori::all();
        $article    = Artikel::latest('created_at')->paginate(6);
        $popularArticle = Artikel::orderBy('views', 'desc')->get()->take(3);
        

        return view('front.artikel.berita', compact('category', 'article', 'popularArticle'));
    }

    public function kategori_berita($kategoriSlug) {
        $category = Kategori::where('slug', $kategoriSlug)->first();

        if (!$category) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $artikels = $category->articles()->paginate(6);

        return view('front.artikel.kategori-berita', compact('artikels', 'category'));
    }

    public function detail($slug){
        $category   = Kategori::all();
        $slide      = Slide::all();
        $iklan      = Iklan::all();
        $article    = Artikel::where('slug', $slug)->first();
        $article->increment('views');
        $articleTerbaru = Artikel::take(3)->get();

        return view('front.artikel.detail-artikel', [
            'article' => $article,
            'category' => $category,
            'slide' => $slide,
            'iklan' => $iklan,
            'articleTerbaru' => $articleTerbaru
        ]);
    }

    public function about() {
        $visimisi = VisiMisi::first();
        $dekan = Dekan::first();
        $tendik = Dekan::skip(1)->take(1)->first();

        return view('front.about.about', compact('visimisi', 'dekan', 'tendik'));
    }

    public function hubi() {
        
        $hubi2 = Hi::first();
        // $hubi3 = Hi::skip(1)->take(1)->get();
        $hubi = Hi::get()->skip(1);        
        // $hubi = Hi::get()->skip(2);        

        return view('front.hubi.hubi', compact('hubi','hubi2'));
    }

    public function mukom() {

        $mukom = Ilkom::first();
        $mukom2 = Ilkom::skip(1)->take(1)->get();
        $mukom3 = Ilkom::get()->skip(2);

        return view('front.mukom.mukom', compact('mukom','mukom2','mukom3'));
    }

    public function guru() {
        $guru = Pgpaud::first();
        $guru2 = Pgpaud::get()->skip(1)->take(1);
        $guru3 = Pgpaud::get()->skip(2);

        return view('front.guru.guru', compact('guru','guru2','guru3'));
    }

    public function contact() {
        return view('front.contact.contact');
    }

    public function penjaminan() {
        $lpm = Lpm::all();
        return view('front.lpm.lpm', compact('lpm'));
    }

}
