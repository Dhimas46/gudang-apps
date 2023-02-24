<?php
$id = $_GET['id'];
$koneksi->query("DELETE FROM barang WHERE id_barang=$id");
echo "<script> alert('Barang berhasil dihapus!')</script>";
echo "<script>location='index.php?halaman=barang'</script>";
 ?>
