<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        return view('umum.pages.portal', [

        ]);
    }
}
