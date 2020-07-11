<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Siswa Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="12345678" name="password"/>
                    <div class="form-body">
						<h4>Siswa</h4>
						<br/>
                        <div class="form-group">
                            <label class="control-label col-md-3">NISN</label>
                            <div class="col-md-9">
                                <input type="number" id="nisn" placeholder="NISN" class="form-control" name="nisn">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_siswa">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
									<select name="jenis_kelamin" class="form-control">
										<option value="">--Pilih--</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-9">
									<select name="agama_siswa" class="form-control">
										<option value="">--Pilih--</option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katholik">Katholik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
										<option value="lain-lain">Lain-lain</option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat_siswa" placeholder="Alamat" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group" id="div_kelas">
                            <label class="control-label col-md-3">Terima Dikelas</label>
                            <div class="col-md-9">
                                <select name="kelas" class="form-control" id="kelas">
								</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<hr/>
						<h4>Orang Tua</h4>
						<br/>
						<div class="form-group">
                            <label class="control-label col-md-3">Nama Ayah</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_ayah">
                                <span class="help-block"></span>
                            </div>
                        </div>						
						<div class="form-group">
                            <label class="control-label col-md-3">Nama Ibu</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_ibu">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat_ortu" placeholder="Alamat Orang Tua" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>						
						<div class="form-group">
                            <label class="control-label col-md-3">Pekerjaan Ayah</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">Pekerjaan Ibu</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">No. Telpon Ayah</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" placeholder="+62xxx" name="tlp_ayah">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">No. Telpon Ibu</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" placeholder="+62xxx" name="tlp_ibu">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<hr/>
						<h4>Wali</h4>
						<br/>
						<div class="form-group">
                            <label class="control-label col-md-3">Nama Wali</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_wali">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">Alamat Wali</label>
                            <div class="col-md-9">
                                <textarea name="alamat_wali" placeholder="Alamat Wali" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">Pekerjaan Wali</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Pekerjaan Wali" name="pekerjaan_wali">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">No. Telpon Wali</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" placeholder="+62xxx" name="tlp_wali">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary col-md-2">Save</button>
                <button type="button" class="btn btn-danger col-md-2" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>