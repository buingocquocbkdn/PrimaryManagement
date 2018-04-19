<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NamHoc;

class NamHocController extends Controller
{
   public function index()
    {
        $namhoc = NamHoc::all();
        echo json_encode($namhoc);
    }
}
