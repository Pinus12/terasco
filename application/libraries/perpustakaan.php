<?php

class Perpustakaan {
    function itung($totalD,$totalT,$totalR,$totalTD){
       $keseluruhan = $totalD+$totalT+$totalR+$totalTD;
       $totalB75 = ($keseluruhan)-75;
       $total20 = ((0.2 *$totalR));
       echo "Total Keseluruhan Buku : " . $keseluruhan;
       echo "<br/>";
       echo "Total Keseluruhan Buku yang dikembalikan sebanyak 75 buku : " . $totalB75;
       echo "<br/>";
       echo "Total Keseluruhan Buku Jika 20% Rusak : " . $total20;
       echo "<br/>";
    }
}