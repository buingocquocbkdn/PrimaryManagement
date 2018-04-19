@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" style="padding: 30px">
          Danh sách giáo viên
          <button type="button" style="float:right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm</button>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>Mã số giáo viên</th>
                <th>Tên giáo viên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Dạy môn học</th>
                <th>Sửa</th>
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
  @include('admin.giaovien.modalThem')
  @include('admin.giaovien.modalSua')
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function() {

   function show() {
    $.ajax({
      url: "giaovien/searchGiaoVien",
      method: "GET",
      data: {},
      dataType : 'json',
      success : function(result){
        html='';

        $.each (result, function (key, item){
          html+='<tr class="odd gradeX" id="giaovien-'+ item.id_giaovien +'">'+
          '<td class="center">'+ item.id_giaovien +'</td>'+
          '<td class="center">'+ item.hoten +'</td>'+
          '<td class="center">'+ item.huyen+"-"+item.tinh +'</td>'+
          '<td class="center">'+ item.sodienthoai +'</td>'+
          '<td class="center">';
          if(item.gioitinh==0) {
           html+='Nam';
         }
         else {
          html+='Nữ';
        }
        html+='</td>'+
        '<td class="center">'+ item.ngaysinh +'</td>'+
        '<td class="center">'+ item.loaimonhoc +'</td>'+
        '<td class="center">'+
        '<div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><a href="javascript:void(0)" id="edit-'+item.id_giaovien +'" class="edit" >Sửa</a></i></div></td>'+
        '<td class="center"><div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><a href="javascript:void(0)" id="del-'+item.id_giaovien +'" class="del">Xóa</a></i></div>'+
        '</td>'+
        ' </tr>';
      });
        $('#content').html(html);
        // $('#dataTables-example').DataTable({
        //   responsive: true
        // });
        //del
        $('.del').click(function(event) {
          if(confirm('Bạn muốn xóa không?')) {
            attr=$(this).attr('id');
            id=attr.replace('del-','');
            $.ajax({
              url: "giaovien/delGiaoVien",
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
          url: "api/giaovien/"+id+"/edit",
          method: "GET",
          data: {},
          dataType : 'json',
          success : function(result){
           tinh=<?php echo $tinh;?>;
           huyen=<?php echo $huyen;?>;
           htmltinh='';
           htmlhuyen='';
           $('#id').val(result.id_giaovien);
           $('#hotenedit').val(result.hoten);
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
           $('#sodienthoaiedit').val(result.sodienthoai);
           $('#loaimonhoc').val(result.loaimonhoc_id);
           $('#ngaysinhedit').val(result.ngaysinh);
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
  }
  show();

  $('#add_giaovien').click(function(event) {
    $.ajax({
      url: "giaovien",
      method: "POST",
      data: $("#form-add").serialize(),
      dataType : 'text',
      success : function(result){
        show();
        alert('Thêm thành công');
      }
    });
    $('#reset').click();
    $('#myModal').modal('hide');
    return false;
  });

  $('#edit_giaovien').click(function(event) {
    id=$('#id').val();
    $.ajax({
      url: "giaovien/"+id,
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
