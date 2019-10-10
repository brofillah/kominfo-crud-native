<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Edit Data Siswa</title>
</head>

<body>
   <?php
   if (isset($_GET['id'])) {
      $id = abs($_GET['id']);
      if ($id > 0) {
         require("../config/koneksi.php");
         require("siswa.php");
         require("pesan.php");
         $koneksi = koneksi("localhost", "root", "1", "kominfo_crud");
         ?>
         <a href="index.php">Back To List</a>
         <fieldset>
            <legend>Hasil</legend>
            <?php
                  if (isset($_POST['id']) && isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['no_hp']) && isset($_POST['email'])) {
                     $input = [
                        $_POST['id'],
                        $_POST['nis'],
                        $_POST['nama'],
                        $_POST['no_hp'],
                        $_POST['email']
                     ];
                     if (simpanEditSiswa($input, $koneksi) == true) {
                        pesan_sukses("Data berhasil Disimpan");
                     } else {
                        pesan_gagal("data gagal disimpan");
                     }
                  }
                  ?>
         </fieldset>
         <?php
               $data = getSiswa($id, $koneksi);
               $siswa = mysqli_fetch_array($data);
               if ($data->num_rows == 1) {
                  ?>
            <form action="" method="post">
               <fieldset>
                  <legend>Form Input Data Siswa</legend>
                  <input type="hidden" name="id" value="<?= $siswa['id'] ?>"><br><br>
                  <input type="text" name="nis" placeholder="NIS" value="<?= $siswa['nis'] ?>"><br><br>
                  <input type="text" name="nama" placeholder="Nama" value="<?= $siswa['nama'] ?>"><br><br>
                  <input type="text" name="no_hp" placeholder="No HP" value="<?= $siswa['no_hp'] ?>"><br><br>
                  <input type="text" name="email" placeholder="Email" value="<?= $siswa['email'] ?>"><br><br>
                  <button type="submit">Simpan</button>
               </fieldset>
            </form>
   <?php
         }
      }
   }
   ?>
</body>

</html>