@extends('admin.inc.index')
@include('admin.inc.left-bar')
@section('content')
@include('admin.hocsinh.xeplop')
<div class="content-wrapper">
	<h3 class="card-title">Chuyển lớp</h3>
	@if (date('m')>=5)
	<h4 class="card-title">Năm học {{$namhocDen[1]->ten}}</h4>
	<input type="hidden" id="namhocChuyenLop" name="" value="{{$namhocDen[1]->id}}" />
	@else
	<h4 class="card-title">Năm học {{$namhocDen[0]->ten}}</h4>
	<input type="hidden" id="namhocChuyenLop" name="" value="{{$namhocDen[0]->id}}" />
	@endif
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<h4>Chuyển đi</h4>
				<form action="hocsinh" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="row">
						<div class="col-md-6">
							<select name="lopchuyendi" class="form-control" id="lopchuyendi">
								<option value="0">---Chọn lớp---</option>
							</select>
						</div>
						<div class="col-md-6">
							<input class="btn btn-primary" type="button" id="open_phanlop" name="open_phanlop" value="Mở" onclick="return Check()" />
						</div>
					</div>
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Mã số sinh viên</th>
									<th>Họ tên</th>
									<th>Chọn tất cả <input type="checkbox" id="chkAll"></th>
								</tr>
							</thead>
							<tbody class="dataDi">

							</tbody>
						</table>
						<!-- /.table-responsive -->
					</div>
					<div class="row">
						<div class="col-md-6">
							<input class="btn btn-primary" type="button" name="send" value="Chuyển đi" onclick="return ChuyenDi()" />
						</div>
						<div class="col-md-6">
							<input class="btn btn-default" type="button" name="open" value="Hủy bỏ" onclick="return CancelChuyenDi()" />
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<h4>Chuyển đến</h4>
				<form action="hocsinh" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<input type="hidden" name="dataSave" value="" id="dataSave" />
					<div class="row">
						<div class="col-md-6">
							<select name="lopchuyenden" class="form-control" id="lopchuyenden" onchange="TiSo()">
								<option value="0">---Chọn lớp---</option>
							</select>
						</div>
						<div class="col-md-3">
							Tỉ số: <span id="tiso">0</span>/40
						</div>
						<div class="col-md-3">
							<input class="btn btn-primary" type="submit" id="save" name="save_phanlop" value="Lưu" onclick="return Save()" />
						</div>

					</div>
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Mã số sinh viên</th>
									<th>Họ tên</th>
									<th>Chọn tất cả <input type="checkbox" id="chkAllDen"></th>
								</tr>
							</thead>
							<tbody class="dataDen">

							</tbody>
						</table>
						<!-- /.table-responsive -->
					</div>
					<div class="row">
						<div class="col-md-6">
							<input class="btn btn-primary" type="button" name="back" value="Chuyển về" onclick="return ChuyenVe()" />
						</div>
						<div class="col-md-6">
							<input class="btn btn-default" type="button" name="cancel" value="Hủy bỏ" onclick="return CancelChuyenVe()" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		//check all đi
		$('#chkAll').click(function(event) {
			if(this.checked) {
				$("input[name='checkboxDi']").each(function() {
					this.checked = true;
				});
			}
			else {
				$("input[name='checkboxDi']").each(function() {
					this.checked = false;
				});
			}
		});
		//check all den
		$('#chkAllDen').click(function(event) {
			if(this.checked) {
				$("input[name='checkboxDen']").each(function() {
					this.checked = true;
				});
			}
			else {
				$("input[name='checkboxDen']").each(function() {
					this.checked = false;
				});
			}
		});

	});

	function ChuyenDi() {
		var checkboxNotChecked=$("input[name='checkboxDi']:not(:checked)");
		var resultNotChecked=[];
		for(var i=0;i<checkboxNotChecked.length;i++){
			resultNotChecked.push($(checkboxNotChecked[i]).val());
		}

		var checkboxChecked=$("input[name='checkboxDi']:checked");
		var resultChecked=[];
		for(var i=0;i<checkboxChecked.length;i++){
			resultChecked.push($(checkboxChecked[i]).val());
		}
		var checkboxDen=$("input[name='checkboxDen']");

		$.ajax({
			url: "hocsinh/ajaxChuyenDen",
			method: "GET",
			data: {
				'result': JSON.stringify(resultChecked),//array as a string
			},
			dataType : 'json',
			success : function(result){
				html='';
				$.each (result, function (key, item){
					html+='<tr class="odd gradeX">'+
					'<td class="center">'+item.id+'</td>'+
					'<td class="center">'+item.hoten+'</td>'+
					'<td class="center"><input type="checkbox" name="checkboxDen" value="'+item.id+'"></td> </tr>';
				});
				$('.dataDen').append(html);
			}
		});

		$.ajax({
			url: "hocsinh/ajaxChuyenDi",
			method: "GET",
			data: {
				'result': JSON.stringify(resultNotChecked),
			},
			dataType : 'json',
			success : function(result){
				html='';
				$.each (result, function (key, item){
					html+='<tr class="odd gradeX">'+
					'<td class="center">'+item.id+'</td>'+
					'<td class="center">'+item.hoten+'</td>'+
					'<td class="center"><input type="checkbox" name="checkboxDi" value="'+item.id+'"></td> </tr>';
				});
				$(".dataDi").html(html);
			}
		});

		var lopchuyenden=$('#lopchuyenden').val();
		var namhocChuyenLop=$('#namhocChuyenLop').val();

		$.ajax({
			url: "hocsinh/ajaxTiSo",
			method: "GET",
			data: {
				'lopchuyenden':lopchuyenden,
				'namhocDen':namhocChuyenLop,
			},
			dataType : 'json',
			success : function(result){
				$("#tiso").html(parseInt(result)+checkboxDen.length+checkboxChecked.length);
			}
		});
		return false;
	}

	function ChuyenVe() {
		var checkboxNotChecked=$("input[name='checkboxDen']:not(:checked)");
		var resultNotChecked=[];
		for(var i=0;i<checkboxNotChecked.length;i++){
			resultNotChecked.push($(checkboxNotChecked[i]).val());
		}

		var checkboxChecked=$("input[name='checkboxDen']:checked");
		var resultChecked=[];
		for(var i=0;i<checkboxChecked.length;i++){
			resultChecked.push($(checkboxChecked[i]).val());
		}

		$.ajax({
			url: "hocsinh/ajaxChuyenDenVe",
			method: "GET",
			data: {
				'result': JSON.stringify(resultNotChecked),
			},
			dataType : 'json',
			success : function(result){
				html='';
				$.each (result, function (key, item){
					html+='<tr class="odd gradeX">'+
					'<td class="center">'+item.id+'</td>'+
					'<td class="center">'+item.hoten+'</td>'+
					'<td class="center"><input type="checkbox" name="checkboxDen" value="'+item.id+'"></td> </tr>';
				});
				$(".dataDen").html(html);
			}
		});
		
		$.ajax({
			url: "hocsinh/ajaxChuyenDiVe",
			method: "GET",
			data: {
				'result': JSON.stringify(resultChecked),
			},
			dataType : 'json',
			success : function(result){
				html='';
				$.each (result, function (key, item){
					html+='<tr class="odd gradeX">'+
					'<td class="center">'+item.id+'</td>'+
					'<td class="center">'+item.hoten+'</td>'+
					'<td class="center"><input type="checkbox" name="checkboxDi" value="'+item.id+'"></td> </tr>';
				});
				$(".dataDi").append(html);
			}
		});
		var lopchuyenden=$('#lopchuyenden').val();
		var namhocChuyenLop=$('#namhocChuyenLop').val();
		$.ajax({
			url: "hocsinh/ajaxTiSo",
			method: "GET",
			data: {
				'lopchuyenden':lopchuyenden,
				'namhocDen':namhocChuyenLop,
			},
			dataType : 'json',
			success : function(result){
				$("#tiso").html(parseInt(result)+checkboxNotChecked.length);
			}
		});
		return false;
		
	}

	function CancelChuyenDi(){
		$(".dataDi").html('');
		$("#chkAll").removeAttr('checked');

	}
	function CancelChuyenVe(){
		$("#chkAllDen").removeAttr('checked');
		$(".dataDen").html('');
		$("input[name='checkData']").val('');
		var namhocChuyenLop=$('#namhocChuyenLop').val();
		var lopchuyendi=$('#lopchuyendi').val();

		$.ajax({
			url: "hocsinh/ajaxCancel",
			method: "GET",
			data: {
				'namhoc': namhocChuyenLop,
				'lopchuyendi': lopchuyendi,
			},
			dataType : 'json',
			success : function(result){
				html='';
				$.each (result, function (key, item){
					html+='<tr class="odd gradeX">'+
					'<td class="center">'+item.hocsinh_id+'</td>'+
					'<td class="center">'+item.hoten+'</td>'+
					'<td class="center"><input type="checkbox" name="checkboxDi" value="'+item.hocsinh_id+'"></td> </tr>';
				});
				$(".dataDi").html(html);
				$("#tiso").html('');
			}
		});

	}

	function Save(){
		tiso=$('#tiso').text();
		var checkbox=$("input[name='checkboxDen']");
		if(checkbox.length==0){
			alert('Chưa có học sinh');
			return false;
		} 
		if(parseInt(tiso)>40){
			alert('Tỉ số lớn hơn quy định');
			return false;
		} 
		namhocChuyenLop=$('#namhocChuyenLop').val();
		var result=[];
		for(var i=0;i<checkbox.length;i++){
			result.push($(checkbox[i]).val());
		}
		lopchuyendi=$('#lopchuyendi').val();
		lopchuyenden=$('#lopchuyenden').val();
		$.ajax({
			url: "hocsinh/saveChuyenLop",
			method: "GET",
			data: {
				'namhocChuyenLop': namhocChuyenLop,
				'lopchuyendi': lopchuyendi,
				'lopchuyenden': lopchuyenden,
				'result': JSON.stringify(result),
			},
			dataType : 'text',
			success : function(result){
				$(".dataDi").html('');
				$(".dataDen").html('');
				$("#tiso").html('');
				alert('Lưu thành công');
			}
		});
		return false;
	}

	function Check(){
		if ($('#lopchuyendi').val()==0) {
			alert('Mời chọn lớp');
			return false;
		}
		var checkbox=$("input[name='checkboxDen']:not(:checked)");
		namhoc=$('#namhocChuyenLop').val();
		lopchuyendi=$('#lopchuyendi').val();
		if(checkbox.length>0){
			if(!confirm('Mời lưu')){
				$.ajax({
					url: "hocsinh/ajaxOpen",
					method: "GET",
					data: {
						'namhoc': namhoc,
						'lopchuyendi': lopchuyendi,
					},
					dataType : 'json',
					success : function(result){
						html='';
						$.each (result, function (key, item){
							html+='<tr class="odd gradeX">'+
							'<td class="center">'+item.hocsinh_id+'</td>'+
							'<td class="center">'+item.hoten+'</td>'+
							'<td class="center"><input type="checkbox" name="checkboxDi" value="'+item.hocsinh_id+'"></td> </tr>';
						});
						$(".dataDi").html(html);
						$(".dataDen").html('');
					}
				});
				// return true;
			}
		} else {
			$.ajax({
				url: "hocsinh/ajaxOpen",
				method: "GET",
				data: {
					'namhoc': namhoc,
					'lopchuyendi': lopchuyendi,
				},
				dataType : 'json',
				success : function(result){
					html='';
					$.each (result, function (key, item){
						html+='<tr class="odd gradeX">'+
						'<td class="center">'+item.hocsinh_id+'</td>'+
						'<td class="center">'+item.hoten+'</td>'+
						'<td class="center"><input type="checkbox" name="checkboxDi" value="'+item.hocsinh_id+'"></td> </tr>';
					});
					$(".dataDi").html(html);
					$(".dataDen").html('');
				}
			});
		}

		return false;
	}

	function TiSo() {
		$('.dataDen').html('');
		namhoc=$('#namhocChuyenLop').val();
		var lopchuyenden=$('#lopchuyenden').val();
		$.ajax({
			url: "hocsinh/ajaxTiSo",
			method: "GET",
			data: {
				'namhocDen': namhoc,
				'lopchuyenden': lopchuyenden,
			},
			dataType : 'json',
			success : function(result){
				$("#tiso").html(result);
			}
		});

		// $('#open_phanlop').click();
	}

	$('.khoilop').click(function(event) {
		id=$(this).attr('id');
		$.ajax({
			url: "hocsinh/ajaxKhoiLop",
			method: "GET",
			data: {
				'id': id,
			},
			dataType : 'json',
			success : function(result){
				khoilopdi='';
				khoilopden='';
				$.each (result, function (key, item){
					if (item.khoilop_id==id) {
						khoilopden+='<option value="'+ item.id +'"> Lớp '+ item.ten +'</option>';
					} else {
						khoilopdi+='<option value="'+ item.id +'"> Lớp '+ item.ten +'</option>';
					}

				});
				$("#lopchuyendi").html(khoilopden);
				$("#lopchuyenden").html(khoilopden);
				var isChecked = $('#flip').is(':checked');
				if (isChecked==true) {
					$("#fromlop").html(khoilopdi);
					$("#tolop").html(khoilopden);
				} else {
					$("#fromlop").html(khoilopden);
					$("#tolop").html(khoilopden);
				}

				$('#flip').click(function(event) {
					var isChecked = $(this).is(':checked');
					if (isChecked==true) {
						$("#fromlop").html(khoilopdi);
						$("#tolop").html(khoilopden);
					} else {
						$("#fromlop").html(khoilopden);
						$("#tolop").html(khoilopden);
					}
				});

				$('#chuyenAll').click(function(event) {
					idLopDi=$('#fromlop').val();
					idLopDen=$('#tolop').val();
					namhocPhanLop=$('#namhocPhanLop').val();
					$.ajax({
						url: "hocsinh/savePhanLop",
						method: "GET",
						data: {
							'idLopDi': idLopDi,
							'idLopDen': idLopDen,
							'namhocPhanLop':namhocPhanLop
						},
						dataType : 'text',
						success : function(result){
							alert('Phân lớp thành công');
						}
					});
				});
			}
		});
		return false;
	});


</script>
@endsection