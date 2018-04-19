@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<h4>Năm học:</h4>
					<select name ="namhoc" class="form-control" id="namhoc">
						@foreach($namhoc as $nh)
						<option value="{{$nh->id}}">{{$nh->ten}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-4">
					<h4>Lớp</h4>
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
					<h4>Học kỳ</h4>
					<select name="hocky" class="form-control" id="hocky">
						@foreach($hocky as $hk)
						<option @if(isset($hocky_search)&&$hocky_search==$hk->id) {{'selected'}} @endif value="{{$hk->id}}">{{$hk->ten}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div style="width: 30%;margin:auto;margin-top: 10px">
				<input class="btn btn-primary  btn-block" type="button" value="Tạo thời khóa biểu" name="create_thoikhoabieu" />
			</div>
		</div>
	</div>
	<div class="row" id="new">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Thời khóa biểu
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<form action="hocsinh" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="monday" value="" id="monday" />
						<input type="hidden" name="tuesday" value="" id="tuesday"/>
						<input type="hidden" name="wednesday" value="" id="wednesday"/>
						<input type="hidden" name="thursday" value="" id="thursday"/>
						<input type="hidden" name="friday" value="" id="friday"/>
						<input type="hidden" name="lop_submit" value="" />
						<input type="hidden" name="namhoc_submit" value="" />
						<input type="hidden" name="hocky_submit" value="" />
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>
										<select name="time">
											<option value="0">Sáng</option>
											<option value="1">Chiều</option>
										</select>
									</th>
									<th>Thứ hai</th>
									<th>Thứ ba</th>
									<th>Thứ tư</th>
									<th>Thứ năm</th>
									<th>Thứ sáu</th>
								</tr>
							</thead>
							<tbody>
								@for($i=1;$i<=5;$i++)
								<tr class="odd gradeX">
									<td>Tiết {{$i}}</td>
									<td>
										<select name="monhoc" class="monday">
											<option value="0">--Môn Học--</option>
											@foreach($monhoc as $mh)
											<option  value="{{$mh->id}}">{{$mh->ten}}</option>
											@endforeach
										</select>
									</td>
									<td>
										<select name="monhoc" class="tuesday">
											<option value="0">--Môn Học--</option>
											@foreach($monhoc as $mh)
											<option value="{{$mh->id}}">{{$mh->ten}}</option>
											@endforeach
										</select>
									</td>
									<td>
										<select name="monhoc" class="wednesday">
											<option value="0">--Môn Học--</option>
											@foreach($monhoc as $mh)
											<option value="{{$mh->id}}">{{$mh->ten}}</option>
											@endforeach
										</select>
									</td>
									<td>
										<select name="monhoc" class="thursday">
											<option value="0">--Môn Học--</option>
											@foreach($monhoc as $mh)
											<option value="{{$mh->id}}">{{$mh->ten}}</option>
											@endforeach
										</select>
									</td>
									<td>
										<select name="monhoc" class="friday">
											<option value="0">--Môn Học--</option>
											@foreach($monhoc as $mh)
											<option value="{{$mh->id}}">{{$mh->ten}}</option>
											@endforeach
										</select>
									</td>
								</tr>
								@endfor
							</tbody>
						</table>
						<input style="float:left" class="btn btn-primary" name="cancel" value="Hủy bỏ" type="reset"/>
						<input style="float:right" class="btn btn-primary" name="add_thoikhoabieu" value="Lưu" type="submit" onclick="return thoikhoabieu()"/>
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
	$( document ).ready(function() {
		$('#new').hide();
	});
	$("select[name='monhoc']").change(function() {
		var time=$(this).attr('class');
		var value=$(this).val();
		var count=0;
		//alert(time);
		var kind=$("."+time);
		var result=[];
		for(var i=0;i<kind.length;i++){
			if($(kind[i]).val()!=0&&$(kind[i]).val()==value){
				count++;
				//result.push($(kind[i]).val());
			}
		}
		if(count>=3){
			alert("Không được xếp 3 tiết"+value+" trong một ngày");
			$(this).val('0');
		}else{
			var lop=$("select[name='lop']").val();
			var hocky=$("select[name='hocky']").val();
			var monhoc=$("select[name='monhoc']");
			var all=[];
			var count1=0;
			for(var i=0;i<monhoc.length;i++){
				if($(monhoc[i]).val()!=0&&$(monhoc[i]).val()==value){
					count1++;
				}
				$.get("hocsinh/ajaxThoiKhoaBieu?monhoc="+value+"&sotiet="+count1+"&lop="+lop+"&hocky"+hocky,function(data){
					alert(data);
				});
			}
		}
	});

	function thoikhoabieu(){
		$('input[name="lop_submit"]').val($('#lop').val());
		$('input[name="namhoc_submit"]').val($('#namhoc').val());
		$('input[name="hocky_submit"]').val($('#hocky').val());
		var monday=$(".monday");
		var result1=[];
		for(var i=0;i<monday.length;i++){
			// result1.push($(monday[i]).val());
			result1[i]=$(monday[i]).val();
		}
		var tuesday=$(".tuesday");
		var result2=[];
		for(var i=0;i<tuesday.length;i++){
			// result2.push($(tuesday[i]).val());
			result2[i]=$(tuesday[i]).val();
		}
		var wednesday=$(".wednesday");
		var result3=[];
		for(var i=0;i<wednesday.length;i++){
			// result3.push($(wednesday[i]).val());
			result3[i]=$(wednesday[i]).val();
		}
		var thursday=$(".thursday");
		var result4=[];
		for(var i=0;i<thursday.length;i++){
			// result4.push($(thursday[i]).val());
			result4[i]=$(thursday[i]).val();
		}
		var friday=$(".friday");
		var result5=[];
		for(var i=0;i<friday.length;i++){
			// result5.push($(friday[i]).val());
			result5[i]=$(friday[i]).val();
		}

		$('input[name="monday"]').val(result1);
		$('input[name="tuesday"]').val(result2);
		$('input[name="wednesday"]').val(result3);
		$('input[name="thursday"]').val(result4);
		$('input[name="friday"]').val(result5);
		return true;
		
	}

	$("input[name='create_thoikhoabieu']").click(function(event) {
		$('#new').show();
	});
</script>
@endsection