<?php

  $sql = $koneksi->query("SELECT * FROM satuan_barang");
  while ($data = $sql->fetch_assoc()) {
    $datasatuan[] = $data;
  }

 ?>


<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Halaman Tambah Barang</h1>
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
      <h3 class="card-title">Tambah Barang</h3>
      <div class="card-tools">
      <a href="index.php?halaman=barang" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp&nbspKembali</a>
      </div>
    </div>
<form method="post">
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Barang</label>
          <input type="text" name="nama" class="form-control" placeholder="Ex : Botol">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Stock Barang</label>
          <input type="number" name="stok" class="form-control" placeholder="Ex : 15">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Harga (Rp)</label>
          <input type="number" name="harga" class="form-control" placeholder="Ex : 5000">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Ukuran Barang</label>
          <input type="text" name="ukuran" class="form-control" id="exampleInputPassword1" placeholder="Ex : 200">
        </div>
      </div>
    <div class="col-md-6">
    <label for="">Satuan Barang</label>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Satuan</label>
    </div>
    <select name="id_satuan" class="custom-select" id="inputGroupSelect01">
      <option value="1">Pilih Satuan</option>
    <?php foreach ($datasatuan as $value): ?>
      <option value="<?= $value['id_satuan']; ?>"><?= $value['satuan_barang']; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
    </div>
    </div>
  </div>
  <div class="card-footer">
    <button name="kirim" type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>

<?php
  if (isset($_POST['kirim'])) {
    $koneksi->query("INSERT INTO barang (nama_barang, stok_barang, ukuran_barang, id_satuan_barang, harga_barang)
    VALUES('$_POST[nama]', '$_POST[stok]', '$_POST[ukuran]', '$_POST[id_satuan]', '$_POST[harga]')");

    echo "<div class='alert alert-info'>Data Tersimpan!</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";
  }

 ?>


</section
