<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>CRUD</title>
</head>

<body>
   <form action="" method="post">
      <fieldset>
         <legend>Form Input Data Siswa</legend>
         <input type="text" name="nis" placeholder="NIS"><br><br>
         <input type="text" name="nama" placeholder="Nama"><br><br>
         <input type="text" name="no_hp" placeholder="No HP"><br><br>
         <input type="text" name="email" placeholder="Email"><br><br>
         <button type="submit">Simpan</button>
      </fieldset>
   </form>
   <fieldset>
      <legend>Hasil</legend>
      <?php
      require("../config/koneksi.php");
      require("siswa.php");
      require("pesan.php");
      $koneksi = koneksi("localhost", "root", "1", "kominfo_crud");
      if (isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['no_hp']) && isset($_POST['email'])) {
         $input = [
            $_POST['nis'],
            $_POST['nama'],
            $_POST['no_hp'],
            $_POST['email']
         ];
         if (simpanSiswa($input, $koneksi)) {
            pesan_sukses("Data berhasil di simpan");
         } else {
            pesan_gagal("Data gagal di simpan");
         }
      }
      ?>
   </fieldset>
   <fieldset>
      <legend>Data Siswa</legend>
      <?php $koneksi = koneksi("localhost", "root", "1", "kominfo_crud"); ?>
      table
   </fieldset>
   <table border="1" cellpadding="5" cellspacing="0">
      <thead>
         <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <?php
      $data = dataSiswa($koneksi);

      $no = 1;
      while ($hasil = mysqli_fetch_array($data)) {
         ?>
         <tr>
            <td><?= $no++ ?></td>
            <td><?= $hasil['nis'] ?></td>
            <td><?= $hasil['nama'] ?></td>
            <td><?= $hasil['no_hp'] ?></td>
            <td><?= $hasil['email'] ?></td>
            <td>
               <a href="edit.php?id=<?= $hasil['id'] ?>">Edit</a>
               <a href="delete.php?id=<?= $hasil['id'] ?>">Hapus</a>
            </td>
         </tr>
      <?php } ?>
   </table>
</body>

</html>