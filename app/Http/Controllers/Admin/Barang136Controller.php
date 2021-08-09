<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Barang136;
use Illuminate\Http\Request;

class Barang136Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Barang';
        $data = Barang136::all();
        return view('admin.barang.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_barang=Barang136::all();
        $pagename = 'Form Input Barang';
        return view('admin.barang.create', compact('pagename'));
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
        // dd($request);
        $request->validate([
            'txtkode_barang' => 'required',
            'txtnama_barang' => 'required',
            'txtharga_barang' => 'required',
        ]);

        $data_barang=new Barang136([

            'kodeBarang136' => $request->get('txtkode_barang'),
            'namaBarang136' => $request->get('txtnama_barang'),
            'hargaBarang136' => $request->get('txtharga_barang'),
        ]);

        // dd($data_tugas);

        $data_barang->save();
        return redirect('admin/barang')->with('sukses', 'barang berhasil disimpan');
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
        $data_barang=Barang136::all();
        $pagename='Update Barang';
        $data= Barang136::find($id);
        return view('admin.barang.edit', compact('data', 'pagename'));
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
        $request->validate([
            'txtkode_barang' => 'required',
            'txtnama_barang' => 'required',
            'txtharga_barang' => 'required',
        ]);

        $barang=Barang136::find($id);

            $barang->kodeBarang136= $request->get('txtkode_barang');
            $barang->namaBarang136= $request->get('txtnama_barang');
            $barang->hargaBarang136= $request->get('txtharga_barang');

        // dd($data_tugas);

        $barang->save();
        return redirect('admin/barang')->with('sukses', 'barang berhasil diupdate');
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
        $barang =Barang136::find($id);

        $barang->delete();
        return redirect('admin/barang')->with('sukses', 'barang berhasil dihapus');
    }
}
