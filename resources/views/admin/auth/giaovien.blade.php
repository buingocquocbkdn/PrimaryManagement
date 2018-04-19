@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" style="padding: 30px">
          Danh sách giáo viên
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th style="text-align: center;" >Mã số giáo viên</th>
                <th style="text-align: center;" >Tên giáo viên</th>
                <th style="text-align: center;">Trạng thái</th>
                <th style="text-align: center;">Sửa</th>
              </tr>
            </thead>
            <tbody id= "content" >

              @foreach($giaoVien as $val)
              @php 
              $id = $val ->maso;
              $name = $val->tengiaovien;
              $active = $val->active;
              @endphp 
              <tr>
                <td style="text-align: center;" >{{$id}}</td>
                <td style="text-align: center;" >{{$name}}</td>                                          
                <td  style="text-align: center;">
                  <span id="actice-{{$id}}">
                    <a href="javascript:void(0)" onclick="getTrangThaiGV({{$id}});">
                     @if($val->active == '1')
                     <img src="{{ $imgUrl }}/active.gif" alt="" />
                     @else
                     <img src="{{ $imgUrl }}/deactive.gif" alt="" />
                     @endif
                   </a>
                 </span> 
               </td>                
               <td style="text-align: center;"><a href="javascript:void(0)" id="{{$id}}" class="editGV" >Sửa</a>
               </td>

             </tr>

             @endforeach
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

</div>
@include('admin.auth.modalSuaGV')
<!-- /#page-wrapper -->
@endsection
@section('script')
<script>
 $(document).ready(function() {
   $('#dataTables-example').DataTable({
    responsive: true
  });
 });

</script>
@endsection
