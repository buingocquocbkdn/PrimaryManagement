@extends('templates.school.master')
@section('content')		

<div class="banner">
	
	<script src="/resources/assets/templates/school/js/custom.js"></script>
</div>
<div class="banner-w3agile">
	<div class="container">
		
	</div>
</div>
<!--banner-->
<!--content-->
	<div class="container">
        <div class="col-sm-12 blog-main">
			<div class="col-sm-10">
				<br>
				<h2 class=" welcome">Tin tức/Thông báo</h2>
				<hr>
			</div>
			<hr>
        	@foreach($arHoatDong as $ar)
        	<?php 
        		 $name= $ar->ten;
                  $id= $ar->id;
                  $name_slug = str_slug($name);
                  $url = route('school.chitiettin', ['name' =>$name_slug , 'id' => $id]);
        	 ?>
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-sm-4">
							<a href="{{ $url }}" >
			            		<img src="{{ $ar->hinh }}" alt="..."  class="img-responsive img-rounded" />
			            	</a>
						</div>
			          	<div class="col-sm-8">
			            	<h2 ><a href="{{ $url }}" >{{ $ar->ten }}</a></h2>
							 <p class="blog-post-meta">
								<span class="glyphicon glyphicon-time"></span>{{ $ar->ngay }}
								&nbsp;&nbsp;
							 </p>
			            	<p>{!! str_limit($ar->mota,150) !!}</p>
			            	<a href="{{ $url }}" class="btn btn-primary  active pull-right" role="button">Đọc tiếp...</a>
			            	<div class="clearfix"></div>
				        </div>
				     </div>
				</div>
		    </div><!-- /.blog-post -->
			@endforeach

          {{ $arHoatDong->links()}}
        </div><!-- /.blog-main -->
          
    </div>

@stop