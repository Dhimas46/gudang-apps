

<?php

$tanggal = date("Y-m-d");

  $sql = $koneksi->query("SELECT * FROM barang");
  while ($data = $sql->fetch_assoc()) {
    $databarang[] = $data;
  }

 ?>


<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Halaman Tambah Transaksi Keluar</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Blank Page</li>
    </ol>
  </div>
</div>
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Transaksi Keluar</h3>
      <div class="card-tools">
      <a href="index.php?halaman=transaksikeluar" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp&nbspKembali</a>
      </div>
    </div>
<form method="post">
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Pilih Barang</label>
          <select name="barang" class="custom-select" id="inputGroupSelect01">
            <option value="1">Pilih Barang</option>
          <?php foreach ($databarang as $value): ?>
            <option value="<?= $value['id_barang']; ?>"><?= $value['nama_barang']; ?></option>
          <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Quantity Masuk</label>
          <input type="number" name="qty" class="form-control" placeholder="Ex : 15">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" value="<?= $tanggal ?>" placeholder="Ex : 5000">
        </div>
      </div>
      <input type="hidden" name="status_transaksi" value="keluar">
    </div>

  </div>
  <div class="card-footer">
    <button name="kirim" type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>

<?php
  if (isset($_POST['kirim'])) {
    $koneksi->query("INSERT INTO data_transaksi (id_nama_barang, qty_barang_transaksi, tanggal_transaksi, status_transaksi)
    VALUES('$_POST[barang]', '$_POST[qty]', '$_POST[tanggal]', '$_POST[status_transaksi]')");

    $koneksi->query("UPDATE barang SET stok_barang = stok_barang - $_POST[qty] WHERE id_barang = $_POST[barang]");
    echo "<div class='alert alert-info'>Data Tersimpan!</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=transaksikeluar'>";
  }

 ?>


</section
