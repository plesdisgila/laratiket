<?php

namespace App\Http\Controllers;

use App\Acara;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acaras = Acara::all();
        $kategoris = Kategori::all();
        return view('acara.index', compact('acaras','kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategoris = Kategori::all();
        return view('acara.create', compact('kategoris'));
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
            'nama_acara' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg,gif,svg',
            'lokasi' => 'required',
            'waktu' => 'required',
            'kategori_id' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ];

        $customMessages = [
            'nama_acara.required' => 'Nama acara tidak boleh kosong ya',
            'deskripsi.required' => 'Deskripsi acara tidak boleh kosong ya',
            'lokasi.required' => 'Lokasi acara tidak boleh kosong ya',
            'waktu.required' => 'Waktu acara tidak boleh kosong ya',
            'kategori_id.required' => 'Kategori acara tidak boleh kosong ya',
            'gambar.mimes' => 'gambar harus extensi jpeg,png,jpg,gif atau svg',
            'jenis.required' => 'jenis acara tidak boleh kosong ya',
            'harga.required' => 'harga acara tidak boleh kosong ya',
            'jumlah.required' => 'jumlah acara tidak boleh kosong ya',

        ];

        $this->validate($request, $rules, $customMessages);

        if ($request->gambar) {
            $namagambar = time() . '-' . $request->gambar->getclientoriginalname();

            $request->gambar->move(public_path('upload/images'), $namagambar);

            $acara = Acara::create([
                'nama_acara'=>$request->nama_acara,
                'slug_acara'=> Str::slug($request->nama_acara,'-'),
                'waktu'=>$request->waktu,
                'lokasi'=>$request->lokasi,
                'deskripsi'=>$request->deskripsi,
                'kategori_id'=>$request->kategori_id,
                'gambar'=>$namagambar,
                'jenis'=>$request->jenis,
                'harga'=>$request->harga,
                'jumlah'=>$request->jumlah
            ]);
            }else{
                $acara = Acara::create([
                'nama_acara'=>$request->nama_acara,
                'slug_acara'=> Str::slug($request->nama,'-'),
                'waktu'=>$request->waktu,
                'lokasi'=>$request->lokasi,
                'deskripsi'=>$request->deskripsi,
                'kategori_id'=>$request->kategori_id,
                'jenis'=>$request->jenis,
                'harga'=>$request->harga,
                'jumlah'=>$request->jumlah
                ]);
            }

            Session::flash('tambah','Acara Berhasil Ditambahkan');

            return redirect()->route('acara.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        //
        $kategori = Kategori::all();
        return view('acara.show', compact('acara','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara)
    {
        //
        $kategoris = Kategori::all();
        return view('acara.edit', compact('acara','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acara $acara)
    {
        //
        $rules = [
            'nama_acara' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg,gif,svg',
            'lokasi' => 'required',
            'waktu' => 'required',
            'kategori_id' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ];

        $customMessages = [
            'nama_acara.required' => 'Nama acara tidak boleh kosong ya',
            'deskripsi.required' => 'Deskripsi acara tidak boleh kosong ya',
            'lokasi.required' => 'Lokasi acara tidak boleh kosong ya',
            'waktu.required' => 'Waktu acara tidak boleh kosong ya',
            'kategori_id.required' => 'Kategori acara tidak boleh kosong ya',
            'gambar.mimes' => 'gambar harus extensi jpeg,png,jpg,gif atau svg',
            'jenis.required' => 'jenis acara tidak boleh kosong ya',
            'harga.required' => 'harga acara tidak boleh kosong ya',
            'jumlah.required' => 'jumlah acara tidak boleh kosong ya',

        ];

        $this->validate($request, $rules, $customMessages);

        if ($request->gambar) {
            $namagambar = time() . '-' . $request->gambar->getclientoriginalname();

            $request->gambar->move(public_path('upload/images'), $namagambar);

            $acara->update([
                'nama_acara'=>$request->nama_acara,
                'slug_acara'=> Str::slug($request->nama_acara,'-'),
                'waktu'=>$request->waktu,
                'lokasi'=>$request->lokasi,
                'deskripsi'=>$request->deskripsi,
                'kategori_id'=>$request->kategori_id,
                'gambar'=>$namagambar,
                'jenis'=>$request->jenis,
                'harga'=>$request->harga,
                'jumlah'=>$request->jumlah
            ]);
            }else{
                $acara->update([
                'nama_acara'=>$request->nama_acara,
                'slug_acara'=> Str::slug($request->nama_acara,'-'),
                'waktu'=>$request->waktu,
                'lokasi'=>$request->lokasi,
                'deskripsi'=>$request->deskripsi,
                'kategori_id'=>$request->kategori_id,
                'jenis'=>$request->jenis,
                'harga'=>$request->harga,
                'jumlah'=>$request->jumlah
                ]);
            }

            Session::flash('update','Acara Berhasil Diupdate');

            return redirect()->route('acara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        //
        $acara->delete();
        Session::flash('danger','Acara ' . $acara->nama_acara . ' Berhasil Dihapus');
        return redirect()->route('acara.index');
    }
}
