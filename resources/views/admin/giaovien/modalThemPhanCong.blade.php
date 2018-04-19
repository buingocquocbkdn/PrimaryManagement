<form action="" method="" id="form-add">
  <div class="container">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Thêm phân công</h4>
            <h5 id="namhochocky"></h5>
          </div>
          <div class="modal-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" name="thoikhoabieu" value="" />
            <input type="hidden" name="lopadd" value="" />
            <input type="hidden" name="namhoc" value="" />
            <input type="hidden" name="hocky" value="" />
            <input type="hidden" name="add_phancong" value="" />
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Dạy môn học:</h4>
                  <div class="col-lg-10">
                    <select name ="loaimonhoc" class="form-control" id="loaimonhoc">
                      <option value="0">Chọn môn học</option>
                      @foreach($loaimonhoc as $mh)
                      <option value="{{$mh->id}}">{{$mh->ten}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                 <h4>Tên giáo viên</h4>
                 <select name ="giaovien_id" class="form-control" id="hoten">
                  @foreach($giaovien as $gv)
                  <option value="{{$gv->id}}">{{$gv->hoten}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <input style="float:right" class="btn btn-primary" name="add_phancong" value="Thêm" type="submit" id="add_phancong" disabled />
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
  $(document).ready(function() {
    $("#loaimonhoc").change(function() {
      $.ajax({
        url: "giaovien/checkMonHocPhanCong",
        method: "get",
        data: $('#form-add').serialize(),
        dataType : 'json',
        success : function(result){
         if (result.length>0) {
          $("#loaimonhoc").val(0);
          alert('Môn học đã được phân công dạy');
        } else {
          $('#add_phancong').attr('disabled',false);
          $.ajax({
            url: "giaovien/changeGiaoVien",
            method: "get",
            data: $('#form-add').serialize(),
            dataType : 'json',
            success : function(result){
              html='';
              $.each (result, function (key, item){
                html+='<option value="'+item.id+'">'+item.hoten+'</option>';
              });
              $('#hoten').html(html);
            }
          });
        }
      }
    });
    });

    $("#hoten").change(function() {
      var idGV = $(this).val();
      $.get("giaovien/changeMonHoc?idGV="+idGV,function(data){
        $("#loaimonhoc").html(data);
      });
    });
  });
</script>