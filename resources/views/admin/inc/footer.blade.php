    <!-- Javascripts-->
    @yield('script')
    <script src="/public/admin_asset/js/main.js"></script>

    <script>

    //EDIT admin
      $('.editAdmin').click(function(){
        id = $(this).attr('id');
         $.ajax({
              url: "getUser/"+id,
              method: "get",
              data: {},
             dataType : 'json',
             success : function(result){
             	$('#id').val(result.id);
             	$('#maso').val(result.maso);
             	$('#passwordedit').val(result.password);
               $('#modalPasswordEdit').modal('show');
             }
           });
      });

      $('#editAdmin').click(function(){
         $.ajax({
              url: "postUser",
              method: "post",
              data: $("#form-editAdmin").serialize(),			
             dataType : 'text',
             success : function(result){
             	
               $('#modalPasswordEdit').modal('hide');
                if (result == 1) {
                 alert('Sửa thành công');
                } 
             }
           });
      });

      //edit pass Giaovien

       $('.editGV').click(function(){
        id = $(this).attr('id');
       $.ajax({
          url: "nguoidung/giaovien/editpassGV/"+id,
          method: "get",
          data: {},
         dataType : 'json',
         success : function(result){
          $('#tengiaovien').val(result.tengiaovien);
          $('#masoGV').val(result.maso);
          $('#idGV').val(result.maso);
          $('#passwordGV').val(result.password);
          $('#modalPasswordGV').modal('show');
           }
         });
      });

      $('#editGV').click(function(){
         $.ajax({
               url: "nguoidung/giaovien/editpassGV",
              method: "post",
              data: $("#form-editGV").serialize(),   
             dataType : 'text',
             success : function(result){
              
              $('#modalPasswordGV').modal('hide');
              if (result == 1) {
                 alert('Sửa thành công');
              } 
             
             }
           });
      });




       function getTrangThaiGV(id)
        { 
          var url='nguoidung/giaovien/active/'+id;
          var tmp="#actice-"+id;
        
          $.ajax({
              url:url,
              dataType: "html",
              success: function(result) {                
                  $(tmp).html(result);
              },
          });
        }

        //edit HS

        //edit pass Hoc sinh

       $('.editHS').click(function(){
        id = $(this).attr('id');
         $.ajax({
            url: "nguoidung/hocsinh/editpassHS/"+id,
            method: "get",
            data: {},
           dataType : 'json',
           success : function(result){
              $('#tenhocsinh').val(result.tenhocsinh);
              $('#masoHS').val(result.maso);
              $('#idHS').val(result.maso);
              $('#passwordHS').val(result.password);
              $('#modalPasswordHS').modal('show');
            }
           });
      });

      $('#editHS').click(function(){
         $.ajax({
               url: "nguoidung/hocsinh/editpassHS",
              method: "post",
              data: $("#form-editHS").serialize(),   
             dataType : 'text',
             success : function(result){
              
              $('#modalPasswordHS').modal('hide');
              if (result == 1) {
                 alert('Sửa thành công');
              } 
             }
           });
      });

        function getTrangThaiHS(id)
        { 
          var url='nguoidung/hocsinh/active/'+id;
          var tmp="#actice-"+id;
        
          $.ajax({
              url:url,
              dataType: "html",
              success: function(result) {                
                  $(tmp).html(result);
              },
          });
        }

    </script>
</body>
</html>