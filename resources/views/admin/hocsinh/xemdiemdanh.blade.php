@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
			<h2>Điểm danh</h2>
			<div class="row">
				<form action="" method="" id="form_DD">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<input type="hidden" name="lop" value="" />
					<div class="col-md-4">
						<select name ="namhoc" class="form-control" id="namhoc">
							@foreach($namhoc as $nh)
							<option value="{{$nh->id}}">Năm học {{$nh->ten}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<h4>Lớp <span class="title"></span></h4>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<div class="row" id="data">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"  style="padding: 30px">
					Danh sách lớp:
					<span id="add"></span>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<form action="hocsinh" method="post" id="form_SaveDD">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="diemdanh" value=""  />
						<input type="hidden" name="idDD" value="" id="idDD" />
						<input type="hidden" name="lop" value="" id="lopDD" />
						<input type="hidden" name="namhoc" value="" id="namhocDD" />
						<input type="hidden" name="hocky" value="" id="hockyDD"  />
						<table id="viewdiemdanh" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							
						</table>
						<div id="DD"></div>
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Mã số học sinh</th>
									<th>Tên học sinh</th>
									<th>Học kì 1</th>
									<th>Học kì 2</th>
								</tr>
							</thead>
							<tbody id="content">

							</tbody>
						</table>
						<!-- /.table-responsive -->
						
					</form>
				</div>
			</div>
			<!-- /.panel-body -->
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	@include('admin.hocsinh.chitietdiemdanh')
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#data').hide();
		function show() {
			$('#viewdiemdanh').hide();
			$('#DD').hide();
			$('#data').show();
			$('#dataTables-example').show();
			yearSelected=$('#namhoc :selected').text();
			yearCurrent=new Date().getFullYear();
			monthCurrent=new Date().getMonth();
			hocky_id=0;
			checkEditDetail=false;
			checkDD=false;
			if (monthCurrent<=5) {
				hocky_id=2;
				yearCurrent='Năm học '+(yearCurrent-1)+'-'+yearCurrent;
			}
			if (monthCurrent>=9) {
				hocky_id=1;
				yearCurrent='Năm học '+yearCurrent +'-'+(yearCurrent+1);
			}
			if(yearSelected==yearCurrent){
				checkEditDetail=true;
				checkDD=true;

				html='<button type="button" id="diemdanh" style="float:right;" class="btn btn-info">Điểm danh</button>';
				$('#add').html(html);
			}else{
				checkEditDetail=false;
				checkDD=false;
				$('#add').html('');
			}
			arrayHS=[];
			$.ajax({
				url: "hocsinh/search_xemDD",
				method: "GET",
				data: $("#form_DD").serialize(),
				dataType : 'json',
				success : function(result){
					html='';
					
					$.each (result, function (key, item){
						arrayHS[key]=item;
						html+='<tr class="odd gradeX" id="hocsinh-'+ item.hocsinh_id +'">'+
						'<td class="center">'+ item.hocsinh_id +'</td>'+
						'<td class="center">'+ item.hoten +'</td>'+
						'<td class="center"><a href="javascript:void(0)" class="detail" id="1-'+item.hocsinh_id +'" class="edit" >Chi tiết</a></td>'+
						'<td class="center"><a href="javascript:void(0)" class="detail" id="2-'+item.hocsinh_id +'" class="edit" >Chi tiết</a></td>'+
						' </tr>';
					});
					$('#content').html(html);
					$("#namhoc").change(function(){
						show();
					});
					namhoc=$('#namhoc').val();
					lop=$('input[name="lop"]').val();
					  //edit
					  $('.detail').click(function(event) {
					  	attr=$(this).attr('id').split('-');
					  	hocky=attr[0];
					  	id=attr[1];
					  	$.ajax({
					  		url: "hocsinh/detailDiemDanh",
					  		method: "GET",
					  		data: {
					  			'id':id,
					  			'namhoc':namhoc,
					  			'hocky':hocky,
					  			'lop':lop
					  		},
					  		dataType : 'json',
					  		success : function(result){
					  			html='';
					  			$.each (result, function (key, item){
					  				html+='<tr class="odd gradeX">'+
					  				'<td class="center">'+ item.ngayvang +'</td>'+
					  				'<td class="center"><textarea name="'+item.id +'" disabled>'+ item.ghichu +'</textarea></td>'+
					  				'<td class="center">';
					  				if (checkEditDetail) {
					  					html+='<a href="javascript:void(0)" id="'+item.id +'" class="edit" >Sửa</a>';
					  				}
					  				html+='</td>'+
					  				'<td class="center"><a href="javascript:void(0)" id="'+item.id +'" class="del" >Xóa</a></td>'+
					  				' </tr>';
					  			});
					  			$('#detailDiemDanh').html(html);
					  			$('#myModal').modal('show');

					  			$('.edit').click(function(event) {
					  				id=$(this).attr('id');
					  				if ($(this).text()=='Sửa') {
					  					$('textarea[name="'+id+'"]').attr('disabled',false);
					  					$(this).text('Cập nhật');
					  				} else {
					  					$(this).text('Sửa');
					  					$('textarea[name="'+id+'"]').attr('disabled',true);
					  					ghichu=$('textarea[name="'+id+'"]').val();
					  					$.ajax({
					  						url: "hocsinh/editDiemDanh",
					  						method: "GET",
					  						data: {
					  							'id':id,
					  							'ghichu':ghichu
					  						},
					  						dataType : 'text',
					  						success : function(result){
					  							alert('Cập nhật thành công');
					  						}
					  					});
					  				}
					  			});

					  			$('.del').click(function(event) {
					  				if(confirm('Bạn muốn xóa không?')) {
					  					id=$(this).attr('id');
					  					$.ajax({
					  						url: "hocsinh/delDiemDanh",
					  						method: "delete",
					  						data: {
					  							"_token": "{{csrf_token() }}",
					  							'id': id
					  						},
					  						dataType : 'text',
					  						success : function(result){
					  							alert('Xóa thành công');
					  							$('#myModal').modal('hide');
					  						}
					  					});
					  				}
					  			});
					  		}
					  	});
					  });
					}
				});
			if (checkDD==true) {
				$('#diemdanh').click(function(event) {
					$('#dataTables-example').hide();
					html='<thead>'+
					'<tr>'+
					'<th>Mã số học sinh</th>'+
					'<th>Tên học sinh</th>'+
					'<th>Vắng</th>'+
					'<th>Ghi chú</th>'+
					'</tr>'+
					'</thead>'+
					'<tbody>';
					$.each (arrayHS, function (key, item){
						html+='<tr class="odd gradeX">'+
						'<td class="center">'+ item.hocsinh_id +'</td>'+
						'<td class="center">'+ item.hoten +'</td>'+
						'<td><input type="checkbox" name="checkbox" id="'+ item.hocsinh_id +'" value="'+ item.hocsinh_id +'"></td>'+
						'<td class=""><textarea name="note-'+ item.hocsinh_id +'" id="note-'+ item.hocsinh_id +'" disabled="" rows="3" col="5" value=""></textarea></td>'+
						'</tr>';
					});
					html+='</tbody>';
					DD='<input style="float:right" class="btn btn-primary" id="save" name="diemdanh" value="Lưu" type="submit" />'+
					'<button style="float:left" class="btn btn-default" type="reset">Hủy bỏ</button>';
					$('#viewdiemdanh').html(html);
					$('#viewdiemdanh').show();
					$('#DD').show();
					$('#DD').html(DD);
					$("input[name='checkbox']").click(function() {
						id=$(this).attr('id');
						if ($(this).is(':checked')) {
							$('#note-'+id).attr('disabled',false);
						} else {
							$('#note-'+id).val('');
							$('#note-'+id).attr('disabled',true);
						}
					});
					$('#save').click(function(event) {
						var checkbox=$("input[name='checkbox']:checked");

						if (checkbox.length==0) {
							alert('Không có dữ liệu');
							return false;
						}

						var result=[];
						for(var i=0;i<checkbox.length;i++){
							result.push($(checkbox[i]).val());
						}
						$("#idDD").val(result);
						$("#lopDD").val($('input[name="lop"]').val());
						$("#namhocDD").val($('#namhoc').val());
						$("#hockyDD").val(hocky_id);
						$.ajax({
							url: "hocsinh",
							method: "POST",
							data: $("#form_SaveDD").serialize(),
							dataType : 'text',
							success : function(result){
								show();
								alert('Lưu thành công');
							}
						});

						return false;
					});

					return false;
				});
			}
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