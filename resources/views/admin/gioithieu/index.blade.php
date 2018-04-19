@extends('admin.inc.index')
@section('content')

      <div class="content-wrapper">
	  <div class="row user">
			<div class="col-md-12">
				<div class="profile">
				  <div class="info"><img class="user-img" src="/templates/admin/images/admin.jpg">
					<h4>Admin</h4>
					<p></p>
				  </div>
				  <div class="cover-image"></div>
				</div>
			</div> 
        <div class="page-title">
			<h3 class="add">
				<a href="{{route('admin.gioithieu.getadd')}}">
					Thêm 
				</a>
			</h3>
			
				<h3 style="margin-left: 37%; color:red">
					 @if(Session::has("msg"))
                        {{Session::get("msg")}}
                       @endif
				</h3>
			
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body  ">
				<form action="{{route('admin.gioithieu.del')}}" method="post" id="xoa" >
				{{csrf_field()}}
					<table class="table table-hover table-bordered" id="sampleTable">
					  <thead>
						<tr>
						  <th style="text-align: center;">ID</th>
						  <th style="text-align: center;" >Tiêu đề</th> 					  
						 <th style="text-align: center;" >Trạng thái</th>
						  <th style="text-align: center;" >
							<input type="submit" value="Delete" name="smXoa" class="xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?') " 
							style="border: 3px; border-radius: 3px; background-color: dodgerblue;">
						  </th>
						 
						</tr>
					  </thead>
					  <tbody class= "hienthitintuc" >

						@foreach($gioiThieu as $val)
						@php 
	                        $id = $val ->id;
	                        $name = $val->ten;
	                        $urlEdit = route('admin.gioithieu.getedit',$id);
	                        $urlDel = route("admin.gioithieu.del",$id);
                        @endphp 
						<tr>
						    <td style="text-align: center;" >{{$id}}</td>
						    <td style="text-align: center;" >{{$name}}</td>						 
							 <td  style="text-align: center;">
                                <span id="actice-{{$id}}">
                                    <a href="javascript:void(0)" onclick="getTrangThai({{$id}});">
                                         @if($val->active == '1')
                                    <img src="{{ $imgUrl }}/active.gif" alt="" />
                                        @else
                                    <img src="{{ $imgUrl }}/deactive.gif" alt="" />
                                        @endif
                                    </a>
                                </span> 
                            </td>				    
						  <td style="text-align: center;" >
								
							  <a href="{{$urlEdit}}">Sửa </a>
							 	<img src= "/templates/admin/images/bin.gif" />
							  <input   type="checkbox" value="{{$val->id}}" name="xoa[]"/>

						  </td>
						 
						</tr>

						@endforeach
					  </tbody>
					</table>
				</form>
            </div>
            </div>
          </div>
		  </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
   
 
<script type="text/javascript">
    function getTrangThai(id)
        {
            var url='/gioithieu/active/'+id;
            var tmp="#actice-"+id;
          
            $.ajax({
                url:url,
                dataType: "html",
                success: function(result) {                
                    $(tmp).html(result);
                },
            });
        }
</script>
  </body>
</html>
@stop