<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent()
{
    // variabel global
    global $conn;

    // Silakan buat variabel di bawah dengan data yang diambil dari form
    $nama = $_POST["stuname"];
    $nim = $_POST["stuid"];
    $jurusan = $_POST["stuclass"];
    $angkatan = $_POST["stuangkatan"];

    // Periksa apakah NIM sudah ada
    $ret = mysqli_query($conn, "SELECT * FROM tb_student where nim='$nim'");

    if (mysqli_num_rows($ret) == 0) {
        // Masukkan data ke tabel tb_student
        $query = "INSERT INTO tb_student (nama, nim, jurusan, angkatan) VALUES ('$nama', '$nim', '$jurusan', '$angkatan')";
        $result = mysqli_query($conn, $query);

        /**
         * Buatlah logika untuk Memeriksa hasil dari operasi penambahan data mahasiswa.
         *
         * Jika operasi berhasil, menampilkan pesan bahwa mahasiswa telah ditambahkan
         * dan mengarahkan pengguna ke halaman 'add-students.php'.
         * Jika operasi gagal, menampilkan pesan kesalahan.
         * Jika NIM sudah ada, menampilkan pesan bahwa NIM sudah ada.
         */

    if ($result) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = add-students.php;
        </script>
        ";
    } 
    else{
        echo "
        <script>
        alert('Data tidak berhasil ditambahkan, coba lagi')
        document.location.href = add-students.php;
        </script>
        ";
    }

}
    else{
        echo "
        <script>
        alert('NIM sudah ada')
        document.location.href = add-students.php;
        </script>
        ";
    }

function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel

    

    // Isi query dibawah untuk update data mahasiswa berdasarkan ID
    $query = "";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}
}
?>