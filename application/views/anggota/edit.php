<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Edit Data Anggota
                <a href="<?= site_url('anggota'); ?>" class="btn btn-warning float-end">Kembali</a>
            </div>
            <div class="card-body text-primary">
                <form method="post" action="<?=site_url('anggota/update');?>">
                    <input type="hidden" name="id_anggota" value="<?=$show->id_anggota;?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Anggota</label>
                        <input type="text" name="nama_anggota" value="<?=$show->nama_anggota;?>" class="form-control" id="exampleFormControlInput1" placeholder="isi dengan nama anggota">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select name="gender" id="exampleFormControlInput1" class="form-control">
                            <option value="Laki-Laki" <?= ($show->gender) == 'Laki-Laki' ? "selected = 'selected'" : "" ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($show->gender) == 'Perempuan' ? "selected = 'selected'" : "" ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telepon</label>
                        <input type="number" name="no_telp" value="<?=$show->no_telp;?>"class="form-control" id="exampleFormControlInput1" placeholder="isi dengan nomor telepon">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?=$show->alamat;?>" id="exampleFormControlInput1" placeholder="isi dengan alamat">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?=$show->email;?>" id="exampleFormControlInput1" placeholder="isi dengan email">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="<?=$show->password;?>" id="exampleFormControlInput1">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>