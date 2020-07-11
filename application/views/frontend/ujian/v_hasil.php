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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                        		<form action="<?php echo site_url('home'); ?>">
                        			<center><label>Benar   : <?php echo $benar; ?></label><br>
                        			<label>Salah   : <?php echo $salah; ?></label><br>
                        			<label>Jumlah soal   : <?php echo $jumlah_soal; ?></label><br><hr>
                        			<h2>Nilai <?php echo $hasil_akhir; ?></h2><br><hr>
                        			<button class="btn btn-primary" style="widt:300px;" value="<?php echo site_url('home'); ?>">Kembali</button>
                        			</center>
                        		</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

