<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Pertandingan;
use Illuminate\Http\Request;

class KlubController extends Controller
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
        $request->validate([
            'nama' => 'required',
            'kota' => 'required'
        ]);
        Klub::create([
            'nama_klub' => $request->nama,
            'kota_klub' => $request->kota
        ]);
        return redirect()->back()->with('success', 'Data Klub berhasil ditambahkan');
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
        $klub = Klub::where('id', $id)->first(['id', 'nama_klub', 'kota_klub']);
        return view('content.edit_klub', compact('klub'));
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
        $request->validate([
            'nama' => 'required',
            'kota' => 'required'
        ]);
        $data = Klub::findOrFail($id);
        $data->update([
            'nama_klub' => $request->nama,
            'kota_klub' => $request->kota
        ]);
        return redirect()->back()->with('success', 'Data Klub berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pertandingan = Pertandingan::where('id_klub', $id)->get(['kode_pertandingan']);
        foreach ($pertandingan as $i => $p) {
            Pertandingan::where('kode_pertandingan', $p->kode_pertandingan)->delete();
        }
        $del_klub = Klub::where('id', $id)->delete();
        if ($del_klub) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
