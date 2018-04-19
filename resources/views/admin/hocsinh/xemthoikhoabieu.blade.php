@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<h3>Thời khóa biểu </h3>
		<div class="card-body">
			<form action="hocsinh" method="post" id="form_TKB">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="lop" value="" />
				<div class="row">
					<div class="col-md-4">
						<select name ="namhoc" class="form-control" id="namhoc">
							@foreach($namhoc as $nh)
							@foreach($hocky as $hk)
							<option value="{{$hk->id}}-{{$nh->id}}">{{$hk->ten}} Năm Học {{$nh->ten}}</option>
							@endforeach
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<h4>Lớp <span class="title"></span></h4>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div class="row" id="data">
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
							<input type="hidden" name="thoikhoabieu_id" id="thoikhoabieu_id" value="" />
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>
											<select name="time" id="time">
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
							<input style="float:right" class="btn btn-primary" name="edit_thoikhoabieu" value="Cập nhật" type="button" id="edit"/>
							<input style="float:left" class="btn btn-primary" id="del" name="del_thoikhoabieu" value="Xóa" type="submit" />
						</form>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
	</div>
</div>
<!-- /.col-lg-12 -->
@endsection
@section('script')
<script type="text/javascript">
	$('#data').hide();

	function show() {
		type=0;
		yearSelected=$('#namhoc :selected').text();
		yearCurrent=new Date().getFullYear();
		monthCurrent=new Date().getMonth();
		hocky_id=0;
		checkEdit=false;
		if (monthCurrent<=5) {
			hocky_id=2;
			yearCurrent='Học Kì 2 Năm Học '+(yearCurrent-1)+'-'+yearCurrent;
		}
		if (monthCurrent>=9) {
			hocky_id=1;
			yearCurrent='Năm Học '+yearCurrent +'-'+(yearCurrent+1);
		}
		if(yearSelected.indexOf(yearCurrent) !== -1){
			checkEdit=true;
		}else{
			checkEdit=false;
		}
		$.ajax({
			url: "hocsinh/search_xemTKB",
			method: "GET",
			data: $("#form_TKB").serialize(),
			dataType : 'json',
			success : function(result){
				if (result!=0) {
					type=0;//0 là edit
					$('#del').show();
					$.each (result, function (key,item){
						if (key!='time') {
							thu=$('.'+key);
							$.each (item, function (key,obj){
								$(thu[key]).val(obj.monhoc_id);
								$('#thoikhoabieu_id').val(obj.thoikhoabieu_id);
							});
						} else {
							if(item<=5) {
								$('#time').val(0);
							} else {
								$('#time').val(1);
							}
						}
					});

				} else {
					type=1;//1 là lưu
					$('select[name="monhoc"]').val(0);
					$('#del').hide();
				}
				if (checkEdit) {
					$('#edit').attr('disabled',false);
				} else {
					$('#edit').attr('disabled',true);
				}
				$('#data').show();
			}
		});
		$("#namhoc").change(function(){
			show();
		});
	}

	$("select[name='monhoc']").change(function() {
		var time=$(this).attr('class');
		var value=$(this).val();
		var count=0;
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
			var lop=$("input[name='lop']").val();
			var namhochocky=$("#namhoc").val();
			var hocky=namhochocky.split('-')[0];
			var monhoc=$("select[name='monhoc']");
			var all=[];
			var count1=0;
			for(var i=0;i<monhoc.length;i++){
				if($(monhoc[i]).val()==value){
					count1++;
				}
				$.get("hocsinh/ajaxThoiKhoaBieu?monhoc="+value+"&sotiet="+count1+"&lop="+lop+"&hocky="+hocky,function(data){
					if (data!='') {
						alert(data);
					}
				});
			}
		}
	});

	$('#edit').click(function(event) {
		if(type==0){
			monhoc=$("select[name='monhoc']");
			count=[];
			for(var i=0;i<monhoc.length;i++){
				if ($(monhoc[i]).val()==0) {
					alert('Thời khóa biểu chưa hoàn thành');
					return false;
				} else {
					if (count.indexOf($(monhoc[i]).val())==-1){
						count.push($(monhoc[i]).val());
					}
				}
			}
			if (count.length!=11) {
				alert('Chưa đủ tổng số môn');
				return false;
			}
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

		time=$('#time').val();
		thoikhoabieu_id=$('#thoikhoabieu_id').val();
		$.get("hocsinh/ajaxUpdateThoiKhoaBieu?thoikhoabieu_id="+thoikhoabieu_id+"&time="+time+"&monday="+result1+"&tuesday="+result2+"&wednesday="+result3+"&thursday="+result4+"&friday="+result5,function(data){
			alert('Cập nhật thành công');
		});
	}

	if (type==1) {
		monhoc=$("select[name='monhoc']");
		count=[];
		for(var i=0;i<monhoc.length;i++){
			if ($(monhoc[i]).val()==0) {
				alert('Thời khóa biểu chưa hoàn thành');
				return false;
			} else {
				if (count.indexOf($(monhoc[i]).val())==-1){
					count.push($(monhoc[i]).val());
				}
			}
		}
		if (count.length!=11) {
			alert('Chưa đủ tổng số môn');
			return false;
		}
		namhochocky=$('#namhoc').val();
		lop=$('input[name="lop"]').val();
		time=$('#time').val();
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

		$.get("hocsinh/ajaxAddThoiKhoaBieu?lop="+lop+"&namhochocky="+namhochocky+"&time="+time+"&monday="+result1+"&tuesday="+result2+"&wednesday="+result3+"&thursday="+result4+"&friday="+result5,function(data){
			alert('Lưu thành công');
		});
		
		return true;
	}

});

	$('#del').click(function(event) {
		if(confirm('Bạn có muốn xóa không?')) {
			thoikhoabieu_id=$('#thoikhoabieu_id').val();
			$.get("hocsinh/ajaxDelThoiKhoaBieu?thoikhoabieu_id="+thoikhoabieu_id,function(data){
				$("#data").html('');
				alert('Xóa thành công');
			});
		}
		return false;
	});

	$('.lop').click(function(event) {
		id=$(this).attr('id');
		id_lop=id.split('-')[0];
		name=id.split('-')[1];
		$('.title').html(name);
		$('input[name="lop"]').val(id_lop);
		show();
		return false;
	});

</script>
@endsection