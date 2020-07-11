		<div id="page-wrapper" >
			<div class="header">
				<h1 class="page-header">
					<?php echo $aktif; ?>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('home_admin'); ?>">Home</a></li>
					<li class="active"><?php echo $aktif; ?></li>
				</ol>
			</div>
			<div id="page-inner"> 
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
								 Data <?php echo $aktif; ?>
							</div>
							
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>No</th>
												<th>NISN</th>
												<th>Nama</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>STATUS</th>
												<th style="width:200px;">Action</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var save_method;
		var table;

		$(document).ready(function() {
			table = $('#dataTables-example').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?php echo base_url('siswa/lis_data');?>",
					"type": "POST"
				},
				"columnDefs": [
				{ 
					"targets": [ 0 ],
					"orderable": false,
				} ]
			} );
		} );

		function reload_table()
		{
			table.ajax.reload(null,false); //reload datatable ajax 
		}
		
		function non_aktif(id)
		{
			if(confirm('Are you sure Non-Aktif this data?'))
			{
				var params = {status: 'Tidak Aktif', nisn: id}
				$.ajax({
					url : "<?php echo site_url('siswa/delet')?>",
					type: "GET",
					data: params,
					dataType: "JSON",
					success: function(data)
					{
						reload_table();
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error updating data');
					}
				});

			}
		}
		
		function aktif(id)
		{
			if(confirm('Are you sure Aktif this data?'))
			{
				var params = {status: 'Aktif', nisn: id}
				$.ajax({
					url : "<?php echo site_url('siswa/delet')?>",
					type: "GET",
					data: params,
					dataType: "JSON",
					success: function(data)
					{
						reload_table();
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error updating data');
					}
				});

			}
		}
    </script>
	<script src="<?php echo base_url('assets/js/custom-scripts.js')?>"></script> 
</body>
</html>