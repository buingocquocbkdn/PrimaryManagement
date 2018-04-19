<form method="" id="form-editHS">
  <div class="container">
    <div class="modal fade" id="modalPasswordHS" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sửa thông tin</h4>
          </div>
          <div class="modal-body">
           <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" id="idHS" name="masoHS" value="" />
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Tên học sinh:</h4>
                  <div class="col-lg-10">
                    <input class="form-control"  value="" id="tenhocsinh" disabled type="text" >
                  </div>
                </div>
                <div class="col-md-6">
                  <h4>Mã số</h4>
                  <div class="col-lg-10">
                    <input class="form-control" disabled value="" type="text" id="masoHS"  >
                  </div>
                   <br/><br/>
                  
                </div>
              </div>
            </div>
           
            <div class="form-group">
              <div class="row">
            
                <div class="col-md-12">
                  <h4>Mật khẩu:</h4>
                  <div class="col-lg-11">
                    <input class="form-control" type="password" value="" id="passwordHS" name="passwordHS" >
                  </div>
                   <br/><br/>
                  <div id="password_warning_msg2" style="margin-top: 10px;">     
                  </div>
                </div>
              </div>
            </div>
 
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <input style="float:right" class="btn btn-primary" name="editHS" disabled value="Sửa"  id="editHS" />
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
 $(document).ready(function() {
  checkPassEdit=true;
  
  //A checkAdd function will check all valid fields of the added form.
  function checkEdit(){
    if(checkPassEdit){
      $("#editHS").removeAttr("disabled");
    }else{
      $("#editHS").attr('disabled', true);
    }
  }
checkEdit();
//check noisinh.
$("#passwordHS").blur(function() {
  password=$(this).val();
  if(password==''){
    $('#password_warning_msg2').html('<span style="color:red"><strong>Password </strong> không được trống !</span>');
    checkPassEdit=false;
    checkEdit();
  }else{
    $('#password_warning_msg2').html('');
    if(password.length<3){
      $('#password_warning_msg2').html('<span style="color:red"><strong>Password </strong>  không nhỏ hơn 3 ký tự !</span>');
      checkPassEdit=false;
      checkEdit();
    }else if(password.length>50){
      $('#password_warning_msg2').html('<span style="color:red"><strong>Password </strong>  không lớn hơn 50 ký tự !</span>');
      checkPassEdit=false;
      checkEdit();
    }else{
      checkPassEdit=true;
      checkEdit();
    } 
  }

});
})


</script>