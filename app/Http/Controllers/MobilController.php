<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MobilController extends Controller{
    public function index(Request $request){
        echo "ini adalah MobilController dengan method index <br>";
        echo $request->get('id_mobil');
    }

    public function create(){
        return View('mobil.form_input');
    }

    public function store(Request $request){
        echo "Nama mobil yang di input adalah : ";
        echo $request->get('nama_mobil');
    }
    
}