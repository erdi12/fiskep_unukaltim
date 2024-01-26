<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Slide;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $category   = Kategori::all();
        $article    = Artikel::all();
        $slide      = Slide::all();
        return view('front.home', compact('category', 'article', 'slide'));
    }
}
