<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>

<body>
   <form action="" method="post">
      <fieldset>
         <legend>Program Aritmatika</legend>
         <input type="number" placeholder="Angka Satu" name="satu"><br><br>
         <input type="number" placeholder="Angka Dua" name="dua"><br>
         <button type="submit">Hitung</button>
      </fieldset>
   </form>
   <fieldset>
      <legend>Hasil</legend>
      <?php
      if (isset($_POST['satu']) && isset($_POST['dua'])) {
         require("aritmatika.php");
         $satu = $_POST['satu'];
         $dua = $_POST['dua'];
         echo "<b>Penjumlahan</b><br>";
         echo "$satu + $dua = " . tambah($satu, $dua) . "<br>";
         echo "<b>Pengurangan</b><br>";
         echo "$satu - $dua = " . kurang($satu, $dua) . "<br>";
         echo "<b>Perkalian</b><br>";
         echo "$satu x $dua = " . kali($satu, $dua) . "<br>";
         echo "<b>Pembagian</b><br>";
         echo "$satu : $dua = " . bagi($satu, $dua) . "<br>";
         echo "<b>Sisa bagi</b><br>";
         echo "$satu % $dua = " . mod($satu, $dua) . "<br>";
      }
      ?>
   </fieldset>
   <fieldset>
      <legend>Tanggal Lahir</legend>
      <form action="" method="post">
         Tanggal : <select name="tanggal">
            <?php for ($i = 1; $i <= 31; $i++) { ?>
               <option value="<?= $i ?>"><?= $i ?></option>
            <?php   } ?>
         </select><br>
         Bulan : <select name="bulan">
            <?php for ($i = 1; $i <= 12; $i++) { ?>
               <option value="<?= $i ?>"><?= $i ?></option>
            <?php   } ?>
         </select><br>
         Tahun : <select name="tahun">
            <?php for ($i = 1990; $i <= 2019; $i++) { ?>
               <option value="<?= $i ?>"><?= $i ?></option>
            <?php   } ?>
         </select><br>
         <button type="submit">Kirim</button>
      </form>
   </fieldset>
   <fieldset>
      <legend>Hasil</legend>
      <?php
      if (isset($_POST['tanggal']) && isset($_POST['bulan']) && isset($_POST['tahun'])) {
         require_once("bulan.php");
         $tanggal = $_POST['tanggal'];
         $bulan = $_POST['bulan'];
         $tahun = $_POST['tahun'];
         echo "Tanggal : $tanggal <br>";
         echo "Bulan : " . bulan($bulan) . "<br>";
         echo "Tahun : $tahun <br>";
      }
      ?>
   </fieldset>
   <fieldset>
      <legend>Upload File</legend>
      <form action="" method="post" enctype="multipart/form-data">
         <input type="file" name="foto" placeholder="Pilih Foto"><br>
         <button type="submit">Pilih</button>
      </form>
   </fieldset>
   <fieldset>
      <legend>Hasil</legend>
      <?php if (isset($_FILES['foto'])) {
         $uploadDir = './uploads/';
         $foto = $_FILES['foto'];
         $tmpName = $foto['tmp_name'];
         // basename() may prevent filesystem traversal attacks;
         // further validation/sanitation of the filename may be appropriate
         $name = basename($foto['name']);
         if (move_uploaded_file($tmpName, "$uploadDir/$name")) {
            echo "Upload berhasil";
         } else {
            echo "Upload gagal";
         }
      } else {
         echo "Silahkan pilih file";
      } ?>
   </fieldset>
   <fieldset>
      <legend>List File</legend>
      <?php
      $dir = "./uploads/";
      $files1 = array_diff(scandir($dir, 1), array('..', '.'));
      for ($i = 0; $i < count($files1); $i++) {
         echo "<a href = './uploads/" . $files1[$i] . "' target='_blank'>" . $files1[$i] . "</a><br>";
      }
      ?>
   </fieldset>
</body>

</html>