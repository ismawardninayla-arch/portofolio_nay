<?php
$pesan = "";
$dataLengkap = false;
$nama = "";
$nim = "";
$program_studi = "";
$semester = "";


if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $program_studi = trim($_POST["program_studi"] ?? "");
    $semester = filter_input(INPUT_POST, "semester", FILTER_VALIDATE_INT);

    if($nama === "" || $nim === "" || $program_studi === ""){
        $pesan = "Nama, NIM, dan Program Studi Wajib Diisi.";
        
    }elseif ($semester === false || $semester === null || $semester < 1){
        $pesan = "Semester harus bilangan bulat minimal 1";
        
    }else{
        $dataLengkap = true;
       
    }
}else{
    $pesan = "Silahkan kirim data dari form yang benar!";
}

?>
<!DOCTYPE html>
<html lang="id"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil Mahasiswa</title>
</head>
<body>
    <header>
        <img class= "gambar-header" src="img/mahasiswa-portal.png" alt="portal-mahasiwa">
        <div>
        <h1>Profil Mahasiswa: </h1>
        <p>Data mahasiswa yang telah dikirim</p>
        </div>
    </header>
    <main>
    <?php if($dataLengkap): ?>
        <img class= "foto-frofil" src="img/mahasiswa-portal.png" alt="portal-mahasiwa">
        <div class ="profil-card">    
        <dl>
            <dt>Nama</dt>
            <dd><?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?></dd>

            <dt>NIM</dt>
            <dd><?= htmlspecialchars($nim, ENT_QUOTES, "UTF-8") ?></dd>

            <dt>Program studi</dt>
            <dd><?= htmlspecialchars($program_studi, ENT_QUOTES, "UTF-8") ?></dd>

            <dt>Semester</dt>
            <dd><?= $semester ?></dd>
        </dl>
        </div>
    
        
    <?php else: ?>
        <p>Isi tidak sesuai</p>
    <?php endif; ?>
    </main>
    <p><a href="index.html">kembali ke halaman utama</a></p>  
    <footer>
        <p> Pemrograman Kelas C @2026</p>
    </footer>
</body>
</html>