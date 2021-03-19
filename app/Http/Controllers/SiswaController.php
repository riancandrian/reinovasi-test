<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(){
        $data_siswa = Siswa::all();
        $jenis_kelas = DB::table('siswa')
            ->select(DB::raw('count(*) as jumlah, jenis_kelas'))
            ->groupBy('jenis_kelas')
            ->get();
        
        $jenis_kelamin = DB::table('siswa')
            ->select(DB::raw('count(*) as jumlah, jenis_kelamin'))
            ->groupBy('jenis_kelamin')
            ->get();
        
        # data untuk chart batang
        $jenis  = [];
        $data   = [];
        foreach ($jenis_kelas as $jk) {
            $jenis[] = $jk->jenis_kelas;
            $data[] = $jk->jumlah;
        }

        # data untuk chart pie
        $jkelamin = [];
        foreach ($jenis_kelamin as $k) {
            $jkelamin[] = array('name' => $k->jenis_kelamin, 'y' => $k->jumlah);
        }

        return view('siswa.index', ['data_siswa' => $data_siswa, 'jenis_kelas' => $jenis, 'data' => $data, 'jkelamin' => $jkelamin]);
    }

    public function create(Request $request){
        Siswa::create($request->all());
        return redirect('/siswa')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $siswa = Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request,$id){
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/siswa')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }
}
