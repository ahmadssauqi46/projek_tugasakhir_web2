<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        return view('materi.index'); 
    }

    public function hardware()
    {
        return view('materi.hardware');
    }

    public function software()
    {
        return view('materi.software');
    }

    public function jaringan()
    {
        return view('materi.jaringan');
    }
}