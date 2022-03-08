<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\tipecuti;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = karyawan::all();
        // $karyawans = DB::table('karyawans')->orderBy('tanggal_bergabung', 'asc')->limit(3)->get();

        return view('projects.index', compact('karyawans'));
    }

    public function hapusdata($id)
    {
        $santri = karyawan::where('id', $id)
            ->delete();

        return redirect()->route('projects.index');
    }

    public function join()
    {
        $karyawans = DB::table('karyawans')->orderBy('tanggal_bergabung', 'asc')->limit(3)->get();
        return view('projects.index', compact('karyawans'));
    }

    public function daftarCuti()
    {
        $data = DB::table('karyawans')
            ->join('tipecutis', 'tipecutis.id_karyawan', '=', 'karyawans.id')
            ->get();

        return view('projects.cuti', compact('data'));
    }
    public function cutiBanyak()
    {
        $data = DB::table('karyawans')
            ->select('karyawans.*', 'tipecutis.*')
            ->selectRaw('count(tipecutis.id_karyawan) as pengajuan')
            ->leftJoin('tipecutis', 'tipecutis.id_karyawan', '=', 'karyawans.id')
            ->groupBy('karyawans.id')
            ->get();
        // dd($data);
        return view('projects.cutibanyak', compact('data'));
    }

    public function show($input)
    {
        $karyawan = DB::table('karyawans')->where('id', [$input])->get();
        return view('projects.show', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
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
            'no_induk' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_bergabung' => 'required'
        ]);

        karyawan::create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Add Employe Successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\karyawan  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($input)
    {
        $karyawan = DB::table('karyawans')->where('id', [$input])->get();
        return view('projects.edit', compact('karyawan'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\karyawan $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, karyawan $karyawan)
    {
        $request->validate([
            'no_induk' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_bergabung' => 'required'
        ]);
        DB::table('karyawans')->where('id', $request->id)->update([
            'no_induk' => $request->no_induk,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ]);
        return redirect()->route('projects.index')
            ->with('success', 'Karyawan updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(karyawan $karyawan)
    {
        $karyawan = karyawan::where('id', $karyawan);
        $karyawan->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
