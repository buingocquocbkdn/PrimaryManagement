@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body" style="text-align: center;">
			<h2>Hạnh kiểm</h2>
			<form action="hocsinh" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="row">
					<div class="col-md-4">
						<h4>Chọn lớp </h4>
						<select name="lop" class="form-control" id="lop">
							<optgroup label="Khối lớp 1">
								@foreach($lop as $l)
								@if($l->khoilop_id==1)
								<option @if(isset($lop_search)&&$lop_search==$l->id) {{"selected"}} @endif value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 2">
								@foreach($lop as $l)
								@if($l->khoilop_id==2)
								<option @if(isset($lop_search)&&$lop_search==$l->id) {{"selected"}} @endif value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 3">
								@foreach($lop as $l)
								@if($l->khoilop_id==3)
								<option @if(isset($lop_search)&&$lop_search==$l->id) {{"selected"}} @endif value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 4">
								@foreach($lop as $l)
								@if($l->khoilop_id==4)
								<option @if(isset($lop_search)&&$lop_search==$l->id) {{"selected"}} @endif value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
							<optgroup label="Khối lớp 5">
								@foreach($lop as $l)
								@if($l->khoilop_id==5)
								<option @if(isset($lop_search)&&$lop_search==$l->id) {{"selected"}} @endif value="{{$l->id}}">{{$l->ten}}</option>
								@endif
								@endforeach
							</optgroup>
						</select>
					</div>
					<div class="col-md-4">
						<h4>Năm học:</h4>
						<select name ="namhoc" class="form-control" id="namhoc">
							@foreach($namhoc as $nh)
							<option @if(isset($namhoc_search)&&$namhoc_search==$nh->id) {{'selected'}} @endif value="{{$nh->id}}">{{$nh->ten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4">
						<h4>Học kỳ:</h4>
						<select name ="hocky" class="form-control" id="hocky">
							@foreach($hocky as $hk)
							<option @if(isset($hocky_search)&&$hocky_search==$nh->id) {{'selected'}} @endif value="{{$hk->id}}">{{$hk->ten}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div style="width: 30%;margin:auto;margin-top: 10px">
					<input class="btn btn-primary  btn-block" type="submit" value="Tìm kiếm" name="search_xemHK" />
				</div>
			</form>
		</div>
	</div>

	<!-- /.row -->
	@if(!empty($hocsinh))
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
						<input type="hidden" name="namhoc" id="namhoc_search" value="{{$namhoc_search}}" />
						<input type="hidden" name="lop" id="lop_search" value="{{$lop_search}}" />
						<input type="hidden" name="hocky" id="hocky_search" value="{{$hocky_search}}" />
						<input type="hidden" name="data" value="" id="data" />
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Mã số học sinh</th>
									<th>Tên học sinh</th>
									<th>Xếp loại hạnh kiểm</th>
									<th>Ghi chú</th>
									@if($edit==1)
									<th>Sửa</th>
									@endif
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody id="result">
								@foreach($hocsinh as $hs)
								<tr class="odd gradeX">
									<td>{{$hs->hocsinh_id}}</td>
									<td>{{$hs->hocsinh->hoten}}</td>
									<td>
										<select name="loaihanhkiem" disabled="" id="loaihanhkiem-{{$hs->id}}" class="form-control">
											@foreach($hanhkiem as $hk)
											<option @if($hs->hanhkiem_id==$hk->id) {{'selected'}} @endif value="{{$hk->id}}">{{$hk->ten}}</option>
											@endforeach
										</select>
									</td>
									<td><textarea disabled="" id="note-{{$hs->id}}" name="hanhkiem-{{$hs->hocsinh_id}}" value=""></textarea></td>
									@if($edit==1)
									<td>
										<div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><input type="button" class="edit" name="{{$hs->id}}" value="Sửa" /></i></div>
									</td>
									@endif
									<td>
										<div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><input type="submit" class="del" name="" value="Xóa" onclick="return del({{$hs->id}})"/></i></div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<!-- /.table-responsive -->
					</form>
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
	function HanhKiem(){
		var data=$("input[name='hidden_hanhkiem']");
		var result=[];
		for(var i=0;i<data.length;i++){
			result.push($(data[i]).val());
		}
		$("#data").val(result);
		return true;
	}
</script>
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});

	$('input[type="button"]').click(function(event) {
		clas=$(this).attr('class');
		if(clas=="edit"){
			id=$(this).attr('name');
			$("select[name='loaihanhkiem']").attr('disabled',true);
			$("textarea").attr('disabled',true);
			$("input[type='button']").val('Sửa');
			$('#loaihanhkiem-'+id).attr('disabled',false);
			$('#note-'+id).attr('disabled',false);
			$(this).val('Lưu');
			$(this).attr('class','save');

		}
		if(clas=="save"){
			$('.save').attr('class','edit');
			$(this).val('Sửa');

			loaihanhkiem=$('#loaihanhkiem-'+id).val();
			note=$('#note-'+id).val();
			$.get("hocsinh/ajaxEditHanhKiem?id="+id+"&loaihanhkiem="+loaihanhkiem+"&note="+note,function(data){
				$('#loaihanhkiem-'+id).attr('disabled',true);
				$('#note-'+id).attr('disabled',true);
				alert('Lưu thành công');
			});

		}
		
		
	});

	function del(id){
		namhoc=$('#namhoc_search').val();
		lop=$('#lop_search').val();
		hocky=$('#hocky_search').val();
		$.get("hocsinh/ajaxDelHanhKiem?id="+id+"&namhoc="+namhoc+"&lop="+lop+"&hocky="+hocky,function(data){
			$('#result').html(data);
			alert('Xóa thành công');
		});
		return false;
	}
</script>
@endsection