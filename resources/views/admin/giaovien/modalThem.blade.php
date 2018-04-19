<form action="" method="" id="form-add">
  <div class="container">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Thêm giáo viên</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
             <input type="hidden" name="add_giaovien" value="" />
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Họ tên:</h4>
                  <div class="col-lg-10">
                    <input class="form-control" value="" id="hotenadd" name="hoten" type="text" placeholder="Họ tên học sinh">
                  </div>
                  <br/><br/>
                  <div id="hoten_warning_msg" style="margin-top: 10px;">     
                  </div>
                </div>
                <div class="col-md-6">
                  <h4>Ngày sinh:</h4>
                  <div class="col-lg-10">
                    <input class="form-control" value="" id="ngaysinh" name="ngaysinh" type="date" placeholder="Ngày sinh">
                  </div>
                  <br/><br/>
                  <div id="ngaysinh_warning_msg" style="margin-top: 10px;">     
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <h4>Địa chỉ:</h4>
              <div class="row">
                <div class="col-md-6">
                  <h4>Tỉnh:</h4>
                  <div class="col-lg-10">
                   <select name ="tinh" class="form-control" id="tinhAdd">
                   <option value="0">Chọn tỉnh</option>
                    @foreach($tinh as $t)
                    <option value="{{$t->id}}">{{$t->ten}}</option>
                    @endforeach
                  </select>
                </div>
                <br/><br/>
                 <div id="tinh_warning_msg" style="margin-top: 10px;">     
                 </div>
              </div>
              <div class="col-md-6">
                <h4>Huyện:</h4>
                <div class="col-lg-10">
                 <select name ="huyen" class="form-control" id="huyenAdd">
                </select>
              </div>
            </div>
          </div>
        </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Dạy môn học:</h4>
                  <div class="col-lg-10">
                    <select name ="loaimonhoc" class="form-control">
                    @foreach($loaimonhoc as $mh)
                      <option value="{{$mh->id}}">{{$mh->ten}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                 
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
                      <input type="radio" checked="checked" name="gioitinh" value="0">Nam
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="gioitinh" value="1">Nữ
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h4>Số điện thoại:</h4>
                <div class="col-lg-10">
                  <input class="form-control" value="" id="sodienthoai" name="sodienthoai" type="text" placeholder="Số điện thoại">
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
              <input style="float:right" class="btn btn-primary" name="add_giaovien" value="Thêm" type="submit" id="add_giaovien" disabled />
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
  checkHoTenAdd=false;
  checkSoDienThoaiAdd=false;
  checkNgaySinhAdd=false;
  checkTinhAdd=false;
  
  //A checkAdd function will check all valid fields of the added form.
  function checkAdd(){
    if(checkHoTenAdd&&checkSoDienThoaiAdd&&checkNgaySinhAdd&&checkTinhAdd){
      $("#add_giaovien").removeAttr("disabled");
    }else{
      $("#add_giaovien").attr('disabled', true);
    }
  }
//check Username.

$("#ngaysinh").blur(function() {
  ngaysinh=$(this).val();
  if(ngaysinh==''){
    $('#ngaysinh_warning_msg').html('<span style="color:red"><strong>Ngày sinh</strong> không được để trống !</span>');
    checkNgaySinhAdd=false;
    checkAdd();
  } else {
   checkNgaySinhAdd=true;
   checkAdd();
 }
});
$("#hotenadd").blur(function() {
  hoten=$(this).val();
  if(hoten==''){
    $('#hoten_warning_msg').html('<span style="color:red"><strong>Họ tên</strong> không được để trống !</span>');
    checkHoTenAdd=false;
    checkAdd();
  }else{
   $('#hoten_warning_msg').html('');
   re =/^[a-zA-Z]+$/;
   if(re.test(hoten)==true){
     if(hoten.length<3){
      $('#hoten_warning_msg').html('<span style="color:red"><strong>Họ tên</strong> không nhỏ hơn 6 ký tự !</span>');
      checkHoTenAdd=false;
      checkAdd();
    }else if(hoten.length>20){
      $('#hoten_warning_msg').html('<span style="color:red"><strong>Họ tên</strong>  không lớn hơn 20 ký tự !</span>');
      checkHoTenAdd=false;
      checkAdd();
    }else{
      checkHoTenAdd=true;
      checkAdd();
    } 
  } else {
    $('#hoten_warning_msg').html('<span style="color:red"><strong>Họ tên</strong>  không chứa ký tự đặc biệt!</span>');
    checkHoTenAdd=false;
    checkAdd();
  }
}
});

//check Phone
$("#sodienthoai").blur(function() {
  sodienthoai=$(this).val();
  if(sodienthoai==''){
    $('#sodienthoai_warning_msg').html('<span style="color:red"><strong>Số điện thoại</strong> không để trống !</span>'); 
    checkSoDienThoaiAdd=false;
    checkAdd();
  }else{
    $('#sodienthoai_warning_msg').html('');
    re1 =/^\d{10}$/;
    re2 =/^\d{11}$/;
    if(re1.test(sodienthoai)==false){
      if(re2.test(sodienthoai)==false){
        $('#sodienthoai_warning_msg').html('<span style="color:red"><strong>Số điện thoại</strong> phải là 10 hoặc 11 số !</span>');
        checkSoDienThoaiAdd=false;
        checkAdd();
      }
    }else{
      checkSoDienThoaiAdd=true;
      checkAdd();                
    }
  }

});

$('#tinhAdd').change(function(event) {
  tinh = $(this).val();
  if (tinh==0) {
    $('#tinh_warning_msg').html('<span style="color:red"><strong>Tỉnh</strong> được yêu cầu !</span>');
    checkTinhAdd=false;
    checkAdd();
  } else {
   $('#tinh_warning_msg').html('');
   $.ajax({
    url: "giaovien/getHuyenByTinhId",
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
      $("#huyenAdd").html(html);
      checkTinhAdd=true;
      checkAdd();
    }
  });
 }
});
</script>