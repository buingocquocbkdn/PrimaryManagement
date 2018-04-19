<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NgheNghiep;

class NgheNghiepController extends Controller
{
    public function index()
    {
        $nghenghiep = NgheNghiep::all();
        echo json_encode($nghenghiep);
    }
}