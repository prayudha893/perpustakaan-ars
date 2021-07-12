<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Tambah Peminjaman
                <a href="<?= site_url('pinjam'); ?>" class="btn btn-warning float-end">Kembali</a>
            </div>
            <div class="card-body text-primary">
                <form method="post" action="<?=site_url('pinjam/create');?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Anggota</label>
                        <select name="id_anggota" id="exampleFormControlInput1" class="form-control">
                            <?php foreach ($anggota->result() as $row) :?>
                                <option value="<?php echo $row->id_anggota;?>"><?php echo $row->nama_anggota;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pinjam</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" name="tgl_pinjam" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text">Pick</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                            <input type="text" name="tgl_kembali" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text">Pick</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Daftar Buku</label>
                        <select name="buku[]" class="form-control" data-width="100%" data-live-search="true" multiple>
                            <?php foreach ($buku->result() as $row) :?>
                                <option value="<?php echo $row->id_buku;?>"><?php echo $row->judul_buku;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>