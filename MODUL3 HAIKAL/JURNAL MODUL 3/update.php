<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include('connect.php');

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];

// (3) Buatkan fungsi "update" yang menerima data sebagai parameter
function updateCar($conn, $id, $nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil, $harga_mobil) {
    // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
    // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
    $sql = "UPDATE showroom_mobil SET
            nama_mobil = '$nama_mobil',
            brand_mobil = '$brand_mobil',
            warna_mobil = '$warna_mobil',
            tipe_mobil = '$tipe_mobil',
            harga_mobil = $harga_mobil
            WHERE id = $id";

    // Eksekusi perintah SQL
    $result = mysqli_query($conn, $sql);

    // Buatkan kondisi jika eksekusi query berhasil
    if ($result) {
        echo "Data mobil berhasil diperbarui!";
        header("Location: list_mobil.php"); // Redirect to the list page after successful update
    } else {
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Panggil fungsi update dengan data yang sesuai
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mobil = $_POST["nama_mobil"];
    $brand_mobil = $_POST["brand_mobil"];
    $warna_mobil = $_POST["warna_mobil"];
    $tipe_mobil = $_POST["tipe_mobil"];
    $harga_mobil = $_POST["harga_mobil"];

    updateCar($conn, $id, $nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil, $harga_mobil);
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($conn);
?>
