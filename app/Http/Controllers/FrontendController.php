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
    public function index(Request $request) {
        $category   = Kategori::all();
        $article    = Artikel::latest('updated_at')->get();
        $slide      = Slide::all();
        $id = 1;
        $visimisi   = VisiMisi::where('id', $id)->first();
        // $timeupload = $article->updated_at->diffForHumans();
        return view('front.home', compact('category', 'article', 'slide', 'visimisi'));
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
}
