<form method="post" id="form-editGV">
  <div class="container">
    <div class="modal fade" id="modalPasswordGV" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sửa thông tin</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" id="idGV" name="masoGV" value="" />
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Tên giáo viên:</h4>
                  <div class="col-lg-10">
                    <input class="form-control" disabled value="" id="tengiaovien" disabled type="text" >
                  </div>
                </div>
                <div class="col-md-6">
                  <h4>Mã số</h4>
                  <div class="col-lg-10">
                    <input class="form-control" disabled value="" type="text" id="masoGV"  >
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
                    <input class="form-control" type="password" value="" id="passwordGV" name="passwordGV" >
                  </div>
                   <br/><br/>
                  <div id="password_warning_msg1" style="margin-top: 10px;">     
                  </div>
                </div>
              </div>
            </div>
 
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <input style="float:right" class="btn btn-primary" name="editGV" disabled value="Sửa"  id="editGV" />
                
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
      $("#editGV").removeAttr("disabled");
    }else{
      $("#editGV").attr('disabled', true);
    }
  }
checkEdit();
//check noisinh.
$("#passwordGV").blur(function() {
  password=$(this).val();
  if(password==''){
    $('#password_warning_msg1').html('<span style="color:red"><strong>Password </strong> không được trống !</span>');
    checkPassEdit=false;
    checkEdit();
  }else{
    $('#password_warning_msg1').html('');
    if(password.length<3){
      $('#password_warning_msg1').html('<span style="color:red"><strong>Password </strong>  không nhỏ hơn 3 ký tự !</span>');
      checkPassEdit=false;
      checkEdit();
    }else if(password.length>50){
      $('#password_warning_msg1').html('<span style="color:red"><strong>Password </strong>  không lớn hơn 50 ký tự !</span>');
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