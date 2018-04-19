<form action="" method="post" id="form-editAdmin">
  <div class="container">
    <div class="modal fade" id="modalPasswordEdit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sửa thông tin</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" name="id" id="id" value="" />
            <input type="hidden" name="editAdmin" value="" />
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Mã số:</h4>
                  <div class="col-lg-10">
                    <input class="form-control" disabled value="" id="maso" disabled type="text" >
                  </div>
                </div>
                <div class="col-md-6">
                  <h4>Mật khẩu:</h4>
                  <div class="col-lg-10">
                    <input class="form-control" value="" id="passwordedit" name="passwordedit" type="password">
                  </div>
                   <br/><br/>
                  <div id="password_warning_msg" style="margin-top: 10px;">     
                  </div>
                </div>
              </div>
            </div>
           
          
 
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <input style="float:right" class="btn btn-primary" name="editAdmin" disabled value="Sửa"  id="editAdmin" />
                
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
      $("#editAdmin").removeAttr("disabled");
    }else{
      $("#editAdmin").attr('disabled', true);
    }
  }
checkEdit();
//check noisinh.
$("#passwordedit").blur(function() {
  password=$(this).val();
  if(password==''){
    $('#password_warning_msg').html('<span style="color:red"><strong>Password </strong> không được trống !</span>');
    checkPassEdit=false;
    checkEdit();
  }else{
    $('#password_warning_msg').html('');
    if(password.length<3){
      $('#password_warning_msg').html('<span style="color:red"><strong>Password </strong>  không nhỏ hơn 3 ký tự !</span>');
      checkPassEdit=false;
      checkEdit();
    }else if(password.length>50){
      $('#password_warning_msg').html('<span style="color:red"><strong>Password </strong>  không lớn hơn 50 ký tự !</span>');
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