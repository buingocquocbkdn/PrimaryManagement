@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<center><h2>Sửa học sinh</h2></center>
			{!!Form::open(array('route'=>array('giaovien.update',$giaovien->id),'method'=>'PUT'))!!}
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<h4>Mã số giáo viên:</h4>
						<div class="col-lg-10">
							{{$giaovien->id}}
						</div>
					</div>
					<div class="col-md-6">
						<h4>Họ tên:</h4>
						<div class="col-lg-10">
							{{$giaovien->hoten}}
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<h4>Ngày sinh:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$giaovien->ngaysinh}}" name="ngaysinh" type="text" placeholder="Ngày sinh">
						</div>
					</div>
					<div class="col-md-6">
						<h4>Địa chỉ:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$giaovien->diachi}}" name="diachi" type="text" placeholder="Địa chỉ">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<h4>Số điện thoại:</h4>
						<div class="col-lg-10">
							<input class="form-control" value="{{$giaovien->sodienthoai}}" name="sodienthoai" type="text" placeholder="Số điện thoại">
						</div>
					</div>
					<div class="col-md-6">
						<h4>Dạy môn học:</h4>
						<div class="col-lg-10">
							<select name ="loaimonhoc" class="form-control" id="loaimonhoc">
								@foreach($loaimonhoc as $mh)
								<option @if($giaovien->loaimonhoc_id==$mh->id) {{'selected'}} @endif value="{{$mh->id}}">{{$mh->ten}}</option>
								@endforeach
							</select>
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
									<input type="radio" @if($giaovien->gioitinh==0) {{'checked'}} @endif disabled="disabled" name="gioitinh">Nam
								</label>
							</div>
							<div class="radio-inline">
								<label>
									<input type="radio" @if($giaovien->gioitinh==1) {{'checked'}} @endif disabled="disabled" name="gioitinh">Nữ
								</label>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10">
					<input style="float:left" class="btn btn-default" type="reset" value="Hủy bỏ" name="reset" />
					<input style="float:right" class="btn btn-primary" type="submit" value="Sửa" name="sua" />
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection

