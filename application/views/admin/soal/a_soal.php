<div class="panel-body" id="akhir">
	<button class="btn btn-success" id="btnSave" onclick="save()"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
	<button class="btn btn-danger" onclick="cancel()"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
	<br/><br/>
	<div class="table-responsive">
		<form action="#" id="form" class="form-horizontal">
			<input type="hidden" name="id_ujian" value="<?php echo $id_ujian; ?>"/>
			<input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>"/>
			<input type="hidden" name="id_mapel"/>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Soal</th>
						<th>Pilihan A</th>
						<th>Pilihan B</th>
						<th>Pilihan C</th>
						<th>Pilihan D</th>
						<th>Jawaban</th>
					</tr>
				</thead>
				<tbody>
					<?php
						for($i = 1; $i <= 50; $i++) {
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td>
							<textarea style="min-width:400px; max-width:400px; min-height:100px; max-height:100px;" name="soal<?php echo $i; ?>" placeholder="Soal" class="form-control"></textarea>
						</td>
						<td>
							<input type="text" placeholder="Pilihan A" class="form-control" name="plh1<?php echo $i; ?>">
						</td>
						<td>
							<input type="text" placeholder="Pilihan B" class="form-control" name="plh2<?php echo $i; ?>">
						</td>
						<td>
							<input type="text" placeholder="Pilihan C" class="form-control" name="plh3<?php echo $i; ?>">
						</td>
						<td>
							<input type="text" placeholder="Pilihan D" class="form-control" name="plh4<?php echo $i; ?>">
						</td>
						<td>
							<input type="text" placeholder="Jawaban" class="form-control" name="jwb<?php echo $i; ?>">
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</form>
	</div>
	<button class="btn btn-success" id="btnSave" onclick="save()"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
	<button class="btn btn-danger" onclick="cancel()"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
</div>