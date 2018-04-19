@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
<div class="content-wrapper">
 <div class="card">
  <div class="card-body">
   <div class="row">
     <form action="" method="">
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
      <div class="panel-heading" style="padding: 30px">
        Danh sách học sinh
        <span id="add"></span>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Mã số học sinh</th>
              <th>Họ tên</th>
              <th>Giới tính</th>
              <th>Ngày sinh</th>
              <th>Nơi sinh</th>
              <th>Dân tộc</th>
              <th>Tôn giáo</th>
              <th>Họ tên cha</th>
              <th>Nghề nghiệp cha</th>
              <th>Họ tên mẹ</th>
              <th>Nghề nghiệp mẹ</th>
              <th>Số điện thoại</th>
              <th>Chức năng</th>
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
@include('admin.hocsinh.modalThem')
@include('admin.hocsinh.modalSua')
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    // $('#example').DataTable();
    $('#data').hide();

    function show() {
      $('#data').show();
      yearSelected=$('#namhoc :selected').text();
      yearCurrent=new Date().getFullYear();
      if(yearSelected.indexOf(yearCurrent) !== -1){
        html='<button type="button" style="float:right;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Thêm</button>';
        $('#add').html(html);
      }else{
        $('#add').html('');
      }
      $.ajax({
        url: "hocsinh/searchHocSinh",
        method: "GET",
        data: $("form").serialize(),
        dataType : 'json',
        success : function(result){
          html='';

          $.each (result, function (key, item){
            html+='<tr class="odd gradeX" id="hocsinh-'+ item.idHS +'">'+
            '<td class="center">'+ item.idHS +'</td>'+
            '<td class="center">'+ item.hoten +'</td>'+
            '<td class="center">';
            if(item.gioitinh==0) {
             html+='Nam';
           }
           else {
            html+='Nữ';
          }
          html+='</td>'+
          '<td class="center">'+ item.ngaysinh +'</td>'+
          '<td class="center">'+ item.huyen+"-"+item.tinh +'</td>'+
          '<td class="center">'+ item.dantoc +'</td>'+
          '<td class="center">'+ item.tongiao +'</td>'+
          '<td class="center">'+ item.hotencha +'</td>'+
          '<td class="center">'+ item.nghenghiepcha +'</td>'+
          '<td class="center">'+ item.hotenme +'</td>'+
          '<td class="center">'+ item.nghenghiepme +'</td>'+
          '<td class="center">'+ item.sodienthoai +'</td>'+
          '<td class="center">'+
          '<div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><a href="javascript:void(0)" id="edit-'+item.idHS +'" class="edit" >Sửa</a></i></div></br>'+
          '<div class="icon-block col-md-3 col-sm-4"><i class="fa fa-trash"><a href="javascript:void(0)" id="del-'+item.idHS +'" class="del">Xóa</a></i></div>'+
          '</td>'+
          ' </tr>';
        });
          $('#content').html(html);
          // $('#example').DataTable();
        //del
        $('.del').click(function(event) {
          if(confirm('Bạn muốn xóa không?')) {
            attr=$(this).attr('id');
            id=attr.replace('del-','');
            $.ajax({
              url: "hocsinh/delHocSinh",
              method: "delete",
              data: {
               "_token": "{{ csrf_token() }}",
               'id': id
             },
             dataType : 'text',
             success : function(result){
               // $("#search_hocsinh").click();
               show();
               alert('Xóa thành công');
             }
           });
          }
        });
        //edit
        $('.edit').click(function(event) {
         attr=$(this).attr('id');
         id=attr.replace('edit-','');
         $.ajax({
          url: "hocsinh/"+id+"/edit",
          method: "GET",
          data: {},
          dataType : 'json',
          success : function(result){
            tinh=<?php echo $tinh;?>;
            huyen=<?php echo $huyen;?>;
            htmltinh='';
            htmlhuyen='';
            $('#id').val(result.idHS);
            $('#hotenedit').val(result.hoten);
            $('#ngaysinhedit').val(result.ngaysinh);
            $.each (tinh, function (k, value){
              if (value.id==result.tinh_id) {
                choose='selected="selected"';
              } else {
                choose='';
              }
              htmltinh+='<option '+ choose +' value="'+ value.id +'">'+ value.ten +'</option>';
            });
            $('#tinhEdit').html(htmltinh);
             $.each (huyen, function (k, value){
            if (value.tinh_id==result.tinh_id) {
              if (value.id==result.huyen_id) {
                choose='selected="selected"';
              } else {
                choose='';
              }
              htmlhuyen+='<option '+ choose +' value="'+ value.id +'">'+ value.ten +'</option>';
            }
            
          });

           $('#huyenEdit').html(htmlhuyen);
            $('#dantocedit').val(result.dantoc_id);
            $('#tongiaoedit').val(result.tongiao_id);
            $('#hotenchaedit').val(result.hotencha);
            $('#nghenghiepchaedit').val(result.nghenghiepcha_id);
            $('#hotenmeedit').val(result.hotenme);
            $('#nghenghiepmeedit').val(result.nghenghiepme_id);
            $('#sodienthoaiedit').val(result.sodienthoai);
            if(result.gioitinh==0) {
              $('#nam').attr('checked','checked');
            } else {
              $('#nu').attr('checked','checked');
            }
            $('#myModalEdit').modal('show');
          }
        });
       });
      }
    });
      $("#namhoc").change(function(){
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

    $('#add_hocsinh').click(function(event) {
      $('input[name="namhocadd"]').val($('#namhoc').val());
      $('input[name="lopadd"]').val($('input[name="lop"]').val());
  // var i = $('#content tr').size() + 1;
  $.ajax({
    url: "hocsinh",
    method: "POST",
    data: $("#form-add").serialize(),
    dataType : 'json',
    success : function(result){
      show();
      alert('Thêm thành công');
    }
  });
  $('#reset').click();
  $('#myModal').modal('hide');
  return false;
});

    $('#edit_hocsinh').click(function(event) {
      id=$('#id').val();
      $.ajax({
        url: "hocsinh/"+id,
        method: "PUT",
        data: $("#form-edit").serialize(),
        dataType : 'text',
        success : function(item){
          show();
          alert('Sửa thành công');
        }
      });
      $('#reset').click();
      $('#myModalEdit').modal('hide');
      return false;
    });
  });
</script>
@endsection
