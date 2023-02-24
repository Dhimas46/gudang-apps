
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Halaman Barang</h1>
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
      <a href="index.php?halaman=tambahbarang" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspTambah Barang</a>
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
                  <th>Stok</th>
                  <th>Ukuran</th>
                  <th>Satuan</th>
                  <th>Harga Barang</th>
                  <th style="width: 200px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = $koneksi->query("SELECT * FROM barang LEFT JOIN satuan_barang ON barang.id_satuan_barang = satuan_barang.id_satuan")

                 ?>
                 <?php while ($data = $sql->fetch_assoc()) {
                    ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_barang'] ?></td>
                  <td><?= $data['stok_barang'] ?></td>
                  <td><?= $data['ukuran_barang'] ?></td>
                  <td><?= $data['satuan_barang'] ?></td>
                  <td><?= $data['harga_barang'] ?></td>
                  <td>
                    <a href="index.php?halaman=editbarang&id=<?= $data['id_barang']; ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?halaman=hapusbarang&id=<?=$data['id_barang']; ?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
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

  </div>

</section>
