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
}
