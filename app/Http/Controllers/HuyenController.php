<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Huyen;

class HuyenController extends Controller
{
    public function index()
    {
        $huyen = Huyen::all();
        echo json_encode($huyen);
    }

    public function getHuyenByTinh($id)
    {
        $huyen = Huyen::where('tinh_id',$id)->get();
        echo json_encode($huyen);
    }
}