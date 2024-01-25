<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $all_antrian = DB::table('antrians')->where('tanggal', date("Y-m-d"))->where('status','mulai')->count();
        $next_antrian = DB::table('antrians')->where('tanggal', date("Y-m-d"))->where('status','mulai')->min('nomor');

		$antrians = Antrian::where('tanggal', date("Y-m-d"))->orderBy('nomor', 'asc')->paginate(10);
        return view('dashboard.index',compact('antrians','all_antrian','next_antrian'));
		
        //return view('dashboard.index');
    }

    public function add_antrian(){
        $nomor = DB::table('antrians')->where('tanggal', date("Y-m-d"))->where('status','mulai')->max('nomor');
        $data = [
            'tanggal'=>date("Y-m-d"),
            'nomor' => $nomor+1,
            'users_id'=> Auth::id()
        ];
        Antrian::create($data);
        return redirect('/dashboard')->with('success', 'Tambah Antrian Berhasil..');
    }
    
    public function proses_antrian(){
        $nomors = DB::table('antrians')->where('tanggal', date("Y-m-d"))->where('status','mulai')->min('id');
        $antrian = Antrian::find($nomors);
        //dd($nomors);
        $antrian->status = 'selesai';
        $antrian->save();
        return redirect('/dashboard')->with('success', 'Proses Antrian Berhasil..');
    }
}
