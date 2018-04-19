@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
<div class="content-wrapper">
	<div class="card">
	<h4>Thời khóa biểu</h4>
		<div class="card-body">
			<form action="giaovien" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="row">
					<div class="col-md-3">
						<h4>Tên giáo viên</h4>
						<select name ="giaovien_id" class="form-control" id="hoten">
							@foreach($giaovien as $gv)
							<option @if(isset($giaovien_search)&&$giaovien_search==$gv->id) {{'selected'}} @endif value="{{$gv->id}}">{{$gv->hoten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<h4>Môn học </h4>
						<select name="loaimonhoc" class="form-control" id="loaimonhoc">
							@foreach($loaimonhoc as $mh)
							<option @if(isset($loaimonhoc_search)&&$loaimonhoc_search==$mh->id) {{'selected'}} @endif value="{{$mh->id}}">{{$mh->ten}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-3">
						<h4>Năm học:</h4>
						<select name ="namhoc" class="form-control" id="namhoc">
							@foreach($namhoc as $nh)
							<option @if(isset($namhoc_search)&&$namhoc_search==$nh->id) {{'selected'}} @endif value="{{$nh->id}}">{{$nh->ten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<h4>Học kỳ:</h4>
						<select name ="hocky" class="form-control" id="hocky">
							@foreach($hocky as $hk)
							<option @if(isset($hocky_search)&&$hocky_search==$hk->id) {{'selected'}} @endif value="{{$hk->id}}">{{$hk->ten}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div style="width: 30%;margin:auto;margin-top: 10px">
					<input class="btn btn-primary  btn-block" type="submit" value="Tìm kiếm" name="search_thoikhoabieu" />
				</div>
			</form>
		</div>
	</div>
	@if(!empty($tiet))
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Thời khóa biểu
				</div>
				@if(isset($lop))
				<div class="panel-heading">
					Chủ nhiệm lớp: {{$lop[0]->ten}}
				</div>
				@endif
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									@if($time<=5)
									Sáng
									@php($time= 1)
									@else
									Chiều
									@php($time= 6)
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
							<tr class="odd gradeX">
								<td><input class="form-control" name="" disabled value="Tiết {{$time++}}" type="text"></td>
								@foreach($tiet['tiet1'] as $value)
								@if($value->monhoc->ten=='Ngoại ngữ'||$value->monhoc->ten=='Giáo dục thể chất')
								<td><input class="form-control" name="" disabled value="" type="text"></td>
								@else
								<td><input class="form-control" name="" disabled value="{{$value->monhoc->ten}}" type="text"></td>
								@endif
								@endforeach
							</tr>
							<tr class="odd gradeX">
								<td><input class="form-control" name="" disabled value="Tiết {{$time++}}" type="text"></td>
								@foreach($tiet['tiet2'] as $value)
								@if($value->monhoc->ten=='Ngoại ngữ'||$value->monhoc->ten=='Giáo dục thể chất')
								<td><input class="form-control" name="" disabled value="" type="text"></td>
								@else
								<td><input class="form-control" name="" disabled value="Tiết {{$value->monhoc->ten}}" type="text"></td>
								@endif
								@endforeach
							</tr>
							<tr class="odd gradeX">
								<td><input class="form-control" name="" disabled value="Tiết {{$time++}}" type="text"></td>
								@foreach($tiet['tiet3'] as $value)
								@if($value->monhoc->ten=='Ngoại ngữ'||$value->monhoc->ten=='Giáo dục thể chất')
								<td><input class="form-control" name="" disabled value="" type="text"></td>
								@else
								<td><input class="form-control" name="" disabled value="Tiết {{$value->monhoc->ten}}" type="text"></td>
								@endif
								@endforeach
							</tr>
							<tr class="odd gradeX">
								<td><input class="form-control" name="" disabled value="Tiết {{$time++}}" type="text"></td>
								@foreach($tiet['tiet4'] as $value)
								@if($value->monhoc->ten=='Ngoại ngữ'||$value->monhoc->ten=='Giáo dục thể chất')
								<td><input class="form-control" name="" disabled value="" type="text"></td>
								@else
								<td><input class="form-control" name="" disabled value="Tiết {{$value->monhoc->ten}}" type="text"></td>
								@endif
								@endforeach
							</tr>
							<tr class="odd gradeX">
								<td><input class="form-control" name="" disabled value="Tiết {{$time++}}" type="text"></td>
								@foreach($tiet['tiet5'] as $value)
								@if($value->monhoc->ten=='Ngoại ngữ'||$value->monhoc->ten=='Giáo dục thể chất')
								<td><input class="form-control" name="" disabled value="" type="text"></td>
								@else
								<td><input class="form-control" name="" disabled value="Tiết {{$value->monhoc->ten}}" type="text"></td>
								@endif
								@endforeach
							</tr>
						</tbody>
					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	@endif

</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$("#loaimonhoc").change(function() {
			var loaimonhoc = $(this).val();
			$.get("giaovien/changeGiaoVien?loaimonhoc="+loaimonhoc,function(data){
				$("#hoten").html(data);
			});
		});

		$("#hoten").change(function() {
			var idGV = $(this).val();
			$.get("giaovien/changeMonHoc?idGV="+idGV,function(data){
				$("#loaimonhoc").html(data);
			});
		});
	});

</script>
@endsection