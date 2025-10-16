<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(Request $request): View
    {
        return view('supplier.index');
    }
}
