@extends('templates.school.master')
@section('content')		

@if(isset($time))

<div class="row" id="data">
	<div class="col-lg-2">
		<div class="panel">
			<div class="btn-group-vertical btn-block">
				<button type="button" class="btn btn-default panel-default">Danh sách lớp</button>
				@foreach($arKhoiLop as $khoilop)
				  <div class="btn-group btn-block">
				    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				      {{ $khoilop->ten }}
				    </button>
				    <ul class="dropdown-menu btn-block">

				      @foreach($arLop as $ar)
						@if($ar->khoilop_id == $khoilop->id)
						<li><a href="javascript:void(0)" onclick="chitietTKB('{{$ar->ten}}', {{$ar->id}})"> Thời khoa biểu lớp {!! $ar->ten !!}</a></li>
						@endif
					   @endforeach
						
				    </ul>
				  </div>
				  @endforeach
			</div>	
		</div>
		</div>
		<div id="thoikhoabieuchitiet">
		<div class="col-lg-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					Thời khóa biểu lớp 1A
				</div>
				
				<!-- /.panel-heading -->
				<div class="panel-body">
					
					<table width="100%" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									@if($time<=5)
									Sáng
									@php ($time= 1)
									@else
									Chiều
									@php($time=6)
									@endif
								</th>
								<th>Thứ hai</th>
								<th>Thứ ba</th>
								<th>Thứ tư</th>
								<th>Thứ năm</th>
								<th>Thứ sáu</th>
							</tr>
						</thead>
						<tbody>
							@for($i=1;$i<=5;$i++)
							<tr class="odd gradeX">
								<td>Tiết {{$time++}}</td>
								<td>
									
									@foreach($monhoc as $mh)
									 @if($thu['monday'][$i-1]->monhoc_id==$mh->id) 
									 {{$mh->ten}}
									 @endif 
									@endforeach
									
								</td>
								<td>
									
									@foreach($monhoc as $mh)
									@if($thu['tuesday'][$i-1]->monhoc_id==$mh->id)
										{{$mh->ten}}
									@endif 
									@endforeach
								</td>
								<td>
									@foreach($monhoc as $mh)
									@if($thu['wednesday'][$i-1]->monhoc_id==$mh->id)
										{{$mh->ten}}
									@endif
									@endforeach
									</select>
								</td>
								<td>
									
									@foreach($monhoc as $mh)
									 @if($thu['thursday'][$i-1]->monhoc_id==$mh->id) 
										{{$mh->ten}}
									 @endif 
									@endforeach
									
								</td>
								<td>
									
								@foreach($monhoc as $mh)
								 @if($thu['friday'][$i-1]->monhoc_id==$mh->id)
									{{$mh->ten}}
								  @endif 
								@endforeach
									
								</td>
							</tr>
							@endfor

						</tbody>
					</table>
						
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel-default-->
		</div><!-- /.panel-col-->
	</div>

	</div> 
	@endif

<script type="text/javascript">
  function chitietTKB(name, id){
  	//alert('ss');
    //var tt='#item-'+id;
    $.ajax({
       url: "{{ route('school.thoikhoabieuchitiet') }}", 
       
        type: 'POST',
       // type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}', 
            aid:id,
            aname:name
        },
        success: function(data){
            var a ='#thoikhoabieuchitiet';
            $(a).html(data);
			//window.history.go(-2);
			   //return false;
			  // var url = "{{ route('school.thoikhoabieu') }}"+id;
			 // window.history.pushState("Details", "Title", url);

        },

        error: function(){
          alert('Sai');
        },

      });
    }
</script>
@stop