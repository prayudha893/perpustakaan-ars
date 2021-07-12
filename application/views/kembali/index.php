<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary mb-6">
            <div class="card-header">
                Daftar Pengembalian Buku
            </div>
            <div class="card-body text-primary">
                <table class="table table-striped table-hover" id="tableKembali">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pinjam->result() as $key => $value) 
                        {
                            $selesai = "<span class='btn btn-success btn-sm'>Selesai</span>";
                            $belum = "<span class='btn btn-warning btn-sm'>Dipinjam</span>";
                            $terlambat = "<span class='btn btn-danger btn-sm'>Terlambat</span>";
                            $tanggal_now = date('Y-m-d');
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->tanggal; ?></td>
                                <td><?= $value->nama_anggota; ?></td>
                                <td><?= $value->tgl_pinjam; ?></td>
                                <td><?= $value->tgl_kembali; ?></td>
                                <td><?= $value->item_buku; ?></td>
                                <td><?= $value->totaldenda; ?></td>
                                <td><?= ($tanggal_now > $value->tgl_kembali) ? $terlambat : $belum; ?></td>
                                <td><a href="<?=site_url('kembali/edit/'.$value->id_pinjam);?>" class="btn btn-info btn-sm">Kembalikan</a></td>
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
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

