@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<center><h2>Sửa học sinh</h2></center>
			{!!Form::open(array('route'=>array('hocsinh.update',$hocsinh->id),'method'=>'PUT'))!!}
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<h4>Mã số học sinh:</h4>
						<div class="col-lg-10">
							{{$hocsinh->id}}
						</div>
					</div>
					<div class="col-md-6">
						<h4>Họ tên:</h4>
						<div class="col-lg-10">
							{{$hocsinh->hoten}}
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<h4>Ngày sinh:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$hocsinh->ngaysinh}}" name="ngaysinh" type="text" placeholder="Ngày sinh">
						</div>
					</div>
					<div class="col-md-6">
						<h4>Nơi sinh:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$hocsinh->noisinh}}" name="noisinh" type="text" placeholder="Nơi sinh">
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
								<option @if($hocsinh->dantoc_id==$dt->id) {{'selected'}} @endif value="{{$dt->id}}">{{$dt->ten}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Tôn giáo:</h4>
						<div class="col-lg-10">
							<select name ="tongiao" class="form-control" id="tongiao">
								@foreach($tongiao as $tg)
								<option @if($hocsinh->tongiao_id==$tg->id) {{'selected'}} @endif value="{{$tg->id}}">{{$tg->ten}}</option>
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
							<input class="form-control" value="{{$hocsinh->hotencha}}" name="hotencha" type="text" placeholder="Ngày sinh">
						</div>
					</div>
					<div class="col-md-6">
						<h4>Nghề nghiệp cha:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$hocsinh->nghenghiepcha}}" name="nghenghiepcha" type="text" placeholder="Mã số học sinh">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<h4>Họ tên mẹ:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$hocsinh->hotenme}}" name="hotenme" type="text" placeholder="Ngày sinh">
						</div>
					</div>
					<div class="col-md-6">
						<h4>Nghề nghiệp mẹ:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$hocsinh->nghenghiepme}}" name="nghenghiepme" type="text" placeholder="Mã số học sinh">
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
									<input type="radio" @if($hocsinh->gioitinh==0) {{'checked'}} @endif disabled="disabled" name="gioitinh">Nam
								</label>
							</div>
							<div class="radio-inline">
								<label>
									<input type="radio" @if($hocsinh->gioitinh==1) {{'checked'}} @endif disabled="disabled" name="gioitinh">Nữ
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Số điện thoại:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$hocsinh->sodienthoai}}" name="sodienthoai" type="text" placeholder="Số điện thoại">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
				<input class="btn btn-default" type="reset" value="Reset" name="reset" />
					<input class="btn btn-primary" type="submit" value="Submit" name="sua" />
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection

