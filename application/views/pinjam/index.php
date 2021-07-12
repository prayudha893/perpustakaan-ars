<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Daftar Pinjaman Buku
                <a href="<?=site_url('pinjam/add');?>" class="btn btn-primary float-end">Tambah Data</a>
            </div>
            <div class="card-body text-primary">
                <table class="table table-striped table-hover" id="tablePinjam">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jumlah Buku</th>
                            <th>Total Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pinjam->result() as $key => $value) 
                        {
                            $selesai = "<span class='btn btn-success btn-sm'>Selesai</span>";
                            $belum = "<span class='btn btn-warning btn-sm'>Dipinjam</span>";
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->tanggal; ?></td>
                                <td><?= $value->nama_anggota; ?></td>
                                <td><?= $value->tgl_pinjam; ?></td>
                                <td><?= $value->tgl_kembali; ?></td>
                                <td><?= $value->item_buku; ?></td>
                                <td><?= $value->totaldenda; ?></td>
                                <td><?= ($value->status_pinjam == 1) ? $selesai : $belum; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jumlah Buku</th>
                            <th>Total Denda</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

