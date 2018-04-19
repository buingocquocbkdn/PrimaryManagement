@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<form action="hocsinh" method="post" id="form_TK">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="lop" value="" />
				<input type="hidden" name="hocky" value="" />
				<input type="hidden" name="result" value="" />
				<div class="row">
					<div class="col-md-4">
						<h4>Năm học:</h4>
						<select name ="namhoc" class="form-control" id="namhoc">
							@foreach($namhoc as $nh)
							<option value="{{$nh->id}}">Năm Học {{$nh->ten}}</option>
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
				<div class="panel-heading">
					<select name ="hocky" class="form-control" id="hocky">
						<option value="1">Học kỳ 1</option>
						<option value="2">Học kỳ 2</option>
						<option value="3">Cả năm</option>
					</select>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<form action="hocsinh" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Mã số học sinh</th>
									<th>Tên học sinh</th>
									@foreach($monhoc as $mh)
									<th>{{$mh->ten}}</th>
									@endforeach
									<th>Tổng kết</th>
									<th>Hạnh kiểm</th>
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
		$('#confirm').hide();
		function show() {
			$('#data').show();
			$('#content').html('');
			hocky=$('#hocky').val();
			$('input[name="hocky"]').val(hocky);
			if (hocky!=0) {
				yearSelected=$('#namhoc :selected').text();
				yearCurrent=new Date().getFullYear();
				monthCurrent=new Date().getMonth();
				hocky_id=0;
				checkEdit=false;
				if (monthCurrent<=5) {
					hocky_id=2;
					yearCurrent='Năm Học '+(yearCurrent-1)+'-'+yearCurrent;
				}
				if (monthCurrent>=9) {
					hocky_id=1;
					yearCurrent='Năm Học '+yearCurrent +'-'+(yearCurrent+1);
				}
				if(yearSelected.indexOf(yearCurrent) !== -1){
					if (hocky==hocky_id) {
						checkEdit=true;
					} else {
						checkEdit=false;
					}
				}else{
					checkEdit=false;
				}

				if (hocky==3) {
					checkEdit=false;
				}
				$.ajax({
					url: "hocsinh/search_xemTongKet",
					method: "GET",
					data: $("#form_TK").serialize(),
					dataType : 'json',
					success : function(result){
						html='';
						dem=<?php echo count($monhoc);?>;
						hanhkiem=<?php echo $hanhkiem;?>;
						checkConfirm=false;
						$.each (result, function (key, item){
							html+='<tr>'+
							'<td>'+ item[0]+'</td>'+
							'<td>'+ item[1]+'</td>';
							for (var i = 0; i < dem; i++) {
								html+='<td class="dtb">'+ item[i+2]+'</td>';
							}

							html+='<td>'+ item[dem+2]+'</td>';
							html+='<td><select name="hanhkiem">';
							$.each (hanhkiem, function (k, value){
								if (value.id==item[dem+3]) {
									choose='selected="selected"';
								} else {
									choose='';
								}
								html+='<option '+ choose +' value="'+ value.id +'">'+ value.ten +'</option>';
							});
							html+='</select></td>';

							if (item[dem+2]=='') {
								checkConfirm=true;
							} else {
								checkConfirm=false;
							}

							html+='</tr>';
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
						// $('#dataTables-example').DataTable({
						// 	responsive: true
						// });

        //edit
        $('#edit').click(function(event) {
        	data=$("select[name='hanhkiem']");
        	var result='';
        	for(var i=0;i<data.length;i++){
        		hanhkiem=$(data[i]).val();
        		result+=hanhkiem+',';
        	}
        	$('input[name="result"]').val(result);
        	$.ajax({
        		url: "hocsinh/ajaxEditHanhKiem",
        		method: "GET",
        		data: $("#form_TK").serialize(),
        		dataType : 'text',
        		success : function(result){
        			alert('Cập nhật thành công');
        		}
        	});
        });

        //confirm
        $('#confirm').click(function(event) {
        	data=$(".dtb");
        	for(var i=0;i<data.length;i++){
        		dtb=$(data[i]).val();
        		if (dtb=='') {
        			alert('Chưa xác nhận điểm các môn học');
        			return false;
        		} 
        	}

        	data=$("select[name='hanhkiem']");
        	var result='';
        	for(var i=0;i<data.length;i++){
        		hanhkiem=$(data[i]).val();
        		result+=hanhkiem+',';
        	}
        	$('input[name="result"]').val(result);

        	$.ajax({
        		url: "hocsinh/ajaxConfirmTongHop",
        		method: "GET",
        		data: $("#form_TK").serialize(),
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
			$('#hocky').change(function(event) {
				$('input[name="hocky"]').val($(this).val());
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
	});
</script>
@endsection