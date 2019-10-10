<?php
$variable_kusus = "";
$variableKusus = "";
function tambah($a, $b)
{
   return $a + $b;
}

function pesan($msg)
{
   echo "<p><b>";
   echo $msg;
   echo "</b></p>";
}

// php = syncronous
// weak/loosely typing
// tingkat tinggi
// tidak perlu mendeklarasikan tipe data

$hasil = tambah(3, 5);
pesan("Hasil penjumlahan = " . $hasil);
