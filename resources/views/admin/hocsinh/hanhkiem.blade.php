@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		@if(session('thongbao'))
		<div class="alert alert-success">
			{{session('thongbao')}}
		</div>
		@endif
		<h4>Điểm danh</h4>
		<h4>Năm học: {{$namhoc[0]->ten}}</h4>
		<h4>{{$hocky[0]->ten}}</h4>
		<div class="card-body">
			<form action="hocsinh" method="post" accept-charset="utf-8">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="namhoc" value="{{$namhoc[0]->id}}" />
				<input type="hidden" name="hocky" value="{{$hocky[0]->id}}" />
				<div class="center">
					<h4>Lớp</h4>
					<select name="lop" class="form-control">
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
				<div style="width: 30%;margin:auto;margin-top: 10px">
					<input class="btn btn-primary  btn-block" type="submit" value="Tìm kiếm" name="search_HK" />
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
						<input type="hidden" name="namhoc" value="{{$namhoc_search}}" />
						<input type="hidden" name="lop" value="{{$lop_search}}" />
						<input type="hidden" name="hocky" value="{{$hocky_search}}" />
						<input type="hidden" name="data" value="" id="data" />
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Mã số học sinh</th>
									<th>Tên học sinh</th>
									<th>Xếp loại hạnh kiểm</th>
									<th>Ghi chú</th>
								</tr>
							</thead>
							<tbody>
								@foreach($hocsinh as $hs)
								<input type="hidden" name="hidden_hanhkiem" value="{{$hs->hocsinh_id}}" />
								<tr class="odd gradeX">
									<td>{{$hs->hocsinh_id}}</td>
									<td>{{$hs->hocsinh->hoten}}</td>
									<td>
										<select name="loaihanhkiem" class="form-control">
											@foreach($hanhkiem as $hk)
											<option value="{{$hk->id}}">{{$hk->ten}}</option>
											@endforeach
										</select>
									</td>
									<td><textarea name="hanhkiem-{{$hs->hocsinh_id}}" value=""></textarea></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<!-- /.table-responsive -->
						<input style="float:right" class="btn btn-primary" name="hanhkiem" value="Lưu" type="submit" onclick="return HanhKiem()"/>
						<button style="float:left" class="btn btn-default" type="reset">Hủy bỏ </button>
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
</script>
@endsection