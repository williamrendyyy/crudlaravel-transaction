<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index')->with([
            'mahasiswa' => Mahasiswa::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
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
            'nim' => 'required|min:10|max:12',
            'nama' => 'required|min:3',
            'jk' => 'required|min:4',
            'jurusan' => 'required|min:2',
        ]);
        
        DB::beginTransaction();

        try {
            $mahasiswa = new Mahasiswa;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->jk = $request->jk;
            $mahasiswa->jurusan = $request->jurusan;
            $mahasiswa->save();
        
            DB::commit();
            return to_route('mahasiswa.index')->with('success', 'Data Berhasil Ditambahkan');

        } catch (\Throwable $th) {

            DB::rollBack();
            return to_route('mahasiswa.index')->with('success', 'Data Gagal Ditambahkan');
        }


            
        

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
        return view('mahasiswa.edit')->with([
            'mahasiswa' => Mahasiswa::find($id),
        ]);
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
            'nim' => 'required|min:10|max:12',
            'nama' => 'required|min:3',
            'jk' => 'required|min:4',
            'jurusan' => 'required|min:2',
        ]);

        DB::beginTransaction();

        try {
            $mahasiswa = Mahasiswa::find($id);
            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->jk = $request->jk;
            $mahasiswa->jurusan = $request->jurusan;
            $mahasiswa->save();

            DB::commit();
            return to_route('mahasiswa.index')->with('success', 'Data Berhasil Diubah');

        } catch (\Throwable $th) {
            
            DB::rollBack();
            return to_route('mahasiswa.index')->with('success', 'Data Gagal Diubah');
        }


        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return back()->with('success'. 'Data Berhasil Dihapus');
    }
}