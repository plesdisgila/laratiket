<?php

namespace App\Http\Controllers;

use App\Tamu;
use App\Acara;
use App\Transaksi;
use App\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\TamuMail;
use Illuminate\Support\Facades\Mail;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acaras = Acara::latest()->paginate(9);
        return view('guests.index', compact('acaras'));
    }

    public function slug($slug)
    {
        # code...
        $acara = Acara::where('slug_acara', $slug)->get();
        if ($acara == null) {
            abort(404);
        }
        return view('guests.show', compact('acara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              //
              $rules = [
                'nama' => 'required',
                'telpon' => 'required',
                'email' => 'required',
                'qty' => 'required',
              ];

              $customMessages = [
                'nama.required' => 'Nama pemesan tidak boleh kosong',
                'telpon.required' => 'Telpon pemesan tidak boleh kosong',
                'email.required' => 'Email pemesan tidak boleh kosong',
                'qty.required' => 'Jumlah tiket tidak boleh kosong',
              ];

              $this->validate($request, $rules, $customMessages);
              
              $now = Carbon::now()->format('Ymd-his');
              // // Get the last order id
              // $lastorderId = Transaksi::orderBy('id', 'desc')->first()->order_no;

              // // Get last 3 digits of last order id
              // $lastIncreament = substr($lastorderId, -3);

              // $latestOrder = Transaksi::orderBy('created_at','DESC')->first();
              // $newOrderId = 'TXT' . date('Ymd') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

              $lastInvoiceID = Transaksi::orderBy('id', 'DESC')->pluck('id')->first();

              $transaksi = Transaksi::create([
                  'acara_id' => $request->acara_id,
                  'nama' => $request->nama,
                  'telpon' => $request->telpon,
                  'email' => $request->email,
                  'qty' => $request->qty,
                  'invoice' => 'INV-'.strtoupper(bin2hex(random_bytes(5)))
              ]);

              Acara::where('id', $request->acara_id)->decrement('jumlah', $request->qty);

              \Mail::to($request->email)->send(new TamuMail($transaksi));

              return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show(Tamu $tamu, $id)
    {
        $match = [
            ['acara_id', '=', $id]
        ];

        $acara = Acara::findOrFail($id);
        if ($acara == null) {
            abort(404);
        }

        return view('guests.show', compact('acara', 'match'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamu $tamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tamu $tamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tamu $tamu)
    {
        //
    }
}
