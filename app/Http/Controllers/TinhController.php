<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tinh;

class TinhController extends Controller
{
    public function index()
    {
        $tinh = Tinh::all();
        echo json_encode($tinh);
    }
}