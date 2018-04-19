<form action="" method="" id="form-edit">
  <div class="container">
    <div class="modal fade" id="myModalEdit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sửa học sinh</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" name="id" id="id" value="" />
            <input type="hidden" name="edit_hocsinh" value="" />
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Họ tên:</h4>
                  <div class="col-lg-10">
                    <input class="form-control" value="" id="hotenedit" disabled name="hoten" type="text" placeholder="Họ tên học sinh">
                  </div>
                </div>
                <div class="col-md-6">
                  <h4>Ngày sinh:</h4>
                  <div class="col-lg-10">
                    <input class="form-control" value="" id="ngaysinhedit" disabled name="ngaysinh" type="text" placeholder="Ngày sinh">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <h4>Nơi sinh:</h4>
              <div class="row">
                <div class="col-md-6">
                  <h4>Tỉnh:</h4>
                  <div class="col-lg-10">
                   <select name ="tinh" class="form-control" id="tinhEdit">
                   </select>
                 </div>
                 <br/><br/>
                 <div id="tinh_warning_msg" style="margin-top: 10px;">     
                 </div>
               </div>
               <div class="col-md-6">
                <h4>Huyện:</h4>
                <div class="col-lg-10">
                 <select name ="huyen" class="form-control" id="huyenEdit">
                 </select>
               </div>
             </div>
           </div>
         </div>
         <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <h4>Dân tộc:</h4>
              <div class="col-lg-10">
                <select name ="dantoc" class="form-control" id="dantocedit">
                  @foreach($dantoc as $dt)
                  <option value="{{$dt->id}}">{{$dt->ten}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h4>Tôn giáo:</h4>
              <div class="col-lg-10">
                <select name ="tongiao" class="form-control" id="tongiaoedit">
                  @foreach($tongiao as $tg)
                  <option value="{{$tg->id}}">{{$tg->ten}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <h4>Họ tên cha:</h4>
              <div class="col-lg-10">
                <input class="form-control" value="" id="hotenchaedit" disabled name="hotencha" type="text" placeholder="Họ tên cha">
              </div>
            </div>
            <div class="col-md-6">
              <h4>Nghề nghiệp cha:</h4>
              <div class="col-lg-10">
                <select name ="nghenghiepcha" class="form-control" id="nghenghiepchaedit">
                  @foreach($nghenghiep as $nn)
                  <option value="{{$nn->id}}">{{$nn->ten}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <h4>Họ tên mẹ:</h4>
              <div class="col-lg-10">
                <input class="form-control" value="" id="hotenmeedit" disabled name="hotenme" type="text" placeholder="Họ tên mẹ">
              </div>
            </div>
            <div class="col-md-6">
              <h4>Nghề nghiệp mẹ:</h4>
              <div class="col-lg-10">
                <select name ="nghenghiepme" class="form-control" id="nghenghiepmeedit">
                  @foreach($nghenghiep as $nn)
                  <option value="{{$nn->id}}">{{$nn->ten}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <h4>Giới tính :</h4>
              <div class="col-md-9">
                <div class="radio-inline">
                  <label>
                    <input type="radio" id="nam" disabled name="gioitinh" value="0">Nam
                  </label>
                </div>
                <div class="radio-inline">
                  <label>
                    <input type="radio" id="nu" disabled name="gioitinh" value="1">Nữ
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h4>Số điện thoại:</h4>
              <div class="col-lg-10">
                <input class="form-control" value="" id="sodienthoaiedit" name="sodienthoai" type="text" placeholder="Số điện thoại">
              </div>
              <br/><br/>
              <div id="sodienthoai_warning_msg" style="margin-top: 10px;">     
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <input style="float:right" class="btn btn-primary" name="edit_hocsinh" value="Sửa" type="submit" id="edit_hocsinh" />
            <input style="float:left" class="btn btn-primary" value="Hủy bỏ" type="reset" id="reset"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<script type="text/javascript">

  checkSoDienThoaiEdit=true;
  checkTinhEdit=true;
  
  //A checkAdd function will check all valid fields of the added form.
  function checkEdit(){
    if(checkSoDienThoaiEdit&&checkTinhEdit){
      $("#edit_hocsinh").removeAttr("disabled");
    }else{
      $("#edit_hocsinh").attr('disabled', true);
    }
  }

//check Phone
$("#sodienthoaiedit").blur(function() {
  sodienthoai=$(this).val();
  if(sodienthoai==''){
    $('#sodienthoai_warning_msg').html('<span style="color:red"><strong>Số điện thoại</strong> không để trống !</span>'); 
    checkSoDienThoaiEdit=false;
    checkEdit();
  }else{
    $('#sodienthoai_warning_msg').html('');
    re1 =/^\d{10}$/;
    re2 =/^\d{11}$/;
    if(re1.test(sodienthoai)==false){
      if(re2.test(sodienthoai)==false){
        $('#sodienthoai_warning_msg').html('<span style="color:red"><strong>Số điện thoại</strong> phải là 10 hoặc 11 số !</span>');
        checkSoDienThoaiEdit=false;
        checkEdit();
      }
    }else{
      checkSoDienThoaiEdit=true;
      checkEdit();                
    }
  }

});

$('#tinhEdit').change(function(event) {
  tinh = $(this).val();
  if (tinh==0) {
   $('#tinh_warning_msg').html('<span style="color:red"><strong>Tỉnh</strong> được yêu cầu !</span>');
   checkTinhAdd=false;
   checkEdit();
 } else {
  $('#tinh_warning_msg').html('');
  $.ajax({
    url: "hocsinh/getHuyenByTinhId",
    method: "GET",
    data: {
      'id': tinh,
    },
    dataType : 'json',
    success : function(result){
      html='';
      $.each (result, function (key, item){
        html+='<option value="'+ item.id +'">'+ item.ten +'</option>';
      });
      $("#huyenEdit").html(html);
      checkTinhAdd=true;
      checkEdit();
    }
  });
}
});
</script>