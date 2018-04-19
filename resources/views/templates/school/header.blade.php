
<!DOCTYPE html>
<html>
<head>
<title>{{ $title or 'Web tiểu học'}}</title>
<base href="{{asset('')}}">
<!--css-->
<link href="/resources/assets/templates/school/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/resources/assets/templates/school/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/resources/assets/templates/school/css/ken-burns.css" type="text/css" media="all" />
<link rel="stylesheet" href="/resources/assets/templates/school/css/animate.min.css" type="text/css" media="all" />
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Studies Plus Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js-->
<script src="/resources/assets/templates/school/js/jquery.min.js"></script>
<script src="/resources/assets/templates/school/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/resources/assets/templates/school/js/numscroller-1.0.js"></script>
<script type="text/javascript" src="/resources/assets/templates/school/js/change.js"></script>
<!--js-->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--webfonts-->

<style>
  *{
    font-size: 15px;
  }
	nav.danhmuc{
		background: #49872e !important;
	}
	.navbar-inverse .navbar-nav > li > a {
	    color: #fdfdfd;
	    font-size: 18px;
	}
  #footer {
    width:100%;
    bottom: 0;
    }
</style>
</head>
<body>
<div class="header">
<nav class="navbar navbar-inverse danhmuc" >
  <div class="container">
    <div class="navbar-header">
    	<br>
      <h2 class="navbar-brand" href="#" style="font-size: 28px;color: #fff">Trường Tiểu Học Ngôi Sao </h2>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{route('school.index')}}">Tin tức</a></li>
      <li><a href="{{route('school.tongquan')}}">Giới thiệu</a></li>
      <li><a href="{{route('school.giaovien')}}">Giáo viên</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Học sinh
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('school.hocsinhdanghoc')}}">Học sinh đang học</a></li>
          <li><a href="{{route('school.hocsinhthoihoc')}}">Học sinh thôi học</a></li>
        </ul>
      </li>
      <li><a href="{{route('school.thoikhoabieu')}}">Thời Khóa biểu</a></li>
    </ul>
  </div>
</nav>
</div>
<!--header-->