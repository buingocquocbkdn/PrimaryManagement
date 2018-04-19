<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;

class MonHocController extends Controller
{
    public function index()
    {
        $monhoc = MonHoc::all();
        echo json_encode($monhoc);
    }
 
    public function show($id)
    {
    	$dantoc= DanToc::find($id);
        return $dantoc;
    }

    public function store(Request $request)
    {
        $article = DanToc::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
