<form action="" method="">
	<div class="container">
		<div class="modal fade" id="myModalThoiKhoaBieu" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thời khóa biểu</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Tiết học</th>
									<th>Thứ hai</th>
									<th>Thứ ba</th>
									<th>Thứ tư</th>
									<th>Thứ năm</th>
									<th>Thứ sáu</th>
								</tr>
							</thead>
							<tbody>
								@for($i=1;$i<=10;$i++)
								<tr class="odd gradeX">
									<td>Tiết {{$i}}</td>
									<td class="tiet{{$i}}"></td>
									<td class="tiet{{$i}}"></td>
									<td class="tiet{{$i}}"></td>
									<td class="tiet{{$i}}"></td>
									<td class="tiet{{$i}}"></td>
								</tr>
								@endfor
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	
</script>