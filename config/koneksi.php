<?php

function koneksi($host, $user, $password, $db)
{
   $koneksi = new mysqli($host, $user, $password, $db);
   if ($koneksi->connect_errno) {
      echo "Koneksi gagal.... : ($koneksi->connect_errno) $koneksi->connect_error";
   }
   return $koneksi;
}
