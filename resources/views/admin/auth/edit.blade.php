@extends('admin.inc.index')
@include('admin.inc.side-bar')
@section('content')
      <div class="content-wrapper">
		
        <div class="row user">
			<div class="page-title">
			
				<h4 style="margin-left: 37%; color: red;">
				
					@if(Session::has("msg"))
                        {{Session::get("msg")}}
                       @endif
					
				</h4>
			
			</div>         
		   <div class="col-md-6" style="width: 100%;">
            <div class="card">
              <h3 class="card-title">Sửa thông tin</h3>
				<div class="card-body">
					<form action="{{route('admin.auth.postedit',$objUser->id)}}" method="post" enctype="multipart/form-data"  >
					{{csrf_field()}}
					  <div class="form-group">
						<label class="control-label">UserName *</label>
                            <input type="text" disabled  class="form-control border-input" placeholder="Tên user" value="{{$objUser->username}}">
					  </div>
				
					  @if ($errors->has('username'))
                            <span style="color: red;">{{ array_first($errors->get('username')) }}</span>
                        @endif

					  <div class="form-group">
						<label class="control-label">Password *</label>
						<input class="form-control" type="password" placeholder=" Nhập password" required name="password" value="{{$objUser->password}}">
					  </div> 
					@if ($errors->has('password'))
                            <span style="color: red;">{{ array_first($errors->get('password')) }}</span>
                        @endif
					  

					  <div class="form-group">
						<label class="control-label">FullName *</label>
						<input class="form-control" type="text" placeholder=" Nhập fullname" required name="fullname" value="{{$objUser->fullname}}">
					  </div>
				
					  @if ($errors->has('fullname'))
                            <span style="color: red;">{{ array_first($errors->get('fullname')) }}</span>
                        @endif

                         <div class="form-group">
						<label class="control-label">Email *</label>
						<input class="form-control" type="email" placeholder=" Nhập email" required name="email" value="{{$objUser->email}}">
					  </div>
				
					  @if ($errors->has('email'))
                            <span style="color: red;">{{ array_first($errors->get('email')) }}</span>
                        @endif


					  <div class="card-footer">
						<button class="btn btn-primary icon-btn" name="smeditDM" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Đồng ý</button>
					  </div>
					</form>
              </div>
             
            </div>
          </div>
		   
		   
          </div>
       </div>

  </body>
</html>
@stop