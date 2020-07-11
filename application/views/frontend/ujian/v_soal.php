		<div id="page-wrapper" >
			<div class="header">
            <div id="timer" style="font-family:calibri;font-size:1px;text-align:left;float:right;"></div>
				<h1 class="page-header">
					<?php echo $aktif; ?>
				</h1>

				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li class="active"><?php echo $aktif_ujian; ?></li>
				</ol>
			</div>
		
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                 <?php
                                    if($soal != null) {
                                        $no = 1;?>
                                        <form method="POST" action="<?php echo site_url('ujian/save'); ?>">
                                        <?php foreach($soal as $ds) { ?>
                                            
                                                <div class="form-group">
                                                    <label><?php echo $no.'. '.$ds->SOAL ?> ?</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="<?php echo 'radio'.$no ?>" value="<?php echo $ds->PLH1 ?>"><?php echo $ds->PLH1 ?>
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="<?php echo 'radio'.$no ?>" value="<?php echo $ds->PLH2 ?>"><?php echo $ds->PLH2 ?>
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="<?php echo 'radio'.$no ?>" value="<?php echo $ds->PLH3 ?>"><?php echo $ds->PLH3 ?>
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="<?php echo 'radio'.$no ?>" value="<?php echo $ds->PLH4 ?>"><?php echo $ds->PLH4 ?>
                                                        </label>
                                                    </div>
                                                    <input type="hidden" name="jawaban<?php echo $no ?>" value="<?php echo $ds->JWB ?>">
                                                </div>
                                            
                                        <?php $no++;
                                        } ?>
                                            <input type="hidden" name="jumlah" value="<?php echo $no-1 ?>">
                                            <input type="hidden" name="id_mapel" value="<?php echo $id_mapel ?>">
                                            <input type="hidden" name="id_ujian" value="<?php echo $id_ujian ?>">
                                            <input type="submit" class="btn btn-success" id="submit" name="save" value="save">
                                        </form>
                                    <?php 
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
 
  <!-- Script Timer -->
     <script type="text/javascript">
        $(document).ready(function() {
              /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik = 0,
                * var menit = 1,
                * var jam = 1
              */
              var detik = 10;
              var menit = 0;
              var jam   = 0;
              
             /**
               * Membuat function hitung() sebagai Penghitungan Waktu
             */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                    * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
               /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
               if(menit < 10 && jam == 0){
                     var peringatan = 'style="color:red"';
               };
 
               /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
               $('#timer').html(
                      '<h4 align="center"'+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h4>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
 
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
 
                    /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
 
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                        if(jam < 0) {                                                                 
                            //clearInterval();
                            document.getElementById('submit').click()
                        } 
                    } 
                } 
            } 

            function autosave(){
                
            }          
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
            //autosave();
            
      }); 
      // ]]>
    </script>
</html>
                            
                                    
                                    	
