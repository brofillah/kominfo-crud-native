<?php

function dataSiswa($koneksi)
{
   return mysqli_query($koneksi, "SELECT * FROM orang ORDER BY id DESC");
}

function simpanEditSiswa($input, $koneksi)
{
   if (mysqli_query($koneksi, "UPDATE orang SET nis='$input[1]', nama='$input[2]', no_hp='$input[3]', email='$input[4]' WHERE id=$input[0]")) {
      return true;
   } else {
      print_r($input);
      echo mysqli_error($koneksi);
      return false;
   }
}

function simpanSiswa($input, $koneksi)
{
   return mysqli_query($koneksi, "INSERT INTO orang VALUES(null, '$input[0]', '$input[1]', '$input[2]', '$input[3]')");
}

function deleteSiswa($id, $koneksi)
{
   if ($query = mysqli_query($koneksi, "DELETE FROM orang WHERE id=$id")) {
      return true;
   } else {
      return false;
   }
}

function getSiswa($id, $koneksi)
{
   if ($query = mysqli_query($koneksi, "SELECT * FROM orang where id=$id")) {
      return $query;
   } else {
      return false;
   }
}
