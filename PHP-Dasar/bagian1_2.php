<?php

/* Membuat tabel Modulus 3 dan 4 berwarna putih sisanya hitam mulai dari angka 1 - 64 */
function kelipatan_delapan(){
    $table = '<table><tr>';
    for($i = 1; $i <= 64; $i++){
        if($i%8 == 1){
            $table .= '</tr><tr>';
        }
        if($i%3 == 0 || $i%4 == 0){
            $table .= '<td style="text-align:center; padding:10px;">'.$i.'</td>';
        } else {
            $table .= '<td style="background-color: black; color:white; text-align:center; padding:10px;">'.$i.'</td>';
        }
    }

    $table .= '</table>';

    return $table;
}

echo kelipatan_delapan();

?>