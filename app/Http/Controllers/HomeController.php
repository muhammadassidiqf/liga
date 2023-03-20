<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Pertandingan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \DB::statement("SET SQL_MODE=''");
        $klub = Klub::get(['id', 'nama_klub', 'kota_klub']);
        $klasemen = DB::table('klub as a')
            ->selectRaw('a.nama_klub, COUNT(b.id_klub) AS ma, SUM(b.menang) AS me,  SUM(b.seri) AS s, SUM(b.kalah) AS k, SUM(b.gk) AS gk_total, SUM(b.gm) AS gm_total, SUM(b.poin) AS poin_total')
            ->leftJoin('pertandingan as b', 'a.id', 'b.id_klub')
            ->groupBy('a.id')
            ->orderBy('poin_total', 'desc')
            ->orderBy('gm_total', 'desc')
            ->get();
        $pertandingan = Pertandingan::groupby('kode_pertandingan')->orderBy('id', 'desc')->limit(5)->get(['id', 'kode_pertandingan']);
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
        return view('content.home', compact('klub', 'klasemen', 'match'));
    }
}
