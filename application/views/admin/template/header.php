<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title><?php if($aktif != "") { echo $aktif.' - '; }?>SIM SEKOLAH</title>
	
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/font-awesome.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/custom-styles.css');?>" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.css');?>" rel="stylesheet" />
	
	<script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.metisMenu.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.js');?>"></script>
</head>
<body onLoad="startTime()">
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('home_admin'); ?>"><strong>SIM SEKOLAH</strong></a>
				<div id="sideNav" href="">
		<i class="fa fa-bars icon"></i> 
		</div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('home_admin/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
		<?php
		$n_ujian[0] = 'UTS';
		$n_ujian[1] = 'UAS';
		$n_kelas[0] = 'X';
		$n_kelas[1] = 'XI';
		$n_kelas[2] = 'XII';
        $n_absensi[0] = 'Absensi';
        $n_absensi[1] = 'List Kehadiran'
		?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?php echo site_url('siswa'); ?>" <?php if($aktif == "Kelola Siswa") { ?> class="active-menu" <?php } ?>><i class="fa fa-table"></i> Kelola Siswa</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-qrcode"></i> Absensi Siswa <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Absensi Harian<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo site_url('absensi/?kelas=211&absen=503&n_absensi='.$n_absensi[0].'&n_kelas='.$n_kelas[0]); ?>">Kelas X</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('absensi/?kelas=212&absen=503&n_absensi='.$n_absensi[0].'&n_kelas='.$n_kelas[1]); ?>">Kelas XI</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('absensi/?kelas=213&absen=503&n_absensi='.$n_absensi[0].'&n_kelas='.$n_kelas[2]); ?>">Kelas XII</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Data Kehadiran<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo site_url('dt_absensi/?kelas=211&n_absensi='.$n_absensi[1].'&n_kelas='.$n_kelas[0]); ?>">Kelas X</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('dt_absensi/?kelas=212&n_absensi='.$n_absensi[1].'&n_kelas='.$n_kelas[1]); ?>">Kelas XI</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('dt_absensi/?kelas=213&n_absensi='.$n_absensi[1].'&n_kelas='.$n_kelas[2]); ?>">Kelas XII</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Soal Ujian<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Seleksi Siswa Baru</a>
                            </li>
							<li>
                                <a href="#">Kelas X<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo site_url('soal/?ujian=311&kelas=211&n_ujian='.$n_ujian[0].'&n_kelas='.$n_kelas[0]); ?>">UTS</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('soal/?ujian=312&kelas=211&n_ujian='.$n_ujian[1].'&n_kelas='.$n_kelas[0]); ?>">UAS</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Kelas XI<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo site_url('soal/?ujian=311&kelas=212&n_ujian='.$n_ujian[0].'&n_kelas='.$n_kelas[1]); ?>">UTS</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('soal/?ujian=312&kelas=212&n_ujian='.$n_ujian[1].'&n_kelas='.$n_kelas[1]); ?>">UAS</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Kelas XII<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo site_url('soal/?ujian=311&kelas=213&n_ujian='.$n_ujian[0].'&n_kelas='.$n_kelas[2]); ?>">UTS</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('soal/?ujian=312&kelas=213&n_ujian='.$n_ujian[1].'&n_kelas='.$n_kelas[2]); ?>">UAS</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="<?php echo site_url('siswa/data'); ?>" <?php if($aktif == "Siswa") { ?> class="active-menu" <?php } ?>><i class="fa fa-table"></i> Data Siswa</a>
                    </li>
                </ul>
            </div>
        </nav>