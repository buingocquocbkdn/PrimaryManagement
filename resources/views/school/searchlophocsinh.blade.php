	@php 
		$i= 0 ;
	@endphp
	<div class="panel panel-default">
	<div class="panel-body">
	<table  class="table table-striped">
		<thead>
			<tr>
				<th>STT</th>
				<th>mã học sinh</th>
				<th>Họ tên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<!-- <th>Nơi Sinh</th> -->
				<th>Lớp</th>
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
			
			<td>{{ $hocsinh ->ten }}</td>
		</tr>
	@endforeach
</tbody>
	</table></div></div>
		
				
			