<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('pages.about');
    }
    
    public function create()
    {
        return view('pages.contact');
    }

    public function store()
    {
        $data = request()->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ],
        [
            'nama.required' => 'Nama harus di isi ya',
            'email.required' => 'Email harus di isi ya',
            'email.safeEmail' => 'mohon masukan dengan format email',
            'pesan.required' => 'Pesan harus di isi ya',
        ]);

        Mail::to('test@test.com')->send(new ContactMail);

        return view('pages.contact');
    }
}
