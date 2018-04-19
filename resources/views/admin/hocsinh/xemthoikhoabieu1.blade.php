@extends('admin.inc.index')
@section('content')
<div class="content-wrapper">
	<form action="" method="">
	<input  type="submit" value="Tìm kiếm" name="thoikhoabieu" />
	</form>
	<!-- /.col-lg-12 -->
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('input[type="submit"]').click(function(event){
		alert('ok');
		return false;
	}
</script>
@endsection