<?php

use App\Http\Controllers\CarControllers;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SiswaController;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

Route::get('/mobil', [MobilController::class, 'index']);
Route::get('/mobil/tambah', [MobilController::class, 'create'])->name('mobil.tambah');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.simpan');
Route::resource('sisw', SiswaController::class);
Route::resource('ca', CarControllers::class);

Route::get('getSiswa', function (Request $request) {
    if ($request->ajax()) {
        $data = Siswa::latest()->get();
        return DataTables::of($data)
        ->addIndexColumn()->addColumn('action', function($row){
            $actionBtn = '<a class="btn btn-info btn-sm" href="' . route('sisw.show',$row->id) . '">Show</a>
            <a href="' . route('sisw.edit',$row->id) . '" class="edit btn btn-success btn-sm">Edit</a>
            <button class="btn btn-danger btn-sm btn-delete" data-remote="' . route('sisw.destroy',$row->id) . '">Delete</button>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
})->name('data.sisw');