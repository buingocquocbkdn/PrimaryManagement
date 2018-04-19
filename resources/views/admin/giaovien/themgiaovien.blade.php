@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<center><h2>Thêm giáo viên</h2></center>
			@if(count($errors) >0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
				{{$err}}
				@endforeach
			</div>
			@endif
			<form class="form-horizontal" action="giaovien" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Mã số giáo viên:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="maso" type="text" placeholder="Mã số giáo viên">
							</div>
						</div>
						<div class="col-md-6">
							<h4>Họ tên:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="hoten" type="text" placeholder="Họ tên giáo viên">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Ngày sinh:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="ngaysinh" type="date">
							</div>
						</div>
						<div class="col-md-6">
							<h4>Địa chỉ:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="diachi" type="text" placeholder="Địa chỉ">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<h4>Số điện thoại:</h4>
							<div class="col-lg-10">
								<input class="form-control" value="" name="sodienthoai" type="text" placeholder="Số điện thoại">
							</div>
						</div>
						<div class="col-md-5">
							<h4>Dạy môn học:</h4>
							<select name ="loaimonhoc" class="form-control">
								@foreach($loaimonhoc as $mh)
								<option value="{{$mh->id}}">{{$mh->ten}}</option>
								@endforeach
							</select>
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
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<input style="float:right" class="btn btn-primary" name="add_gv" value="Lưu" type="submit"/>
						<button style="float:left" class="btn btn-default" type="reset">Hủy bỏ</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

