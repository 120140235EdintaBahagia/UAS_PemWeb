<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "student";

// Buat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Jika koneksi gagal, tampilkan pesan kesalahan
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Query data mahasiswa
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

// Jika query berhasil, tampilkan data mahasiswa
if ($result) {
    // Buat array untuk menyimpan data mahasiswa
    $mahasiswa = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $mahasiswa[] = $row;
    }

    // Tampilkan data mahasiswa dalam tabel HTML
    foreach ($mahasiswa as $data) {
        echo "<tr>";
        echo "<td>{$data['nama']}</td>";
        echo "<td>{$data['usia']}</td>";
        echo "<td>{$data['jenis_kelamin']}</td>";
        echo "<td>{$data['jurusan']}</td>";
        echo "<td>";
        foreach ($data['keterampilan'] as $keterampilan) {
            echo "<span>{$keterampilan}</span>";
        }
        echo "</td>";
        echo "</tr>";
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>