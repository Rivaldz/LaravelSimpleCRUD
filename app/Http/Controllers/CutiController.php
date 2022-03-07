<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use App\Models\tipecuti;
use DB;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('karyawans')
            ->join('tipecutis', 'tipecutis.id_karyawan', '=', 'karyawans.id')
            ->get();

        return view('projects.cuti', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = karyawan::all();
        return view('projects.addcuti', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_karyawan' => 'required',
            'tanggal_cuti' => 'required',
            'lama_cuti' => 'required',
            'keterangan' => 'required',
        ]);
        $show = tipecuti::create($validatedData);

        return redirect('/cuti')->with('success', 'Game is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('karyawans')
            ->join('tipecutis', 'tipecutis.id_karyawan', '=', 'karyawans.id')
            ->where('no_induk', $id)
            ->get();
        return view('projects.showcuti', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('karyawans')
            ->join('tipecutis', 'tipecutis.id_karyawan', '=', 'karyawans.id')
            ->where('id_tipecuti', $id)
            ->get();
        return view('projects.editcuti', compact('data'));
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
        $validatedData = $request->validate([
            'id_karyawan' => 'required',
            'tanggal_cuti' => 'required',
            'lama_cuti' => 'required',
            'keterangan' => 'required',
        ]);
        DB::table('tipecutis')->where('id_tipecuti', $id)->update([
            'id_karyawan' => $request->id_karyawan,
            'tanggal_cuti' => $request->tanggal_cuti,
            'lama_cuti' => $request->lama_cuti,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/cuti')->with('success', 'Cuti Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipecuti = tipecuti::where('id_tipecuti', $id);
        $tipecuti->delete();

        return redirect('/cuti')->with('success', 'Cuti Data is successfully deleted');
    }

    public function sumCuti()
    {

        $data = DB::table('karyawans')
            ->select('karyawans.*', 'tipecutis.*')
            ->selectRaw('SUM(tipecutis.lama_cuti) as total_cuti')
            ->leftJoin('tipecutis', 'tipecutis.id_karyawan', '=', 'karyawans.id')
            ->groupBy('karyawans.id')
            ->get();
        // dd($data);
        return view('projects.listtotalcuti', compact('data'));
    }
}
