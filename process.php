<?php

// Mulai session
session_start();

// Cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Ambil data dari formulir
    $name = $_POST['name'];
    $age = (int) $_POST['age']; // konversi usia menjadi integer
    $gender = $_POST['gender'];
    $major = $_POST['major'];
    $skills = implode(", ", $_POST['skills']); // gabungkan skill menjadi string

    // Konfigurasi database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    $conn = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk menyimpan data mahasiswa
    $sql = "INSERT INTO students (name, age, gender, major, skills) VALUES ('$name', $age, '$gender', '$major', '$skills')";

    // Jalankan query
    if (mysqli_query($conn, $sql)) {
        // Simpan pesan sukses ke session
        $_SESSION['message'] = "Data mahasiswa berhasil disimpan!";
    } else {
        // Simpan pesan error ke session
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);

    // Redirect ke halaman index.php
    header("Location: index.php");
    exit;
} else {
    // Halaman ini tidak dapat diakses langsung
    header("Location: index.php");
    exit;
}

?>