<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $email = Email::all();

        // return view('front.contact.contact', compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        // Kirim email
        return $this->from($email->email, $email->nama);
        // Mail::from($email->email, $email->nama)->to('it@unukaltim.ac.id')->send(new SendEmail($email->nama, $email->email, $email->subject, $email->pesan));

        return response()->json(['message' => 'Email berhasil dikirim']);

        // $nama = $request->input('nama');
        // $email = $request->input('email');
        // $subject = $request->input('subject');
        // $pesan = $request->input('pesan');

        // Mail::from('erdinurikhsan@gmail.com', 'Erdi Nurikhsan');
        // Mail::to('it@unukaltim.ac.id')->send(new SendEmail($nama, $email, $subject, $pesan));

        // return response()->json(['message' => 'Email berhasil dikirim']);
    
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
