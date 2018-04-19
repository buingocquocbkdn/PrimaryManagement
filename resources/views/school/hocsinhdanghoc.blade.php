@extends('templates.school.master')
@section('content')		

	<div class="banner-w3agile">
		<div class="container">
			
		</div>
	</div>
	<div class="">
		<div class="container">
			<br>
			<div class="col-md-8">
				<center><h2 class="text-success">Tìm kiếm</h2></center>
			</div>
    		<div class="col-md-4">
				<!-- <form action="" method="get">
					{{ csrf_field() }} -->
			
	                <div class="form-group">
	            		<input type="text" class="form-control" name="name" id="name" placeholder="Tên học sinh" onkeyup="onChangeName()" />
	            	</div>
				<!-- </form> -->
			</div>
			@if(Session::get('msg') != null)
    		<p style="font-size: 15px" class="alert alert-success">{{ Session::get('msg') }}</p>
    		@endif
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<select class="form-control" name="khoi" id="khoi" onclick="onChangeKhoi()">
					<option value="0">Khối lớp</option>
					@foreach($khoilops as $khoilop)
						<option value="{{ $khoilop->id }}" >{{ $khoilop->ten }}</option>	
					@endforeach
				</select>
			</div>
			<div id="x">
				<div class="col-md-4" >
					<select class="form-control" name="lop" id="lop" onclick="onChangeLop()">
						<option value="0">Lớp</option>
						@foreach($lops as $lop)
						<option value="{{ $lop->id }}">Lớp {{ $lop->ten }}</option>	
						@endforeach
					</select>
				</div>
				<div class="col-md-12">
					<br>
				</div>
				<div class="col-md-12" id="xkq">
					
				</div>
			</div>
			
		</div>
		<div style="height: 100px">
			
		</div>
	</div>

<script type="text/javascript">
	function onChangeKhoi(){
		var id = $("#khoi").val();
  	//alert(id)
    $.ajax({
       url: "{{ route('school.khoilop') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}', 
            aid:id,
        },
        success: function(data){
            var a ='#x';
            $(a).html(data);
            
        },
        error: function(){
          alert('Sai');
        }
      });	
	}

</script>

<script type="text/javascript">
	function onChangeLop(){	
		var id = $("#lop").val();
    //alert(id)
    $.ajax({
       url: "{{ route('school.lop') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}', 
            aid:id,

        },
        success: function(data){
            var a ='#xkq';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
	}
</script>

 <script type="text/javascript">
	function onChangeName(){	
	var id1 = $("#lop").val();
	var id2 = $("#khoi").val();
	var name = $("#name").val();
//alert(name)
    $.ajax({
       url: "{{ route('school.searchhocsinh') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}', 
           lid:id1,
           kid:id2,
           tname:name,

        },
        success: function(data){
            var a ='#xkq';
            $(a).html(data);
        },
        error: function(){
         // alert('Sai');
        }
      });
	}
</script> 
@stop