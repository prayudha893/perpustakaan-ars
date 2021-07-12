<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Daftar Pengembalian Buku
            </div>
            <div class="card-body text-primary">
            <form method="post" action="<?=site_url('kembali/update');?>">
                    <input type="hidden" name="id_pinjam" value="<?=$pinjam->id_pinjam;?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Anggota</label>
                        <input type="text" name="nama_anggota" value="<?=$pinjam->nama_anggota;?>" class="form-control" id="exampleFormControlInput1" readOnly>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pinjam</label>
                        <input type="text" name="tgl_kembali" value="<?=$pinjam->tgl_pinjam;?>"class="form-control" id="exampleFormControlInput1" readOnly>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                        <input type="text" name="alamat" class="form-control" value="<?=$pinjam->tgl_kembali;?>" id="exampleFormControlInput1" readOnly>
                    </div>

                    <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Tahun Terbit</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Total Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tanggal_now = date('Y-m-d');
                        $tanggal_kembali = $pinjam->tgl_kembali;
                        $total_denda = 0;

                        if($tanggal_now>$tanggal_kembali){
                            $datetime1 = strtotime($tanggal_now);
                            $datetime2 = strtotime($tanggal_kembali);

                            $secs = $datetime1 - $datetime2;// == <seconds between the two times>
                            $days = $secs / 86400;
                        
                        } else{
                            $days = 0;
                        }
                        foreach ($buku->result() as $key => $value) 
                        {
 
                            $denda = $days * 2500;
                            $total_denda+=$denda;
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->judul_buku; ?></td>
                                <td><?= $value->pengarang; ?></td>
                                <td><?= $value->thn_terbit; ?></td>
                                <td><?= $value->penerbit; ?></td>
                                <td><?= $value->isbn; ?></td>
                                <td><?= $denda?></td>
                                
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>#</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Tahun Terbit</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Total Denda</th>
                        </tr>
                    </tfoot>
                </table>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Total Denda</label>
                        <input type="text" name="total_denda" class="form-control" value="<?=$total_denda;?>" id="exampleFormControlInput1" readOnly>
                        <input type="hidden" name="days" value="<?=$days;?>">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
</div>

