<form action="" method="" id="form-edit">
  <div class="container">
    <div class="modal fade" id="myModalEdit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sửa phân công</h4>
            <h5 id="namhochocky"></h5>
          </div>
          <div class="modal-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" name="thoikhoabieu" value="" />
            <input type="hidden" name="namhoc" value="" />
            <input type="hidden" name="hocky" value="" />
            <input type="hidden" name="add_phancong" value="" />
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <h4>Dạy môn học:</h4>
                  <div class="col-lg-10">
                    <select name ="loaimonhoc" class="form-control">
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
      var loaimonhoc = $(this).val();
      $.ajax({
        url: "giaovien/checkMonHocPhanCong",
        method: "get",
        data: $('#form-add').serialize(),
        dataType : 'text',
        success : function(result){
         if (result.length>0) {
          alert('Môn học đã được phân công dạy');
        } else {
          $('#add_phancong').attr('disabled',false);
          $.get("giaovien/changeGiaoVien?loaimonhoc="+loaimonhoc,function(data){
            $("#hoten").html(data);
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

    $('#add_phancong').click(function(event) {
      $.ajax({
        url: "giaovien/add_PhanCong",
        method: "get",
        data: $('#form-add').serialize(),
        dataType : 'text',
        success : function(result){
         if (result=='ok') {
          alert('Thêm thành công');
        } else {
          alert(result);
        }
      }
    });
      $('#reset').click();
      $('#myModal').modal('hide');
      return false;
    });
  });
</script>