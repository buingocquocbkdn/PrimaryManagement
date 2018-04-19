/* 
 $('#khoi').change(function(){
  	var id = $("#khoi").val();
  	//alert(id)
    $.ajax({
       url: "{{ route('school.khoilop') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}', 
            aid:id,
        },
        success: function(data){
            var a ='#x';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    });

 $('#lop').change(function(){
    var id = $("#lop").val();
    //alert(id)
    $.ajax({
       url: "{{ route('school.lop') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}', 
            aid:id,
        },
        success: function(data){
            var a ='#xkq';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    });*/