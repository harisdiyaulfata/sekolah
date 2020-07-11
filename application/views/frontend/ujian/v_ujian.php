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
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div>Ujian Tengah Semester</div>
                                </div>
                            </div>
                        </div>
                        <?php if($uts == null) {
                        echo '<a href="'.site_url('ujian/soal/?metpen='.$id_mapel.'&ujian='.$id_ujian[0]).'">';
                        } ?>
                            <div class="panel-footer">
                                <span class="pull-left">
                                    <?php 
                                    if($uts != null) { 
                                        foreach ($uts as $key) {
                                            echo 'Nilai anda : '.$key->NILAI_H_UJIAN;
                                        }
                                    } else {
                                        echo 'Mulai Ujian';
                                    } ?>
                                </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        <?php if($uts == null) {
                        echo '</a>';
                        } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    
                                    <div>Ujian Akhir Semester</div>
                                </div>
                            </div>
                        </div>
                        <?php if($uas == null) {
                        echo '<a href="'.site_url('ujian/soal/?metpen='.$id_mapel.'&ujian='.$id_ujian[1]). '">';
                        } ?>
                            <div class="panel-footer">
                                <span class="pull-left">
                                <?php 
                                    if($uas != null) { 
                                        foreach ($uas as $key) {
                                            echo 'Nilai anda : '.$key->NILAI_H_UJIAN;
                                        }
                                    } else {
                                        echo 'Mulai Ujian';
                                    } ?>
                                </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        <?php if($uts == null) {
                        echo '</a>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>