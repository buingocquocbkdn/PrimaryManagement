@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content') 
<div class="content-wrapper"> 
	<div class="card">
		<div class="card-body">
			<h2>Phân công</h2>
			<div class="row">
				<form action="" method="" id="form">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<input type="hidden" name="lop" value="" />
					<input type="hidden" name="giaovien_id" value="" />
					<div class="col-md-4">
						<select name ="namhoc" class="form-control" id="namhoc">
							<option value="0">--Chọn năm học--</option>
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
				</form>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Danh sách phân công giáo viên
					<button type="button" style="float:right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="add">Thêm</button>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Mã số giáo viên</th>
								<th>Tên giáo viên</th>
								<th>Môn học</th>
								<th>Lớp</th>
								<th>Năm học</th>
								<th>Học kỳ</th>
								<th>Thời khóa biểu</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody id="content">
							
						</tbody>
					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	@include('admin.giaovien.modalThemPhanCong')
	@include('admin.giaovien.modalThoiKhoaBieu')
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		function show() {
			lop=$('input[name="lop"]').val();
			yearSelected=$('#namhoc :selected').text();
			yearCurrent=new Date().getFullYear();
			monthCurrent=new Date().getMonth();
			check=false;
			if (monthCurrent<5) {
				yearCurrent='Học Kì 2 Năm Học '+(yearCurrent-1)+'-'+yearCurrent;
			} else {
				yearCurrent='Năm Học '+yearCurrent +'-'+(yearCurrent+1);
			}
			
			if(yearSelected.indexOf(yearCurrent) !== -1){
				check=true;
			}else{
				check=false;
			}
			$.ajax({
				url: "giaovien/searchPhanCong",
				method: "GET",
				data: $('#form').serialize(),
				dataType : 'json',
				success : function(result){
					html='';
					dis='';
					$.each (result, function (key, item){
						$('input[name="thoikhoabieu"]').val(item.thoikhoabieu_id);
						html+='<tr class="odd gradeX" id="'+ item.thoikhoabieu_id +'">'+
						'<td class="center">'+ item.id_giaovien +'</td>'+
						'<td class="center">'+ item.hoten +'</td>'+
						'<td class="center">'+ item.ten_monhoc +'</td>'+
						'<td class="center">'+ item.ten_lop +'</td>'+
						'<td class="center">'+ item.ten_namhoc +'</td>'+
						'<td class="center">'+ item.ten_hocky +'</td>'+
						'<td class="center"><a href="javascript:void(0)" id="'+ item.loaimonhoc_id+'-'+ item.giaovien_id +'-'+ item.namhoc_id+'-'+ item.hocky_id +'-'+ item.hocky_id +'" class="thoikhoabieu">Chi tiết</a></td>';
						if (check) {
							dis='';
						} else {
							dis='disabled';
						}
						html+='<td class="center"><div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><a href="javascript:void(0)" id="del-'+item.id_phancong +'" class="del" '+dis+' >Xóa</a></i></div>'+
						'</td>'+
						' </tr>';
					});
					if (check&&result.length<3&&lop!='') {
						$.ajax({
							url: "giaovien/checkExistThoiKhoaBieu",
							method: "get",
							data: $('#form').serialize(),
							dataType : 'json',
							success : function(result){
								if (result.length>0) {
									namhochocky=$('#namhoc').val();
									namhoc=namhochocky.split('-')[1];
									hocky=namhochocky.split('-')[0];
									$('input[name="namhoc"]').val(namhoc);
									$('input[name="hocky"]').val(hocky);
									$('#namhochocky').html(yearSelected);
									$('input[name="lopadd"]').val($('input[name="lop"]').val());
									$('#add').show();
								} else {
									$('#add').hide();
								}
							}
						});
						
					} else {
						$('#add').hide();
					}
					$('#content').html(html);
        //del
        $('.del').click(function(event) {
        	if(confirm('Bạn muốn xóa không?')) {
        		attr=$(this).attr('id');
        		id=attr.replace('del-','');
        		$.ajax({
        			url: "giaovien/delPhanCong",
        			method: "delete",
        			data: {
        				"_token": "{{ csrf_token() }}",
        				'id': id
        			},
        			dataType : 'text',
        			success : function(result){
        				show();
        				alert('Xóa thành công');
        			}
        		});
        	}
        });

        //thời khóa biểu
        $('.thoikhoabieu').click(function(event) {
        	id=$(this).attr('id');
        	loaimonhoc_id=id.split('-')[0];
        	giaovien_id=id.split('-')[1];     	
        	namhoc_id=id.split('-')[2];
        	hocky_id=id.split('-')[3];
        	$('#namhoc').val(hocky_id+'-'+namhoc_id);
        	lop_id=$('input[name="lop"]').val();
        	$('input[name="giaovien_id"').val(giaovien_id);
        	$.ajax({
        		url: "giaovien/thoikhoabieu",
        		method: "get",
        		data: $('#form').serialize(),
        		dataType : 'json',
        		success : function(result){
        			if (result!=0) {
        				$.each (result, function (key, item){
        					data=$('.'+key);
        					$.each (item, function (key, obj){
        						if (loaimonhoc_id==1) {
        							if (obj.monhoc_id==6||obj.monhoc_id==9) {
        								$(data[key]).html('');
        							} else {
        								$(data[key]).html(obj.ten);
        							}
        						} else {
        							if (obj!='') {
        								if (obj.lop_id==lop_id) {
        								$(data[key]).html('<span style="color:red">'+ obj.ten +'</span>');
        								// $(data[key]).html(obj.ten);
        							} else {
        								$(data[key]).html(obj.ten);
        							}
        						} else {
        							$(data[key]).html('');
        						}

        					}
        				});
        				});
        			}
        			$('#myModalThoiKhoaBieu').modal('show');
        		}
        	});
        });

    }
});
$("#namhoc").change(function(){
	show();
});
}
show();
$('#add_phancong').click(function(event) {
      $.ajax({
        url: "giaovien/add_PhanCong",
        method: "get",
        data: $('#form-add').serialize(),
        dataType : 'text',
        success : function(result){
         if (result=='ok') {
          show();
          alert('Thêm thành công');
        } else {
          alert(result);
        }
      }
    });
      $('#reset').click();
      $('#myModal').modal('hide');
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
});
</script>
@endsection