@extends('admin.inc.index')
@section('content')
      <div class="content-wrapper">
		
        <div class="row user">
			<div class="col-md-12">
				<div class="profile">
				  <div class="info"><img class="user-img" src="/templates/admin/images/admin.jpg">
					<h4>@if(Session::has("name"))

					 {{Session::get("name")}}
					@endif</h4>
					<p></p>
				  </div>
				  <div class="cover-image"></div>
				</div>
			</div>
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
					<form action="{{route('admin.hoatdong.postedit',$objHoatDong->id)}}" method="post" enctype="multipart/form-data"  >
					{{csrf_field()}}

					  <div class="form-group">
						<label class="control-label">Tiêu đề  *</label>
						<input class="form-control" type="text" placeholder=" Nhập tiêu đề" required name="tieude" value="{{$objHoatDong->ten}}">
					  </div>
					   @if ($errors->has('tieude'))
                            <span style="color: red;">{{ array_first($errors->get('tieude')) }}</span>
                        @endif
					@if($objHoatDong->hinh != "")
						<div class="form-group">
                            <label>Ảnh cũ</label>
                            <img src="{{ $imgUrl }}/{{$objHoatDong->hinh}}" width="120px" alt="Xóa ảnh" /> Xóa <input type="checkbox" name="delete_picture" value="1" />
                        </div>
					 @endif
					  <div class="form-group">
						<label class="control-label">Hình ảnh *</label>
						<input class="form-control" type="file" name="hinhanh" style="width: 30%;"  >
					  </div>
					  
					   <div class="form-group">
						<label class="control-label">Mô tả *</label>
						<textarea name="mota"  rows="7" cols="90" class="input-medium" style="width: 100%;" required >{{$objHoatDong->mota}}
						
						</textarea>
					  </div>
					  @if ($errors->has('mota'))
                            <span style="color: red;">{{ array_first($errors->get('mota')) }}</span>
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