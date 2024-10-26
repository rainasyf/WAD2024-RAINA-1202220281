<?php

if ($_POST) {
    $exercise = $_POST["exercise"];
}

if (empty($exercise)) {
    $error =  "Waktu olahraga gaboleh kosong, isi duluu"; 
}
if ($exercise <=0) {
    $hasil = "Waktu olahraga harus lebih dari 0 yaa";
}
elseif ($exercise <= 15 && $exercise > 0) {
    $hasil = "Kurang lama olahraganyaa, gaboleh boleh makan nasi!";
} 
elseif ($exercise > 15) {
    $hasil = "Keren sudah olahraga! Boleh makan nasi yaa 5 sendok makan :)";
} 
else {
    $hasil = "Gak boleh makan malam dan harus olahraga ringan di malam hari selama 5 menit yaa!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pola Makan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h3>Hasil Pola Makan Anda</h3>
            <p class="alert alert-info">
                <!-- silahkan jawab disini (menampilkan hasil logika berdasarkan kondisi olahraga) -->
                <?php
                if (!empty($hasil)) {
                    echo "<div class='alert-success'Hasil Pola Makan Anda: $hasil</div>";
                }
                if (!empty($error)) {
                    echo "<div class='alert-success'error Pola Makan Anda: $error</div>";
                }
                ?>
            </p>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>