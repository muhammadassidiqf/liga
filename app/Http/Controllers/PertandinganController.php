<?php

namespace App\Http\Controllers;

use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \DB::statement("SET SQL_MODE=''");
        $pertandingan = Pertandingan::groupby('kode_pertandingan')->orderBy('id', 'desc')->get(['id', 'kode_pertandingan']);
        $match = [];
        foreach ($pertandingan as $i => $p) {
            $data_klub = DB::table('pertandingan as a')
                ->selectRaw('a.kode_pertandingan,a.id_klub')
                ->where('kode_pertandingan', $p->kode_pertandingan)
                ->get();
            foreach ($data_klub as $j => $a) {
                $data_pertandingan = DB::table('pertandingan as a')
                    ->selectRaw('b.nama_klub,a.gm')
                    ->leftJoin('klub as b', 'b.id', 'a.id_klub')
                    ->where('kode_pertandingan', $p->kode_pertandingan)
                    ->where('id_klub', $a->id_klub)
                    ->first();
                $b['klub' . $j + 1] = $data_pertandingan->nama_klub;
                $b['skor' . $j + 1] = $data_pertandingan->gm;
            }
            array_push($match, $b);
        }
        return view('content.pertandingan', compact('match'));
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
            'kode' => 'required',
            'klub1' => 'required',
            'skor1' => 'required',
            'klub2' => 'required',
            'skor2' => 'required'
        ]);
        $data = [];
        for ($i = 0; $i < sizeof($request->kode); $i++) {
            $detail = [];
            if ($request->skor1[$i] > $request->skor2[$i]) {
                $detail['kode_pertandingan'] = $request->kode[$i];
                $detail['id_klub'] = $request->klub1[$i];
                $detail['gk'] = $request->skor2[$i];
                $detail['gm'] = $request->skor1[$i];
                $detail['poin'] = 3;
                $detail['menang'] = 1;
                $detail['seri'] = 0;
                $detail['kalah'] = 0;
                array_push($data, $detail);
                $detail['kode_pertandingan'] = $request->kode[$i];
                $detail['id_klub'] = $request->klub2[$i];
                $detail['gk'] = $request->skor1[$i];
                $detail['gm'] = $request->skor2[$i];
                $detail['poin'] = 0;
                $detail['menang'] = 0;
                $detail['seri'] = 0;
                $detail['kalah'] = 1;
                array_push($data, $detail);
            } elseif ($request->skor2[$i] > $request->skor1[$i]) {
                $detail['kode_pertandingan'] = $request->kode[$i];
                $detail['id_klub'] = $request->klub2[$i];
                $detail['gk'] = $request->skor1[$i];
                $detail['gm'] = $request->skor2[$i];
                $detail['poin'] = 3;
                $detail['menang'] = 1;
                $detail['seri'] = 0;
                $detail['kalah'] = 0;
                array_push($data, $detail);
                $detail['kode_pertandingan'] = $request->kode[$i];
                $detail['id_klub'] = $request->klub1[$i];
                $detail['gk'] = $request->skor2[$i];
                $detail['gm'] = $request->skor1[$i];
                $detail['poin'] = 0;
                $detail['menang'] = 0;
                $detail['seri'] = 0;
                $detail['kalah'] = 1;
                array_push($data, $detail);
            } elseif ($request->skor2[$i] == $request->skor1[$i]) {
                $detail['kode_pertandingan'] = $request->kode[$i];
                $detail['id_klub'] = $request->klub2[$i];
                $detail['gk'] = $request->skor1[$i];
                $detail['gm'] = $request->skor2[$i];
                $detail['poin'] = 1;
                $detail['menang'] = 0;
                $detail['seri'] = 1;
                $detail['kalah'] = 0;
                array_push($data, $detail);
                $detail['kode_pertandingan'] = $request->kode[$i];
                $detail['id_klub'] = $request->klub1[$i];
                $detail['gk'] = $request->skor2[$i];
                $detail['gm'] = $request->skor1[$i];
                $detail['poin'] = 1;
                $detail['menang'] = 0;
                $detail['seri'] = 1;
                $detail['kalah'] = 0;
                array_push($data, $detail);
            }
        }
        foreach ($data as $d) {
            Pertandingan::create($d);
        }
        return redirect()->back()->with('success', 'Data Pertandingan berhasil ditambahkan');
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
