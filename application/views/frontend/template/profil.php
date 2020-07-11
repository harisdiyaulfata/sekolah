		<div id="page-wrapper" >
			<div class="header">
				<h1 class="page-header">
					<?php echo $aktif; ?>
				</h1>

				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li class="active"><?php echo $aktif; ?></li>
				</ol>
			</div>
			<div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>Data Diri</center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
	                                <tbody>
	                                	<?php
	                                		if($data != NULL){
	                                			foreach ($data as $key) { ?>
	                                				<tr class="odd gradeA">
	                                					<td>NISN</td>
				                                        <td><?php echo $key->NISN ?></td>
				                                    </tr>
				                                    <tr>
				                                    	<td>Nama</td>
				                                        <td><?php echo $key->NAMA_SISWA ?></td>
				                                    </tr>
				                                    <tr>
				                                    	<td>Jenis Kelamin</td>
				                                        <td><?php echo $key->JENIS_KELAMIN ?></td>
				                                    </tr>
				                                    <tr>
				                                    	<td>Alamat</td>
				                                        <td class="center"><?php echo $key->ALAMAT_SISWA ?></td>
				                                    </tr>
				                                    <tr>
				                                    	<td>Kelas</td>
				                                        <td class="center"><?php echo $key->KELAS ?></td>
				                                    </tr>
	                                			<?php }
	                                		}
	                                	?>
	                                </tbody>
                            	</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     	</div>
    </div>
</body>
</html>