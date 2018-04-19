<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiMonHoc;

class LoaiMonHocController extends Controller
{
    public function index()
    {
        $loaimonhoc = LoaiMonHoc::all();
        echo json_encode($loaimonhoc);
    }
}