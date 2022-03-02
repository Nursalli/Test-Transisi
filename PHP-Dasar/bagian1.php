<?php

/* Nilai awal */
$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";

/* Mengubah string menjadi array */
$nilaiArray = explode(" ", $nilai);

/* Proses Mencari nilai rata-rata */
$total = 0;
$jumlah_nilai = count($nilaiArray);

for($i = 0; $i < $jumlah_nilai; $i++){
    $total += $nilaiArray[$i];
}

$rataRata = round($total / $jumlah_nilai);

echo 'Nilai rata-rata: '.$rataRata.'<br>';

/*Mencari 7 nilai tertinggi*/ 
rsort($nilaiArray);
$nilaiTertinggi = array_slice($nilaiArray, 0, 7);

$nilaiTertinggi7 = '';

for($i = 0; $i < count($nilaiTertinggi); $i++){
    $nilaiTertinggi7 .= $nilaiTertinggi[$i]. ', ';
}

/* Menghilangkan karakter ',' di akhir kalimat */
$nilaiTertinggi7 = substr($nilaiTertinggi7, 0, -2);

echo '7 Nilai Tertinggi: '.$nilaiTertinggi7.'<br>';

/*Mencari 7 nilai terendah*/ 
sort($nilaiArray);
$nilaiTerendah = array_slice($nilaiArray, 0, 7);

$nilaiTerendah7 = '';

for($i = 0; $i < count($nilaiTerendah); $i++){
    $nilaiTerendah7 .= $nilaiTerendah[$i]. ', ';
}

/* Menghilangkan karakter ',' di akhir kalimat */
$nilaiTerendah7 = substr($nilaiTerendah7, 0, -2);

echo '7 Nilai Terendah: '.$nilaiTerendah7.'<br><br>';

/* Mencari huruf kecil */
function jumlahHurufKecil($kalimat){
    $nilaiHurufKecil = 0;
    $kalimatArray = str_split($kalimat);

    for($i = 0; $i < count($kalimatArray); $i++){
        if(ctype_lower($kalimatArray[$i])){
            $nilaiHurufKecil++;
        }
    }

    return $nilaiHurufKecil;
}

echo 'TranSISI mengandung '.jumlahHurufKecil('TranSISI').' buah huruf kecil <br><br>';

/* Mencari Unigram, Bigram, Tigram */
function mencariUBT($kalimat){
    /* Mengubah string menjadi array */
	$kalimatArray = explode(" ", $kalimat);

	/* unigram */
	$unigram = '';
	foreach ($kalimatArray as $kata) {
		$unigram .= $kata.', ';
	}
    /* Menghilangkan karakter ',' di akhir kalimat */
    $unigram = substr($unigram, 0, -2);

	/* bigram */
	$x = 0;
	$bigram = '';
	foreach ($kalimatArray as $kata) {
		if ($x < 1) {
			$bigram .= $kata.' ';
			$x++;
		} else {
			$bigram .= $kata.', ';
			$x = 0;
		}
	}
    /* Menghilangkan karakter ',' di akhir kalimat */
    $bigram = substr($bigram, 0, -2);

	/* trigram */
	$y = 0;
	$trigram = '';
	foreach ($kalimatArray as $kata) {
		if ($y < 2) {
			$trigram .= $kata.' ';
			$y++;
		} else {
			$trigram .= $kata.', ';
			$y = 0;
		}
	}
    /* Menghilangkan karakter ',' di akhir kalimat */
    $trigram = substr($trigram, 0, -2);

	$hasil = 'Unigram : '. $unigram . '<br>';
	$hasil .= 'Bigram : '. $bigram . '<br>';
	$hasil .= 'Trigram : '. $trigram;

	return $hasil;
}

echo mencariUBT('Jakarta adalah ibukota negara Republik Indonesia');

?>