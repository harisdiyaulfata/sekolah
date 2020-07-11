		<div id="page-wrapper" >
			<div class="header">
				<h1 class="page-header">
					<?php echo $aktif; ?>
				</h1>
				<label style="font-size:50px;font-family:calibri">	Tgl : <?php echo(date('d-m-Y')); ?></label>
				<div id="txt" style="font-family:calibri;font-size:50px;text-align:left;margin-bottom:30px;float:right;width:200px"></div><hr>
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
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
								<input type="hidden" id="kelas" name="kelas" value="<?php echo $id_kelas; ?>">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>No</th>
												<th>NISN</th>
												<th>Nama</th>
												<th>Jenis Kelamin</th>
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
		//var save_method;
		var table;
		
		$(document).ready(function() {

			var kelas = document.getElementById('kelas').value;
			table = $('#dataTables-example').DataTable(

			{

				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?php echo base_url('absensi/lis')?>/" + kelas,
					"type": "POST"
				},
				"language": {
    				"infoFiltered": ""
  				},
				"columnDefs": [
				{ 
					"targets": [ 0 ],
					"orderable": false,

				} ]

			} );
		} );

    </script>

    <script>
    function startTime()
	{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
	// add a zero in front of numbers<10
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('txt').innerHTML=h+":"+m+":"+s;
		t=setTimeout(function(){startTime()},500);
	}

	function checkTime(i)
	{
		if (i<10)
  		{
  			i="0" + i;
  		}
	return i;
	}

	function reload_table()
		{
			table.ajax.reload(null,false); //reload datatable ajax 
		}
		
	function kehadiran(id_kelas,id_absensi)
		{
				var params = {kelas: id_kelas, absensi: id_absensi}
				$.ajax({
					url : "<?php echo site_url('absensi/status')?>",
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


	</script>

	<script src="<?php echo base_url('assets/js/custom-scripts.js')?>"></script> 
</body>
</html>
