<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Siswa;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CarControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ca = Car::latest()->paginate(5);
        return view ('ca.index',compact('ca'))->with('i',(request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sisw = Siswa::all();
        
        return view('ca.create', compact('sisw'));
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
            'Nama' => 'required',
            'Harga' => 'required',
            'Stok' => 'required',
            'siswa_id' => 'required|exists:siswas,id'
        ]);
        
        Car::create($request->all());

        return redirect()->route('ca.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $ca)
    {
        return view('ca.show', compact('ca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $ca)
    {
        return view('ca.edit', compact('ca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $ca)
    {
        $request->validate([
            'Nama' => 'required',
            'Harga' => 'required',
            'Stok' => 'required',
            'siswa_id' => 'required|exists:siswas,id'
        ]);
        $ca->update($request->all());

        return redirect()->route('ca.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $ca)
    {
        $ca->delete();
        return redirect()->route('ca.index')->with('succes','Data Berhasil di Hapus');
    }
}
