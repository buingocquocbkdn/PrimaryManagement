@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<h4>Nhập điểm:</h4>
			<form action="hocsinh" method="post" id="form_D">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="row">
					<div class="col-md-2">
						<h4>Mã số học sinh</h4>
						<div class="col-lg-10">
							<input class="form-control" id="maso" value="" name="maso" type="text" placeholder="mã số học sinh">
						</div>
					</div>
					<div class="col-md-2">
						<h4>Tên học sinh</h4>
						<div class="col-lg-10">
							<input class="form-control" id="hoten" name="hoten" value="" type="text" placeholder="họ tên học sinh">
						</div>
					</div>
					<div class="col-md-2">
						<h4>Lớp</h4>
						<select name="lop" class="form-control" id="demoSelect">
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

					<div class="col-md-2">
						<h4>Môn học</h4>
						<select name="monhoc" class="form-control" id="demoSelect">
							@foreach($monhoc as $mh)
							<option value="{{$mh->id}}">{{$mh->ten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-2">
						<h4>Năm học</h4>
						<select name="namhoc" class="form-control" id="demoSelect">
							@foreach($namhoc as $nh)
							<option value="{{$nh->id}}">{{$nh->ten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-2">
						<h4>Học kỳ</h4>
						<select name="hocky" class="form-control" id="demoSelect">
							@foreach($hocky as $hk)
							<option value="{{$hk->id}}">{{$hk->ten}}</option>
							@endforeach
						</select>
					</div>					
				</div>
				<div style="width: 30%;margin:auto;margin-top: 10px">
					<input class="btn btn-primary  btn-block" type="submit" value="Tìm kiếm" name="search_D" id="search_D" />
				</div>
			</form>
		</div>
	</div>

	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Danh sách học sinh
				</div>
				
				<!-- /.panel-heading -->
				<div class="panel-body">
					<form action="hocsinh" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="namhoc" value="" />
						<input type="hidden" name="lop" value="" />
						<input type="hidden" name="monhoc" value="" />
						<input type="hidden" name="hocky" value="" />
						<input type="hidden" name="data" value="" id="data" />
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Mã số học sinh</th>
									<th>Tên học sinh</th>
									<th>
										<select name="loaidiem" class="form-control" id="demoSelect">
											@foreach($loaidiem as $ld)
											<option value="{{$ld->id}}">{{$ld->ten}}</option>
											@endforeach
										</select>
									</th>
								</tr>
							</thead>
							<tbody id="content">
								
							</tbody>
						</table>
						<!-- /.table-responsive -->
						<input style="float:right" class="btn btn-primary" name="diem" value="Lưu" type="submit" id="save_diem" />
						<button style="float:left" class="btn btn-default" type="reset">Hủy bỏ</button>
					</form>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	function Diem(){
		var data=$("input[name='hidden_diem']");
		var result=[];
		for(var i=0;i<data.length;i++){
			result.push($(data[i]).val());
		}
		$("#data").val(result);
		return true;
	}

	$('#search_D').click(function(event) {
		$.ajax({
			url: "hocsinh/searchDiem",
			method: "GET",
			data: $("#form_D").serialize(),
			dataType : 'json',
			success : function(result){
				html='';
				$.each (result, function (key, item){
					html+='<tr class="odd gradeX">'+
					'<td>'+ item.hocsinh_id +'</td>'+
					'<td>'+ item.hoten +'</td>'+
					'<td><input type="text" name="diem-'+ item.hocsinh_id +'" value="" />'+
					'<input type="hidden" name="hidden_diem" value="'+ item.hocsinh_id +'" />'+
					'</td>'+
					'</tr>';
				});
				$('#content').html(html);
				$('#save_diem').click(function(event) {
					var checkbox=$("input[name='checkbox']:checked");
					var result=[];
					for(var i=0;i<checkbox.length;i++){
						result.push($(checkbox[i]).val());
					}
					$("#idDD").val(result);
					$("#lopDD").val($('#lop').val());
					$("#namhocDD").val($('#namhoc').val());
					$("#hockyDD").val($('#hocky').val());

					$.ajax({
						url: "hocsinh",
						method: "POST",
						data: $("#form_SaveDD").serialize(),
						dataType : 'text',
						success : function(result){
							alert('Lưu thành công');
						}
					});

					return false;
				});
			}
		});
		return false;
	});
</script>
@endsection