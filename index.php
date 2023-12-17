<?php
$content = file_get_contents('FormUAS.html');
echo $content;

// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
$conn = mysqli_connect('localhost', 'root', '', 'student');

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data mahasiswa dari database
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

// Tampilkan header tabel dari HTML yang ada
echo '<table id="studentTable" border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>Nama</th>';
echo '<th>Usia</th>';
echo '<th>Jenis Kelamin</th>';
echo '<th>Jurusan</th>';
echo '<th>Kemampuan</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Jika ada data mahasiswa
if (mysqli_num_rows($result) > 0) {
    // Output data setiap baris
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['age']) . '</td>';
        echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
        echo '<td>' . htmlspecialchars($row['major']) . '</td>';
        echo '<td>' . htmlspecialchars($row['skills']) . '</td>';
        echo '</tr>';
    }
} else {
    // Output jika tidak ada data mahasiswa
    echo '<tr><td colspan="5">Tidak ada data mahasiswa.</td></tr>';
}

// Tutup tbody dan tabel
echo '</tbody>';
echo '</table>';

// Tutup koneksi database
mysqli_close($conn);
?>