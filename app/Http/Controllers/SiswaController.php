<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->cari){
            $cari = '%' . $request->cari . '%';
            $sisw=Siswa::where('NIS','like', $cari)
                ->orWhere('NamaSiswa','like', $cari)
                ->orWhere('Alamat','like', $cari)
                ->orWhere('JenisKelamin','like', $cari)
                ->orWhere('NoTelp','like', $cari)
                ->paginate(10);
        } else {
            $sisw = Siswa::latest()->paginate(10);
        }

        return view ('sisw.index',compact('sisw'))->with('i',(request()->input('page', 1)-1)* 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = ['Laki-laki', 'Perempuan'];

        return view('sisw.create', compact('gender'));

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
            'NIS' => 'required|unique:siswas',
            'NamaSiswa' => 'required',
            'Alamat' => 'required',
            'JenisKelamin'=> 'required',
            'NoTelp' => 'required',
        ]);
        Siswa::create($request->all());

        return redirect()->route('sisw.index')->with('succes','Data Berhasil Di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $sisw)
    {
        return view('sisw.show', compact('sisw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $sisw)
    {
        $gender = ['Laki-laki', 'Perempuan'];

        return view('sisw.edit', compact('sisw', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $sisw)
    {
        $request->validate([
            'NIS' => 'required|unique:siswas,NIS,'.$sisw->id,
            'NamaSiswa' => 'required',
            'Alamat' => 'required',
            'JenisKelamin'=> 'required',
            'NoTelp' => 'required',
        ]);

        $sisw->update($request->all());

        return redirect()->route('sisw.index')->with('succes','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $sisw)
    {
        $sisw->delete();
        return redirect()->route('sisw.index')->with('succes','Data Berhasil Di Hapus');
    }
}
