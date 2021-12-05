<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Acara;
use App\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Mail\TamuMail;
use Illuminate\Support\Facades\Mail;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksis = Transaksi::orderby('created_at', 'desc')->get();
        $acaras = Acara::all();
        return view('transaksi.index', compact('transaksis','acaras'));
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
            'invoice' => 'INV-'.$now.'-'.str_pad($lastInvoiceID + 1, 6, "0", STR_PAD_LEFT)
        ]);

        Acara::where('id', $request->acara_id)->decrement('jumlah', $request->qty);

        \Mail::to($request->email)
                ->send(new TamuMail($transaksi));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
        $kategori = Kategori::all();
        $acara = Acara::all();
        return view('transaksi.show', compact('transaksi','acara','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
        $acaras = Acara::all();
        return view('transaksi.edit', compact('transaksi','acaras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $transaksi->update($request->all());

        if ($transaksi->status=='Cancel') {
            Acara::where('id', $transaksi->acara_id)->increment('jumlah', $transaksi->qty);
        }

        \Mail::to($request->email)->send(new TamuMail($transaksi));

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi->delete();
        Acara::where('id', $transaksi->acara_id)->increment('jumlah', $transaksi->qty);
        Session::flash('danger','Transaksi ' . $transaksi->invoice . ' Berhasil Dihapus ');
        return redirect()->route('transaksi.index');
    }
}
