<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BarangController extends Controller
{
    public function index(Request $request): View
    {
        return view('data-master.Barang');
    }
}
