@extends('templates.school.master')
@section('content')		
	
<div class="banner-w3agile">
	<div class="container">
		
	</div>
</div>
	<!--content-->
<div class="content">
	<!--about-->
	<div class="about-w3">
		<div class="container">
			<h2 class="tittle">{{ $hoatDong->ten }}</h2>
			<div class="about-grids">
				
				<div class="col-sm-6">
					<img src="{{ $hoatDong->hinh }}" alt="..."  class="img-responsive img-rounded" />
				</div>
				{!! $hoatDong->mota !!}

			</div>
			<div>
				<div class="col-md-12">
                <hr>
                <h3 class="text-success">Bài viết gần đây</h3>
                <hr>
            </div>
            @foreach($arItemLQs as $ar)
            <?php 
              $name= $ar->ten;
              $id= $ar->id;
              $name_slug = str_slug($name);
              $url = route('school.chitiettin', ['name' =>$name_slug , 'id' => $id]);
             ?>
            <div class="col-md-3">
              <div class="thumbnail">
                <a href="{{ $url }}" target="_blank">
                  <img src="{{ $ar->hinh }}" alt="Nature" style="width:100%">
                  <div class="caption">
                    <p>{{ $ar->ten }}</p>
                  </div>
                </a>
              </div>
            </div>
            @endforeach
			</div>
		</div>

	</div>
	<!--about-->
	
</div>	
<!--content-->
@stop