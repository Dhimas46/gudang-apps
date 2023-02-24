<?php

$sql = $koneksi->query("SELECT * FROM satuan_barang");
while ($data = $sql->fetch_assoc()) {
  $satuan[] = $data;
}

 ?>

<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Halaman Edit Barang</h1>
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
      <h3 class="card-title">Edit Barang</h3>

      <div class="card-tools">
      <a href="index.php?halaman=barang" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp&nbspKembali</a>
      </div>
    </div>
    <?php
    $sql = mysqli_query($koneksi, "select * from barang where id_barang = '$_GET[id]'");
    if ($data = mysqli_fetch_array($sql))
    {
     ?>
    <form method="post">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" name="nama" value="<?= $data['nama_barang'] ?>" class="form-control" placeholder="Ex : Botol">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Stock Barang</label>
              <input type="number" value="<?= $data['stok_barang'] ?>" name="stok" class="form-control" placeholder="Ex : 15">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Harga (Rp)</label>
              <input type="number" name="harga" value="<?= $data['harga_barang'] ?>" class="form-control" placeholder="Ex : 5000">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Ukuran Barang</label>
              <input type="text" name="ukuran" value="<?= $data['ukuran_barang'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Ex : 200">
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
          <?php foreach ($satuan as $value): ?>
            <option value="<?= $value['id_satuan'] ?>"><?= $value['satuan_barang'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
        </div>
        </div>
      </div>
      <div class="card-footer">
        <button name="edit" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  <?php } ?>
</div>
</section>
<?php
  if (isset($_POST['edit'])) {
    $nama_barang = $_POST['nama'];
    $harga_barang = $_POST['harga'];
    $ukuran_barang = $_POST['ukuran'];
    $id_satuan_barang = $_POST['id_satuan'];

    $sql = mysqli_query($koneksi, "update barang set nama_barang = '$nama_barang', harga_barang = '$harga_barang', ukuran_barang = '$ukuran_barang', id_satuan_barang = '$id_satuan_barang' where id_barang = '$_GET[id]' ");
     echo "<div class='alert alert-info'>Data Berhasil Diupdate!</div>";
     echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";
  }

 ?>
