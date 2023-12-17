<?php

// Mulai session
session_start();

// Cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Simpan informasi pengguna ke dalam session
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['major'] = $_POST['major'];
    $_SESSION['skills'] = $_POST['skills'];
}

// Tampilkan data dari session
echo $_SESSION['name']; // Edinta Bahagia
echo $_SESSION['age']; // 21
echo $_SESSION['gender']; // male
echo $_SESSION['major']; // Teknik Informatika
echo $_SESSION['skills']; // HTML, CSS, JavaScript
?>