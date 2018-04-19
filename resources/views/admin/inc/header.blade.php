<!DOCTYPE html>
<html>
<head>
 <title>Vali Admin</title>
 <base href="{{asset('')}}">
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <link href="/public/admin_asset/css/bootstrap.min.css" rel="stylesheet">
 <link href="/public/admin_asset/css/dataTables.bootstrap.min.css" rel="stylesheet">
 <link href="/public/admin_asset/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- CSS-->
 <link rel="stylesheet" type="text/css" href="/public/admin_asset/css/main.css">

 <!-- DataTables CSS -->
 
 <!-- DataTables Responsive CSS -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="/public/admin_asset/js/jquery-2.1.4.min.js"></script>
 <script src="/public/admin_asset/js/bootstrap.min.js"></script>
 <script src="/public/admin_asset/js/plugins/pace.min.js"></script>
 <script src="/public/admin_asset/js/jquery.dataTables.min.js"></script>
 <script src="/public/admin_asset/js/dataTables.bootstrap.min.js"></script>
 <script src="/public/admin_asset/datatables-responsive/dataTables.responsive.js"></script>
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
  -->
  <style type="text/css">
   .form-control {
    padding: 0px;
  }
</style>
</head>
<body class="sidebar-mini fixed">
  <div class="wrapper">
    <!-- Navbar-->
    <header class="main-header hidden-print"><a class="logo" href="index.html">Vali</a>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid"  style="padding-left: 0px">
          <ul class="nav navbar-nav">
            <li class="dropdown {{Request::Segment(1)==='hocsinh' ?'active' : ''}}"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Học sinh<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class=""><a href="hocsinh">Danh sách lớp</a></li>
                <li><a href="hocsinh/phanlop">Phân lớp</a></li>
                <li><a href="hocsinh/xemdiemdanh">Điểm danh</a></li>
                <li><a href="hocsinh/xemdiem">Điểm</a></li>
                <li><a href="hocsinh/xemthoikhoabieu">Thời khóa biểu</a></li>
                <li><a href="hocsinh/tongket">Tổng kết</a></li>
              </ul>
            </li>
            <li class="{{Request::Segment(1)==='giaovien' ?'active' : ''}}"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Giáo viên<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="giaovien">Danh sách</a></li>
                <li><a href="giaovien/phancong">Phân công</a></li>
              </ul>
            </li>
            <li class="{{Request::Segment(1)==='hoatdong' ?'active' : ''}}"><a href="{{route('admin.hoatdong.index')}}">Hoạt động</a></li>
            <li class="{{Request::Segment(1)==='gioithieu' ?'active' : ''}}"><a href="{{route('admin.gioithieu.index')}}">Giới Thiệu</a></li>
            
             <li class="{{Request::Segment(1)==='nguoidung' ?'active' : ''}}"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Người Dùng<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{route('admin.giaovien.getGiaovien')}}">Giáo viên</a></li>
                <li><a href="{{route('admin.hocsinh.getHocSinh')}}">Học sinh</a></li>
              </ul>
            </li>

          </ul> 
          <ul class="nav navbar-nav navbar-right">

            @if(Session::has("id"))
              @php      
              $id = Session::get("id");
              @endphp
            <li><a href="javascript:void(0)" class="editAdmin" id="{{$id}}">Profile</a></li>
            <li><a href="{{route('admin.user.logout')}}">Log out</a></li>
            @endif
          </ul>
        </div>
      </nav>
    </header>
@include('admin.auth.modalPassword')
