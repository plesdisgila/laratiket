<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaksi;
use App\Acara;
use App\Kategori;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $acara = Acara::all();
        $kategori = Kategori::all();
        $status = Transaksi::where('status', '=', '1');

        $chart = \DB::table('acaras')
                    ->join('kategoris', 'kategoris.id', 'acaras.kategori_id')->get();
        $chart2 = \DB::table('kategoris')->get();
        $chart3 = Kategori::withCount('acara')->get();

        return view('home', compact('kategori','acara','transaksi','chart2','chart3', 'status'));
    }

}
