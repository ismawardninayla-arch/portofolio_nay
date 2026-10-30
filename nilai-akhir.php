    <?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        
        $nilaiTugas = (float) $_POST["nilai_tugas"];
        $nilaiUTS = (float) $_POST["nilai_uts"];
        $nilaiUAS = (float) $_POST["nilai_uas"];

        $bobotTugas = (float) $_POST["bobot_tugas"];
        $bobotUTS = (float) $_POST["bobot_uts"];
        $bobotUAS = (float) $_POST["bobot_uas"];

        $nilaiAkhir = ($nilaiTugas*$bobotTugas+$nilaiUTS*$bobotUTS+$nilaiUAS*$bobotUAS)/100;

        if($nilaiAkhir>=85){
            $nilaiHuruf = "A";
        }elseif($nilaiAkhir>=80){
            $nilaiHuruf = "A-";
        }elseif($nilaiAkhir>=75){
            $nilaiHuruf = "B+";
        }elseif($nilaiAkhir>=70){
            $nilaiHuruf = "B";
        }elseif($nilaiAkhir>=60){
            $nilaiHuruf = "B-";
        }elseif($nilaiAkhir>=50){
            $nilaiHuruf = "C";
        }elseif($nilaiAkhir>=40){
            $nilaiHuruf = "D";
        }else{
            $nilaiHuruf = "Error!";
        }

    if($nilaiAkhir>=75){
        $status ="Lulus";
    }else{
        $status = "Belum Lulus: Ketemu tahun depan lagi :";
    }  
}
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Perhitungan Nilai Akhir</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
        <img class= "gambar-header" src="img/mahasiswa-portal.png" alt="portal-mahasiwa">
        <div>
        <h1>Perhitungan Nilai Akhir</h1>
    </div>
        </header>
        <main>
        <form method="post">
            <div class="form-dua-kolom">
                <p>
                Nilai tugas:<br>
                <input type="number" name="nilai_tugas" min="0" max="100" required>
            </p>
            <p>
                Nilai UTS:<br>
                <input type="number" name="nilai_uts" min="0" max="100" required>
            </p>
            <p>
                Nilai UAS:<br>
                <input type="number" name="nilai_uas" min="0" max="100" required>
            </p>
            <p>
                Bobot Tugas (%):<br>
                <input type="number" name="bobot_tugas" min="0" max="100" required>
            </p>
            <p>
                Bobot UTS (%):<br>
                <input type="number" name="bobot_uts" min="0" max="100" required>
            </p>
            <p>
                Bobot UAS (%):<br>
                <input type="number" name="bobot_uas" min="0" max="100" required>
            </p>
            </div>
            <button type="submit">Hitung Nilai Akhir</button>
        </form>
        <div class="keterangan">
            <h2>Rumus</h2>
            <p>Nilai Akhir = (nilai Tugas*bobot Tugas+nilai UTS*bobot UTS+nilai UAS*bobot UAS)/100</p>
            
        </div>
</div>
        <?php if($_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <div class="keterangan">
            <h2>Hasil Nilai Anda</h2>
            <p>Nilai Akhir:
                <strong><?= number_format($nilaiAkhir, 2) ?></strong>
            </p>
            <p>Nilai Huruf:
                <strong><?= $nilaiHuruf ?></strong>
            </p>
            <p>Status:
                <strong><?= $status ?></strong>
            </p>
            <?php endif; ?>
            </main>
            <p><a href="index.html">kembali ke halaman utama</a></p>
            </div>
            <footer>
        <p> Pemrograman Kelas A @2026</p>

    </footer>
    </body>
    </html>