<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
        public function index()
        {
            $bands = Band::all();
            return view('bands.index', compact('bands'));
        }
}
