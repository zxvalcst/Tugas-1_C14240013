<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function home(){
        return view('home');
    }

    // Halaman Facility
    public function facility()
    {
        $fasilitas = Fasilitas::all();
        return view('facility', ['fasilitas' => $fasilitas]);
    }
}
