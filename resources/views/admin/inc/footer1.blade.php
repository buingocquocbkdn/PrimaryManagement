    <!-- Javascripts-->
    @yield('script')
    <script src="/public/admin_asset/js/main.js"></script>

    <script>
      $('.editUser').click(function(){
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
             	$('#emailedit').val(result.email);
               $('#modalPasswordEdit').modal('show');
             }
           });
      });

      $('#editUser').click(function(){
         $.ajax({
              url: "postUser",
              method: "post",
              data: $("#form-editUser").serialize(),			
             dataType : 'text',
             success : function(result){
             	$('#maso').val(result.maso);
             	$('#passwordedit').val(result.password);
             	$('#emailedit').val(result.email);
               $('#modalPasswordEdit').modal('show');
             }
           });
      });
    </script>
</body>
</html>