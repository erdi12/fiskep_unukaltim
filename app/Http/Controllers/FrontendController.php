<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Iklan;
use App\Models\Kategori;
use App\Models\Slide;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $category   = Kategori::all();
        $article    = Artikel::latest('updated_at')->paginate(3);
        $articles   = Artikel::take(6)->get();
        $slide      = Slide::all();
        $visimisi   = VisiMisi::first();
        // $timeupload = $article->updated_at->diffForHumans();
        return view('front.home', compact('category', 'article', 'slide', 'visimisi', 'articles'));
    }

    public function berita() {
        $category   = Kategori::all();
        $article    = Artikel::latest('updated_at')->paginate(3);

        return view('front.artikel.berita', compact('category', 'article'));
    }

    public function detail($slug){
        $category   = Kategori::all();
        $slide      = Slide::all();
        $iklan      = Iklan::all();
        $article    = Artikel::where('slug', $slug)->first();
        $article->increment('views');

        return view('front2.artikel.detail-artikel', [
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
}
