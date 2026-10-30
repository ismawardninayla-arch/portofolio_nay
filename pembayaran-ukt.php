<?php
$lunas = false;
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $nama = trim ($_POST["nama"]??"");
    $nim = trim ($_POST["nim"]??"");
    $nominalUKT = (int) $_POST["nominal_ukt"];
    $persentase = (int) $_POST["persentase"];
    $biayaTambahan = (int) $_POST["biaya_tambahan"];
    $jumlahPembayaran = (int) $_POST["jumlah_pembayaran"];

    $potongan = $nominalUKT*($persentase/100);
    $totalTagihan = $nominalUKT-$potongan+$biayaTambahan;
    $selisih = $jumlahPembayaran-$totalTagihan;

    if ($jumlahPembayaran>=$totalTagihan) {
        $status = "Lunas";
      $lunas = true;
    }else {
        $status = "Tidak Lunas";
        $lunas = false;

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran UKT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img class= "gambar-header" src="img/mahasiswa-portal.png" alt="portal-mahasiwa">
        <div>
    <h1>Simulasi Pembayaran UKT</h1>
    <p>Silahkan Isi Data dengan Benar</p>
        </div>
    </header>
    <main>
        <div class="dua-kolom">
        <form method="post">
            <p>
                <label>Nama: </label><br>
                <input type="text" name="nama" required>    
            </p>
            <p>
                <label >NIM: </label><br>
                <input type="text" name="nim" required>
            </p>
            <p>
                <label>Nominal UKT: </label><br>
                <input type="number" name="nominal_ukt" min="0" required>
            </p> 
            <p>
                <label >Persentase Potongan: </label><br>
                <input type="number" name="persentase" min="0" max="100" required>
            </p>
            <p>
                <label>Biaya Tambahan</label><br>
                <input type="number" name="biaya_tambahan"  required>
            </p>
            <p>
                <label >Jumlah Pembayaran</label><br>
                <input type="number" name="jumlah_pembayaran" required>
            </p>
            <button type="submit">Hitung</button>           
        </form>
        <div class="keterangan">
            <h2>Rumus</h2>
            <p>potongan = nominal UKT*(persentase/100)</p>
            <p>total Tagihan = nominal UKT-potongan+biaya Tambahan</p>
            <p>selisih = jumlah Pembayaran-total Tagihan</p>
        </div>
        </div>
        <?php if($_SERVER["REQUEST_METHOD"] === "POST"):?>
            <div class="hasil">
            <h2>Simulasi Perhitungan</h2>
            <p>Nama = <strong><?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8")?></strong></p>
            <p>NIM = <strong><?= htmlspecialchars($nim, ENT_QUOTES, "UTF-8")?></strong></p>
            <p>Potongan = Rp <?= $nominalUKT?> * <?=$persentase?>%
                = <strong> Rp <?= $potongan?></strong></p>
            <p> Total Tagihan = Potongan = Rp <?= $nominalUKT?> - Rp <?=$potongan?> + Rp <?= $selisih?>
                = <strong> Rp <?= $totalTagihan?></strong></p>
            <p>selisih = Rp <?= $nominalUKT?> -  Rp <?=$totalTagihan?>
                = Rp <strong><?= $selisih?></strong></p>
        <?php if($lunas):?>
            <p>Karena Jumlah Pembayaran lebih besar dari total tagihan, maka status pembayaran adalah <strong><?= $status?></strong>
            dengan kembalian <strong> Rp <?= $selisih?></strong>
        </p>
        <?php else:?>
            <p>Karena Jumlah Pembayaran lebih besar dari total tagihan, maka status pembayaran adalah <strong><?= $status?></strong>
            dengan kembalian <strong> Rp <?= $selisih?></strong>
        </p>
        <?php endif; ?>
        </div>
        <?php endif;?>
    </main>
    <p><a href="index.html">kembali ke halaman utama</a></
    <footer>
        <p> Pemrograman Kelas A @2026</p>
    </footer>
</body>
</html>