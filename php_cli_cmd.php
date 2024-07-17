<?php

// Daftar skrip yang akan dijalankan
$scripts = [
    'C:\xampp\htdocs\test\test1.php',
    'C:\xampp\htdocs\test\test2.php'
];

// Loop melalui setiap skrip dan menjalankannya secara bersamaan
foreach ($scripts as $script) {
    // Periksa apakah file skrip ada
    if (file_exists($script)) {
        // Jalankan skrip PHP menggunakan perintah system
        system("php $script");
    } else {
        echo "File skrip '$script' tidak ditemukan.\n";
    }
}

?>
