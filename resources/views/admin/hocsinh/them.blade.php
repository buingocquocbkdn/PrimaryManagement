@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<center><h2>Thêm học sinh</h2></center>
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
			@if(isset($namhoc))
			<center>Năm học: {{$namhoc[0]->ten}}</center>
			@endif
			@if(isset($lop))
			<center>Lớp: {{$lop[0]->ten}}</center>
			@endif
			@if(count($errors) >0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
				{{$err}}
				@endforeach
			</div>
			@endif
			<form class="form-horizontal" action="hocsinh" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="namhoc" value="{{$namhoc[0]->id}}" />
				<input type="hidden" name="lop" value="{{$lop[0]->id}}" />
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Mã số học sinh:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="maso" type="text" placeholder="Mã số học sinh">
							</div>
						</div>
						<div class="col-md-6">
							<h4>Họ tên:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="hoten" type="text" placeholder="Họ tên học sinh">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Ngày sinh:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="ngaysinh" type="date" placeholder="Ngày sinh">
							</div>
						</div>
						<div class="col-md-6">
							<h4>Nơi sinh:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="noisinh" type="text" placeholder="Nơi sinh">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Dân tộc:</h4>
							<div class="col-lg-10">
								<select name ="dantoc" class="form-control">
									@foreach($dantoc as $dt)
									<option @if(isset($dantoc_edit)&&$dantoc==$dt->id) {{'selected'}} @endif value="{{$dt->id}}">{{$dt->ten}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<h4>Tôn giáo:</h4>
							<div class="col-lg-10">
								<select name ="tongiao" class="form-control" id="tongiao">
									@foreach($tongiao as $tg)
									<option @if(isset($tongiao_edit)&&$tongiao==$tg->id) {{'selected'}} @endif value="{{$tg->id}}">{{$tg->ten}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Họ tên cha:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="hotencha" type="text" placeholder="Họ tên cha">
							</div>
						</div>
						<div class="col-md-6">
							<h4>Nghề nghiệp cha:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="nghenghiepcha" type="text" placeholder="Nghề nghiệp cha">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Họ tên mẹ:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="hotenme" type="text" placeholder="Họ tên mẹ">
							</div>
						</div>
						<div class="col-md-6">
							<h4>Nghề nghiệp mẹ:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="nghenghiepme" type="text" placeholder="Nghề nghiệp mẹ">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Giới tính :</h4>
							<div class="col-md-9">
								<div class="radio-inline">
									<label>
										<input type="radio" name="gioitinh" value="0">Nam
									</label>
								</div>
								<div class="radio-inline">
									<label>
										<input type="radio" name="gioitinh" value="1">Nữ
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h4>Số điện thoại:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="sodienthoai" type="text" placeholder="Số điện thoại">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<input style="float:right" class="btn btn-primary" name="add_hocsinh" value="Thêm" type="submit"/>
						<input style="float:left" class="btn btn-primary" value="Lưu" type="reset"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

