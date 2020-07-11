
		var save_method;
		var table;

		$(document).ready(function() {
			table = $('#dataTables-example').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?php echo base_url('anggota/lis');?>",
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
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();
			$('#modal_form').modal('show'); // show bootstrap modal
			$('.modal-title').text('Tambah Anggota'); // Set Title to Bootstrap modal title
		}

		function edit(id)
		{
			save_method = 'update';
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string

			//Ajax Load data from ajax
			$.ajax({
				url : "<?php echo site_url('anggota/edit')?>/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{

					$('[name="id_anggota"]').val(data.ID_ANGGOTA);
					$('[name="nama"]').val(data.NAMA);
					$('[name="nim"]').val(data.NIM);
					$('[name="jk"]').val(data.JK);
					$('[name="alamat_a"]').val(data.ALAMAT_A);
					$('[name="alamat_s"]').val(data.ALAMAT_S);
					$('[name="telp"]').val(data.TELP);
					$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
					$('.modal-title').text('Edit Anggota'); // Set title to Bootstrap modal title

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
				url = "<?php echo site_url('anggota/save')?>";
			} else {
				url = "<?php echo site_url('anggota/update')?>";
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

		function delet(id)
		{
			if(confirm('Are you sure delete this data?'))
			{
				// ajax delete data to database
				$.ajax({
					url : "<?php echo site_url('anggota/delet')?>/"+id,
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