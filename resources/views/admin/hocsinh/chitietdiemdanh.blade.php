<form action="hocsinh" method="post">
	<div class="container">
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Chi tiết điểm danh</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Ngày vắng</th>
									<th>Ghi chú</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody id="detailDiemDanh">
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