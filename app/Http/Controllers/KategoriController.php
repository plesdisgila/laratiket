<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kategori.create');
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
        ];

        $customMessages = [
            'nama.required' => 'Nama Kategori tidak boleh kosong ya'
        ];

        $this->validate($request, $rules, $customMessages);

        // $kategori = Kategori::create($request->all());

        $kategori = Kategori::create([
            'nama'=>$request->nama,
            'slug'=> Str::slug($request->nama,'-'),
        ]);

        Session::flash('tambah','Kategori Berhasil Ditambahkan');

        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
        return view('kategori.show', compact('kategori'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
        $rules = [
            'nama' => 'required',
        ];
        $customMessages = [
            'nama.required' => 'Nama Kategori tidak boleh kosong ya'
        ];
        $this->validate($request, $rules, $customMessages);

        $kategori->update([
            'nama'=>$request->nama
        ]);

        Session::flash('update','Kategori Berhasil Diupdate');

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
        $kategori->delete();

        Session::flash('danger','Kategori Berhasil Dihapus');

        return redirect()->route('kategori.index');
    }
}
