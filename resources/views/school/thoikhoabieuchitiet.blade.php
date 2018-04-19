
@if(isset($time))
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				Thời khóa biểu lớp {{ $tenlop }}
			</div>
			@if($thoikhoabieu_id == 0)
				<br >
				<h4>Chưa có thời khóa biểu.</h4>
				<?php die() ?>
			@endif
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>
								@if($time<=5)
								Sáng
								@php ($time= 1)
								@else
								Chiều
								@php($time=6)
								@endif
							</th>
							<th>Thứ hai</th>
							<th>Thứ ba</th>
							<th>Thứ tư</th>
							<th>Thứ năm</th>
							<th>Thứ sáu</th>
						</tr>
					</thead>
					<tbody>
						@for($i=1;$i<=5;$i++)
						<tr class="odd gradeX">
							<td>Tiết {{$time++}}</td>
							<td>
								
								@foreach($monhoc as $mh)
								 @if($thu['monday'][$i-1]->monhoc_id==$mh->id) 
								 {{$mh->ten}}
								 @endif 
								@endforeach
								
							</td>
							<td>
								
								@foreach($monhoc as $mh)
								@if($thu['tuesday'][$i-1]->monhoc_id==$mh->id)
									{{$mh->ten}}
								@endif 
								@endforeach
							</td>
							<td>
								@foreach($monhoc as $mh)
								@if($thu['wednesday'][$i-1]->monhoc_id==$mh->id)
									{{$mh->ten}}
								@endif
								@endforeach
								</select>
							</td>
							<td>
								
								@foreach($monhoc as $mh)
								 @if($thu['thursday'][$i-1]->monhoc_id==$mh->id) 
									{{$mh->ten}}
								 @endif 
								@endforeach
								
							</td>
							<td>
								
							@foreach($monhoc as $mh)
							 @if($thu['friday'][$i-1]->monhoc_id==$mh->id)
								{{$mh->ten}}
							  @endif 
							@endforeach
								
							</td>
						</tr>
						@endfor

					</tbody>
				</table>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel-default-->
	</div>
@endif


