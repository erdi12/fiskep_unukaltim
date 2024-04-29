<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TambahKategoriController extends Controller
{
    public function create(){
        return view('back.kategori.create');
    }
}
