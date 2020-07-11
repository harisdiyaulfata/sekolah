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
							<div class="panel-body" id="awal">
								<p id="sukses" style="color:green"></p>
								<div class="table-responsive">
									<form>
										<input type="hidden" id="k_ujian" name="k_ujian" value="<?php echo $id_ujian; ?>">
										<input type="hidden" id="k_kelas" name="k_kelas" value="<?php echo $id_kelas; ?>">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th>No</th>
													<th>Mata Pelajaran</th>
													<th style="width:200px;">Action</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</form>
								</div>
							</div>
							<?php
								include('a_soal.php');
							?>
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
			$("#akhir").hide();
			table = $('#dataTables-example').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?php echo base_url('soal/lis');?>",
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
		
		function save()
		{
			$.ajax({
				url : "<?php echo site_url('soal/save')?>",
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data)
				{
					$('#akhir').hide();
					$('#awal').show();
					document.getElementById('sukses').innerHTML = "Soal berhasil ditambahkan";
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
				}
			});
		}
		
		function view(id)
		{
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();
			
			var kelas = document.getElementById('k_kelas').value;
			var ujian = document.getElementById('k_ujian').value;
			var params = {a: id, b: kelas, c: ujian}
			
			$.ajax({
				url : "<?php echo site_url('soal/view')?>",
				data: params,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{
					if(data != ' ') {
						$('#modal_form').modal('show');
						$('.modal-title').text('List Soal');
						document.getElementById('view').innerHTML = data;
					} else {
						alert('Tidak ada soal');
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
				}
			});
		}

		function delet(id)
		{
			if(confirm('Are you sure delete this data?'))
			{
				var kelas = document.getElementById('k_kelas').value;
				var ujian = document.getElementById('k_ujian').value;
				var params = {a: id, b: kelas, c: ujian}
				
				$.ajax({
					url : "<?php echo site_url('soal/delet')?>",
					data: params,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
						$('#modal_form').modal('hide');
						reload_table();
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error deleting data');
					}
				});
			}
		}
		function add(id)
		{
			var kelas = document.getElementById('k_kelas').value;
			var ujian = document.getElementById('k_ujian').value;
			var params = {a: id, b: kelas, c: ujian}
			$.ajax({
				url : "<?php echo site_url('soal/add')?>",
				data: params,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{
					if(data.status) {
						$('#form')[0].reset();
						$('#akhir').show();
						$('#awal').hide();
						$('[name="id_mapel"]').val(id);
					} else {
						alert('Soal sudah ada');
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error add');
				}
			});
		}
		function cancel()
		{
			$('#akhir').hide();
			$('#awal').show();
		}
    </script>
	<script src="<?php echo base_url('assets/js/custom-scripts.js')?>"></script> 
</body>
</html>
<?php
	include('u_soal.php');
?>