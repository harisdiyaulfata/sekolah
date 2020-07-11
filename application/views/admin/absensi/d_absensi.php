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
                    "url": "<?php echo base_url('dt_absensi/lis')?>/" + kelas,
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

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
        }

        function view(id)
        {
            var params = {d_kelas: id}
            
            $.ajax({
                url : "<?php echo site_url('dt_absensi/view')?>",
                data: params,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    if(data != ' ') {
                        $('#modal_absen').modal('show');
                        $('.modal-title').text('List Absen');
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
    </script>

    <script src="<?php echo base_url('assets/js/custom-scripts.js')?>"></script> 
</body>
</html>
<?php
    include('u_absensi.php');
?>