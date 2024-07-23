<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InfografisController extends Controller
{
    public function index() {
        return view('umum.pages.e-library.infografis');
    }
}
