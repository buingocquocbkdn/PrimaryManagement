@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body" style="text-align: center;">
			<h2>Điểm danh</h2>
			Ngày:{{date("d-m-Y") }}
			<form action="hocsinh" method="post" id="form_DD">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="row">
					<div class="col-md-4">
						<h4>Chọn lớp điểm danh</h4>
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
					<div class="col-md-4">
						<h4>Năm học:</h4>
						<select name ="namhoc" class="form-control" id="namhoc">
							@foreach($namhoc as $nh)
							<option value="{{$nh->id}}">{{$nh->ten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4">
						<h4>Học kì:</h4>
						<select name ="hocky" class="form-control" id="hocky">
							@foreach($hocky as $hk)
							<option value="{{$hk->id}}">{{$hk->ten}}</option>
							@endforeach
						</select>
					</div>

				</div>
				<div style="width: 30%;margin:auto;margin-top: 10px">
					<input class="btn btn-primary  btn-block" type="submit" value="Tìm kiếm" name="searchDD" id="search_DD" />
				</div>
			</form>
		</div>

	</div>

	<!-- /.row -->
	<div class="row" id="data">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Danh sách lớp:
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<form action="hocsinh" method="post" id="form_SaveDD">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="idDD" value="" id="idDD" />
						<input type="hidden" name="diemdanh" value=""  />
						<input type="hidden" name="lop" value="" id="lopDD" />
						<input type="hidden" name="namhoc" value="" id="namhocDD" />
						<input type="hidden" name="hocky" value="" id="hockyDD"  />
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Mã số học sinh</th>
									<th>Tên học sinh</th>
									<th>Vắng</th>
									<th>Ghi chú</th>
								</tr>
							</thead>
							<tbody id="content">
								
							</tbody>
						</table>
						<!-- /.table-responsive -->
						<input style="float:right" class="btn btn-primary" id="diemdanh" name="diemdanh" value="Lưu" type="submit" />
						<button style="float:left" class="btn btn-default" type="reset">Hủy bỏ</button>
					</form>
				</div>
			</div>
			<!-- /.panel-body -->

			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$('#data').hide();
	$('#search_DD').click(function(event) {
		$('#data').show();
		$.ajax({
			url: "hocsinh/searchDiemDanh",
			method: "GET",
			data: $("#form_DD").serialize(),
			dataType : 'json',
			success : function(result){
				html='';
				$.each (result, function (key, item){
					html+='<tr class="odd gradeX">'+
					'<td>'+ item.hocsinh_id +'</td>'+
					'<td>'+ item.hoten +'</td>'+
					'<td><input type="checkbox" name="checkbox" id="'+ item.hocsinh_id +'" value="'+ item.hocsinh_id +'"></td>'+
					'<td class=""><textarea name="note-'+ item.hocsinh_id +'" id="note-'+ item.hocsinh_id +'" disabled="" rows="3" col="5" value=""></textarea></td>'+
					'</tr>';
				});
				$('#content').html(html);
				$("input[name='checkbox']").click(function() {
					id=$(this).attr('id');
					if ($(this).is(':checked')) {
						$('#note-'+id).attr('disabled',false);
					} else {
						$('#note-'+id).val('');
						$('#note-'+id).attr('disabled',true);
					}
				});
				$('#diemdanh').click(function(event) {
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

