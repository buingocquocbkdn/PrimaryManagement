 <div class="page-title" id="xeplop">
  <div class="container">
    <center>
      @if (date('m')<5||date('m')>8)
      <h4 class="card-title">Thời gian phân lớp học là từ tháng đầu tháng 5 đến cuối tháng 8</h4>
      @endif
      <form action="hocsinh" id="export-form" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <h3 class="card-title">Phân lớp</h3>
        <h4 class="card-title">Năm học {{$namhocDen[1]->ten}}</h4>
        <input type="hidden" id="namhocPhanLop" name="namhocPhanLop" value="{{$namhocDen[1]->id}}" />
        <div class="toggle-flip">
          <label>
            <input type="checkbox" id="flip"><span class="flip-indecator" data-toggle-on="LÊN LỚP" data-toggle-off="HỌC LẠI"></span>
          </label>
        </div>
        <div class="card-body3">
          <div></div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Từ:    </label>
                <select name="fromlop" class="form-control" id="fromlop">
                  <option value="0">---Chọn lớp---</option>
                </select>
                <br/><br/>
                <div class="card-title-w-btn">
                  <p><i class="fa fa-file"><input class="btn btn-primary icon-btn" type="submit" name="exportFile" id="exportFile" value="Xuất file"></i></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label"> đến   </label>
                <select name="tolop" class="form-control" id="tolop">
                  <option value="0">---Chọn lớp---</option>
                </select>
                <br/><br/>
                <div class="card-title-w-btn">
                  <p><i class="fa fa-file"></i>Nhập file</p>
                  <input type="file" name="file" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <button class="btn btn-primary icon-btn" type="button" id="chuyenAll">Chuyển toàn bộ</button>
                <br/><br/>
                <button class="btn btn-primary icon-btn" type="submit" id="importFile" name="importFile">Chuyển từ file</button>
              </div>
            </div>
          </div>
          <!-- /.navbar-collapse -->
          <!-- /.container-fluid -->
        </form>
      </center>
    </div>
  </div>
  <script  type="text/javascript">
    $(document).ready(function() {
      monthCurrent=new Date().getMonth();
      if (monthCurrent<5||monthCurrent>8) {
        $('#chuyenAll').attr('disabled',true);
        $('#importFile').attr('disabled',true);
      }
      $('#importFile').click(function(event) {
        idLopDi=$('#fromlop').val();
        idLopDen=$('#tolop').val();
        if (idLopDen==0||idLopDi==0) {
          alert('Mời chọn lớp để phân lớp');
          return false;
        }
      });

      $('#exportFile').click(function(event) {
        idLopDi=$('#fromlop').val();
        if (idLopDi==0) {
          alert('Mời chọn lớp');
          return false;
        }
      });
    });
  </script>