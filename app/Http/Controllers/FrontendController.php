<?php

namespace App\Http\Controllers;

use App\Models\Hi;
use App\Models\Lpm;
use App\Models\Dekan;
use App\Models\Email;
use App\Models\Iklan;
use App\Models\Ilkom;
use App\Models\Slide;
use App\Models\Pgpaud;
use App\Mail\SendEmail;
use App\Models\Akademik;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Pengumuman;
use App\Models\VisiMisi;
use App\Models\VisiMisiHi;
use App\Models\VisiMisiIlkom;
use App\Models\VisiMisiPgpaud;
use Faker\Provider\ar_EG\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

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
        $articleTerbaru = Artikel::latest()->take(5)->get();
        $pengumumuan_detail_article = Pengumuman::latest()->take(5)->get();

        return view('front.artikel.detail-artikel', [
            'article' => $article,
            'category' => $category,
            'slide' => $slide,
            'iklan' => $iklan,
            'articleTerbaru' => $articleTerbaru,
            'pengumuman_detail_article' => $pengumumuan_detail_article
        ]);
    }

    public function about() {
        $jabatan = [3, 4];
        $visimisi = VisiMisi::first();
        $dekan = Dekan::first();
        $tendik = Dekan::skip(1)->take(1)->first();
        $positions = ['Ketua Program Studi', 'Sekretaris Program Studi', 'Laboran'];

        $hi = Hi::join('jabatan', 'hi.jabatan_id', '=', 'jabatan.id')
            ->whereIn('jabatan.nama_jabatan', $positions)
            ->orderByRaw("FIELD(jabatan.nama_jabatan, '" . implode("','", $positions) . "')")
            ->orderBy('jabatan.id')
            ->get();

        $ilkom = Ilkom::join('jabatan', 'ilkom.jabatan_id', '=', 'jabatan.id')
            ->whereIn('jabatan.nama_jabatan', $positions)
            ->orderByRaw("FIELD(jabatan.nama_jabatan, '" . implode("','", $positions) . "')")
            ->orderBy('jabatan.id')
            ->get();

        $paud = Pgpaud::join('jabatan', 'pgpaud.jabatan_id', '=', 'jabatan.id')
            ->whereIn('jabatan.nama_jabatan', $positions)
            ->orderByRaw("FIELD(jabatan.nama_jabatan, '" . implode("','", $positions) . "')")
            ->orderBy('jabatan.id')
            ->get();



        return view('front.about.about', compact('visimisi', 'dekan', 'tendik', 'hi', 'ilkom', 'paud'));
    }

    public function hubi() {
        
        $positions = ['Laboran'];
        $positions_2 = ['Laboran', 'Ketua Program Studi', 'Sekretaris Program Studi'];
        $hubi2 = Hi::first();
        // $hubi3 = Hi::skip(1)->take(1)->get();
        $hubi = Hi::join('jabatan', 'hi.jabatan_id', '=', 'jabatan.id')
                    ->whereNotIn('jabatan.nama_jabatan', $positions_2)
                    ->get();
        // $hubi = Hi::get()->skip(2);
        $hubi_laboran = Hi::join('jabatan', 'hi.jabatan_id', '=', 'jabatan.id')
                            ->whereIn('jabatan.nama_jabatan', $positions)
                            ->orderByRaw("FIELD(jabatan.nama_jabatan, '" . implode("','", $positions) . "')")
                            ->get();
        
        $hubi_visi = VisiMisiHi::first();

        return view('front.hubi.hubi', compact('hubi','hubi2', 'hubi_laboran', 'hubi_visi'));
    }

    public function mukom() {

        $positions = ['Laboran'];
        $mukom = Ilkom::first();
        $mukom2 = Ilkom::skip(1)->take(1)->get();
        $mukom3 = Ilkom::get()->skip(2);
        $mukom4 = Ilkom::join('jabatan', 'ilkom.jabatan_id', '=', 'jabatan.id')
                        ->whereIn('jabatan.nama_jabatan', $positions)
                        ->orderByRaw("FIELD(jabatan.nama_jabatan, '" . implode("','", $positions) . "')")
                        ->get();

        $mukom_visimisi = VisiMisiIlkom::first();

        return view('front.mukom.mukom', compact('mukom','mukom2','mukom3', 'mukom4', 'mukom_visimisi'));
    }

    public function guru() {
        
        $guru = Pgpaud::first();
        $guru2 = Pgpaud::get()->skip(1)->take(1);
        $guru3 = Pgpaud::get()->skip(2);
        $guru_visimisi = VisiMisiPgpaud::first();

        return view('front.guru.guru', compact('guru','guru2','guru3', 'guru_visimisi'));
    }

    public function contact() {

        return view('front.contact.contact');

    }

    public function penjaminan() {

        $lpm = Lpm::all();

        return view('front.lpm.lpm', compact('lpm'));
    }

    public function pengumuman_fiskep() {

        $pengumuman = Pengumuman::all();

        return view('front.pengumuman.pengumuman', compact('pengumuman'));
    }

    public function email(Request $request) {

        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'pesan' => 'required|string',
        ]);

        // Simpan data ke database
        $email = new Email();
        $email->nama = $request->input('nama');
        $email->email = $request->input('email');
        $email->subject = $request->input('subject');
        $email->pesan = $request->input('pesan');
        $email->save();

        // from: new Address($email->email, $email->nama);
        // Kirim email
        Mail::to('it@unukaltim.ac.id')->send(new SendEmail($email->nama, $email->email, $email->subject, $email->pesan));
        // Alert::success('Sukses!', 'Data Berhasil Terkirim');
        return redirect()->route('contact')->with(['success' => 'Sukses']);
        // return response()->json(['message' => 'Email berhasil dikirim']);
    }

    public function akademiks() {

        $akademik = Akademik::all();

        return view('front.akademik.akademik', compact('akademik'));
    }

}
