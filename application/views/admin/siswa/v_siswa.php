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
								<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
								<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
								<br/><br/>
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
												<th>Kelas</th>
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
					"url": "<?php echo base_url('siswa/lis');?>",
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

		function add()
		{
			save_method = 'add';
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();
			$('#modal_form').modal('show'); // show bootstrap modal
			$('.modal-title').text('Tambah Siswa'); // Set Title to Bootstrap modal title
			$('#nisn').prop('disabled', false);
			$('#div_kelas').show();
			
			$.ajax({
				url : "<?php echo site_url('siswa/add')?>",
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					document.getElementById('kelas').innerHTML = data;
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
		}

		function edit(id)
		{
			save_method = 'update';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$('#nisn').prop('disabled', true);
			$('#div_kelas').hide();

			//Ajax Load data from ajax
			$.ajax({
				url : "<?php echo site_url('siswa/edit')?>/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{

					$('[name="nisn"]').val(data.NISN);
					$('[name="nama_siswa"]').val(data.NAMA_SISWA);
					$('[name="jenis_kelamin"]').val(data.JENIS_KELAMIN);
					$('[name="agama_siswa"]').val(data.AGAMA_SISWA);
					$('[name="alamat_siswa"]').val(data.ALAMAT_SISWA);
					$('[name="thn_terima"]').val(data.THN_TERIMA);
					$('[name="password"]').val(data.PASSWORD);
					$('[name="nama_ayah"]').val(data.NAMA_AYAH);
					$('[name="nama_ibu"]').val(data.NAMA_IBU);
					$('[name="alamat_ortu"]').val(data.ALAMAT_ORTU);
					$('[name="pekerjaan_ayah"]').val(data.PEKERJAAN_AYAH);
					$('[name="pekerjaan_ibu"]').val(data.PEKERJAAN_IBU);
					$('[name="tlp_ayah"]').val(data.TLP_AYAH);
					$('[name="tlp_ibu"]').val(data.TLP_IBU);
					$('[name="nama_wali"]').val(data.NAMA_WALI);
					$('[name="alamat_wali"]').val(data.ALAMAT_WALI);
					$('[name="pekerjaan_wali"]').val(data.PEKERJAAN_WALI);
					$('[name="tlp_wali"]').val(data.TLP_WALI);
					$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
					$('.modal-title').text('Edit Siswa'); // Set title to Bootstrap modal title

				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
		}

		function save()
		{
			$('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled',true); //set button disable 
			var url;

			if(save_method == 'add') {
				url = "<?php echo site_url('siswa/save')?>";
			} else {
				url = "<?php echo site_url('siswa/update')?>";
				$("#nisn").prop('disabled', false);
			}

			// ajax adding data to database
			$.ajax({
				url : url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data)
				{

					if(data.status) //if success close modal and reload ajax table
					{
						$('#modal_form').modal('hide');
						reload_table();
						$('#form')[0].reset();
					}

					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 


				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 

				}
			});
		}

		function reset(nisn)
		{
			if(confirm('Are you sure reset password this data?'))
			{
				// ajax delete data to database
				$.ajax({
					url : "<?php echo site_url('siswa/reset')?>/"+nisn,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
						//if success reload ajax table
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
    </script>
	<script src="<?php echo base_url('assets/js/custom-scripts.js')?>"></script> 
</body>
</html>
<?php
include('u_siswa.php');
?>