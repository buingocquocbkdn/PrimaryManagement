<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiDung;

class NguoiDungController extends Controller
{
	public function __construct()
	{
	}

	
	public function index()
	{

	} 

	public function show($action) {
		
		
	}


	public function store(Request $request)
	{
		

		

	}

	public function getUser($id)
	{
		$user = NguoiDung::where('maso',$id)->get();
		echo json_encode($user);
	}

	public function updateAvatar()
	{
		$data = $_POST['base64'];
		$idUser = $_POST['id'];
		$time = time();
		$imagePath = "img/{$time}.jpg";
		file_put_contents($imagePath,base64_decode($img));
		$user = NguoiDung::where('maso',$id)->update(['avatar' => $imagePath]);

		echo 'success';
	}
	
	public function getUsers()
	{
		$user = NguoiDung::all();
		echo json_encode($user);
	}


}
