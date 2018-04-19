@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	@include('admin.giaovien.menu')
	<div class="card">
		@if(session('thongbao'))
		<div class="alert alert-success">
			{{session('thongbao')}}
		</div>
		@endif
		<center><h4>Thêm phân công</h4></center>
		<div class="card-body">
			<h4>Năm học: {{$namhoc[0]->ten}}</h4>
			<form action="giaovien" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="namhoc" value="{{$namhoc[0]->id}}" />
				<div class="row">
					<div class="col-md-3">
						<h4>Môn học phân công:</h4>
						<select name ="loaimonhoc" class="form-control" id="loaimonhoc">
							@foreach($loaimonhoc as $mh)
							<option value="{{$mh->id}}">{{$mh->ten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<h4>Tên giáo viên</h4>
						<select name ="giaovien_id" class="form-control" id="hoten">
							@foreach($giaovien as $gv)
							<option value="{{$gv->id}}">{{$gv->hoten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<h4>Lớp phân công</h4>
						<select name="lop" class="form-control" id="lop">
							<optgroup label="Khối lớp 1">
								@foreach($lop as $l)
								@if($l->khoilop_id==1)
								<option value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 2">
								@foreach($lop as $l)
								@if($l->khoilop_id==2)
								<option value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 3">
								@foreach($lop as $l)
								@if($l->khoilop_id==3)
								<option value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 4">
								@foreach($lop as $l)
								@if($l->khoilop_id==4)
								<option value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 5">
								@foreach($lop as $l)
								@if($l->khoilop_id==5)
								<option value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
						</select>
					</div>
					<div class="col-md-3">
						<h4>Học kỳ:</h4>
						<select name ="hocky" class="form-control" id="hocky">
							@foreach($hocky as $hk)
							<option value="{{$hk->id}}">{{$hk->ten}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group" style="padding: 30px;margin: auto;width: 35%">
					<div class="col-lg-10 col-lg-offset-2">
						<button class="btn btn-default" type="reset">Cancel</button>
						<input class="btn btn-primary" type="submit" name="add_phancong" value="Thêm"/>
					</div>
				</div>

			</form>
		</div>

	</div>

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