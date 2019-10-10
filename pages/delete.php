<?php
if (isset($_GET['id'])) {
   $id = abs($_GET['id']);
   if ($id > 0) {
      require("../config/koneksi.php");
      require("siswa.php");
      require("pesan.php");
      $koneksi = koneksi("localhost", "root", "1", "kominfo_crud");

      deleteSiswa($id, $koneksi);
      header("location: index.php");
   }
}
