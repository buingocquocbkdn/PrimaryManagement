<div class="col-md-4" >
	<select class="form-control" name="lop" id="lop" onclick="onChangeLop()">
             <option value="0">Lớp</option>
 	@if($id >0)
         @foreach($lops as $lop)
         	@if($id == $lop->khoilop_id)
          	<option value="{{$lop->id}}">Lớp {{$lop->ten}}</option>
          	 @endif 
         @endforeach
     @elseif($id == 0)
         @foreach($lops as $lop)
    		<option value="{{$lop->id}}">Lớp {{$lop->ten}}</option> 
          @endforeach
     @endif
      </select>
</div>
<div class="col-md-12">
	<br>
</div>
<div class="col-md-12" id="xkq">
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
	</table></div></div></div>	

			