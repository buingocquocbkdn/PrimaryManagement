@extends('templates.school.master')
@section('content')		
	
<div class="banner-w3agile">
	<div class="container">
		
	</div>
</div>
	<!--content-->
<div class="content">
	<!--about-->
	<div class="about-w3">
		<div class="container">
			<h2 class="tittle">Giáo viên trong trường</h2>
			<div class="about-grids">
	@php 
		$i= 0 ;
	@endphp
	<div class="panel panel-default">
	<div class="panel-body">
	<table width="60%" class="table table-striped">
		<thead>
			<tr>
				<th>STT</th>
				<th>Họ tên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Môn học giảng dạy</th>
				<th>Lớp chủ nhiệm</th>
				
			</tr>
		</thead>
		<tbody>
		@foreach($arGiaoVien as $gv)
		@php 
			$i ++ ;
		@endphp
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $gv->hoten }}</td>
			<td>{{ $gv->ngaysinh }}</td>
			<td>
				@if($gv->gioitinh == 0)
					Nam
				@elseif($gv->gioitinh == 1) 
					Nữ
				@endif
			</td>
			<td>{{ $gv->ten }}</td>
			@if($gv->ten == 'Môn chủ nhiệm')
				@foreach($arLopChuNhiem as $lopCN)
					@if($lopCN->giaovien_id == $gv->id)
						 <td>{{ $lopCN->tenlop }}</td> 
					@endif
				@endforeach
			@else 
				<td>-----</td>
				<?php continue; ?>
			@endif
		</tr>
	@endforeach
</tbody>
	</table></div></div>
		<div class="center">
			{{ $arGiaoVien->links() }}
		</div>
			</div>
		</div>

	</div>
	<!--about-->
	
</div>	
<!--content-->
@stop