<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Iklan;
use App\Models\Kategori;
use App\Models\Slide;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $category   = Kategori::all();
        $article    = Artikel::latest('updated_at')->get();
        $slide      = Slide::all();
        // $timeupload = $article->updated_at->diffForHumans();
        return view('front.home', compact('category', 'article', 'slide'));
    }

    public function detail($slug){
        $category   = Kategori::all();
        $slide      = Slide::all();
        $iklan      = Iklan::all();
        $article    = Artikel::where('slug', $slug)->first();

        return view('front.artikel.detail-artikel', [
            'article' => $article,
            'category' => $category,
            'slide' => $slide,
            'iklan' => $iklan
        ]);
    }
}
