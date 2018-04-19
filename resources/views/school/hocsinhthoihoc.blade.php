@extends('templates.school.master')
@section('content')	
<div class="banner-w3agile">
	<div class="container">
		
	</div>
</div>	
<div class="content">
	<div class="courses-w3ls">
		<div class="container">
		<h2 class="tittle">Danh sách học sinh đã thôi học</h2>		
		<br>
	@php 
		$i= 0 ;
	@endphp
<div class="panel panel-default">
	<div class="panel-body">
	<table width="60%" class="table table-striped">
		<thead>
			<tr>
				<th>STT</th>
				<th>mã học sinh</th>
				<th>Họ tên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<!-- <th>Nơi Sinh</th> -->
				<th>Ngày thôi học</th>
				<th>Lớp</th>
				<th>Lý do thôi học</th>
			</tr>
		</thead>
		<tbody>
		@foreach($arhocsinh as $hocsinh)
		@php 
			$i ++ ;
		@endphp
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $hocsinh->id }}</td>
			<td>{{ $hocsinh->hoten }}</td>
			<td>{{ $hocsinh->ngaysinh }}</td>
			<td>
				@if($hocsinh->gioitinh == 0)
					Nam
				@elseif($hocsinh->gioitinh == 1) 
					Nữ
				@endif
			</td>
			<td>{{ $hocsinh->ngaythoihoc }}</td>
			<td>{{ $hocsinh->ten }}</td>
			<td>{{ $hocsinh->ghichu }}</td>
			
		</tr>
	@endforeach
</tbody>
	</table>
</div></div><!--panel-->
				
			</div>
		</div>
	</div>	
@stop