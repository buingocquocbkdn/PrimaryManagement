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
			<h2 class="tittle">Về chúng tôi</h2>
			<div class="about-grids">
				@foreach($arGioiThieu as $gt)

				<div class="col-md-12 about-grid">
				 <h4>{{ $gt->ten }}</h4>
					 <p>{!! $gt->mota !!}</p>
				 </div>

				 @endforeach
			</div>
		</div>
	</div>
	<!--about-->
</div>	
<!--content-->
@stop