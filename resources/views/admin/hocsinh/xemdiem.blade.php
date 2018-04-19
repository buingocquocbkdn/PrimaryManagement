@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<form action="hocsinh" method="post" id="form_D">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="lop" value="" />
				<input type="hidden" name="monhoc" value="" />
				<input type="hidden" name="result" value="" />
				<input type="hidden" name="idHS" value="" />
				<input type="hidden" name="exportFileDiem" value="" />
				<div class="row">
					<div class="col-md-4">
						<h4>Năm học:</h4>
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
	<!-- /.row -->
	<div class="row" id="data">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<input id="export" class="btn btn-primary icon-btn" type="button" name="export" id="export" value="Xuất file" />
				<!-- /.panel-heading -->
				<div class="panel-body">
					<form action="hocsinh" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th rowspan="2">Mã số học sinh</th>
									<th rowspan="2">Tên học sinh</th>
									<th colspan="3">
										<select name="monhoc" class="form-control" id="monhoc">
											<option value="0">--Chọn môn học--</option>
											@foreach($monhoc as $mh)
											<option value="{{$mh->id}}">{{$mh->ten}}</option>
											@endforeach
										</select>
									</th>
									<th rowspan="2">Tổng kết</th>
								</tr>
								<tr>
									<th>Hệ số 1</th>
									<th>Hệ số 2</th>
									<th>Hệ số 3</th>
								</tr>
							</thead>
							<tbody id="content">
							</tbody>
						</table>
						<!-- /.table-responsive -->
						<input style="float:right" class="btn btn-primary" name="edit" value="Cập nhật" type="button" id="edit"/>
						<input style="float:left" class="btn btn-primary" id="confirm" name="confirm" value="Xác nhận" type="submit" />
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
<script>
	$(document).ready(function() {
		$('#data').hide();
		$('#edit').hide();
		$('#export').hide();
		$('#confirm').hide();

		function show() {
			$('#data').show();
			$('#content').html('');
			monhoc=$('input[name="monhoc"]').val();
			if (monhoc!=0) {
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
					yearCurrent='Học Kì 1 Năm Học '+yearCurrent +'-'+(yearCurrent+1);
				}
				if(yearSelected.indexOf(yearCurrent) !== -1){
					checkEdit=true;
				}else{
					checkEdit=false;
				}
				$.ajax({
					url: "hocsinh/search_xemD",
					method: "GET",
					data: $("#form_D").serialize(),
					dataType : 'json',
					success : function(result){
						html='';
						checkConfirm=false;
						$.each (result, function (key, item){
							html+='<tr>'+
							'<td>'+ item[0]+'</td>'+
							'<td>'+ item[1]+'</td>'+
							'<td><input type="text" class="diemmonhoc" name="'+ item[0]+'" value="'+ item[2]+'" /></td>'+
							'<td><input type="text" class="diemmonhoc" name="'+ item[0]+'" value="'+ item[3]+'" /></td>'+
							'<td><input type="text" class="diemmonhoc" name="'+ item[0]+'" value="'+ item[4]+'" /></td>'+
							'<td class="dtb">'+ item[5]+'</td></tr>';

							if (item[5]=='') {
								checkConfirm=true;
							} else {
								checkConfirm=false;
							}
						});
						if (checkEdit) {
							if (checkConfirm) {
								$('#edit').show();
								$('#confirm').show();
							} else {
								$('#edit').hide();
								$('#confirm').hide();
							}
						} else {
							$('#edit').hide();
							$('#confirm').hide();
						}
						$('#content').html(html);
        // //del
        // $('.del').click(function(event) {
        // 	if(confirm('Bạn muốn xóa không?')) {
        // 		$('.dtb').val(0);
        // 		id=$(this).attr('name');
        // 		$('input[name="idHS"]').val(id);
        // 		data=$('input[name="'+id+'"]');
        // 		for(var i=0;i<data.length;i++){
        // 			id_diem=$(data[i]).attr('name');
        // 			$(data[i]).val('');
        // 		}
        // 		$.ajax({
        // 			url: "hocsinh/ajaxDelDiem",
        // 			method: "GET",
        // 			data: $("#form_D").serialize(),
        // 			dataType : 'text',
        // 			success : function(result){
        // 				alert('Xóa thành công');
        // 			}
        // 		});

        // 	}
        // });
        //edit
        $('#edit').click(function(event) {
        	data=$(".diemmonhoc");
        	var result='';
        	for(var i=0;i<data.length;i++){
        		diem=$(data[i]).val();
        		if (diem!='') {
        			result+=diem+',';
        		} else {
        			result+=0+',';
        		}
        	}

        	$('input[name="result"]').val(result);
        	$.ajax({
        		url: "hocsinh/ajaxEditDiem",
        		method: "GET",
        		data: $("#form_D").serialize(),
        		dataType : 'text',
        		success : function(result){
        			alert('Cập nhật thành công');
        		}
        	});
        });

        //confirm
        $('#confirm').click(function(event) {
        	data=$(".diemmonhoc");
        	for(var i=0;i<data.length;i++){
        		diem=$(data[i]).val();
        		if (diem=='') {
        			alert('Chưa hoàn thành các cột điểm');
        			return false;
        		} 
        	}

        	var result='';
        	for(var i=0;i<data.length;i++){
        		diem=$(data[i]).val();
        		result+=diem+',';
        	}
        	$('input[name="result"]').val(result);
        	$.ajax({
        		url: "hocsinh/ajaxConfirmDiem",
        		method: "GET",
        		data: $("#form_D").serialize(),
        		dataType : 'text',
        		success : function(result){
        			alert('Đã xác nhận');
        			show();
        		}
        	});
        	return false;
        });
        
    }
});
			}

			$("#namhoc").change(function(){
				show();
			});
			$('#monhoc').change(function(event) {
				if ($(this).val()!=0) {
					$('#export').show();
				} else {
					$('#export').hide();
				}
				$('input[name="monhoc"]').val($(this).val());
				show();
			});
		}

		$('.lop').click(function(event) {
			id=$(this).attr('id');
			id_lop=id.split('-')[0];
			name=id.split('-')[1];
			$('.title').html(name);
			$('input[name="lop"]').val(id_lop);
			show();
			return false;
		});

		$('#export').click(function(event) {
			$('#form_D').submit();
			return false;
		});
	});
</script>
@endsection