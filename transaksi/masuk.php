<?php
$tanggal = date("Y-m-d");
 ?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Transaksi Masuk</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Blank Page</li>
    </ol>
  </div>
</div>
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabel Barang</h3>

      <div class="card-tools">
      <a href="index.php?halaman=tambahtransaksimasuk" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspTambah Transaksi Masuk</a>
      </div>
    </div>
    <div class="card-body">
      <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Barang</th>
                  <th>Stok Masuk</th>
                  <th>Tanggal</th>
                
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = $koneksi->query("SELECT * FROM data_transaksi LEFT JOIN barang ON data_transaksi.id_nama_barang = barang.id_barang WHERE status_transaksi = 'masuk'");
                while ($data = $sql->fetch_assoc()) {
                 ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_barang'] ?></td>
                  <td><?= $data['qty_barang_transaksi'] ?></td>
                  <td><?= $data['tanggal_transaksi'] ?></td>

                </tr>

              </tbody>
            <?php } ?>
            </table>
          </div>
          <!-- /.card-body -->
          <!-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div> -->
    </div>
    </div>
    <div class="card-footer">
      Footer
    </div>
  </div>

</section>
