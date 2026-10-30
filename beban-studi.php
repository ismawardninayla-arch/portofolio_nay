    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sksLulus = (int) $_POST["sks_lulus"];
        $sksDiambil = (int) $_POST["sks_diambil"];
        $targetSks = (int) $_POST["target_sks"];

        $totalDitempuh = $sksLulus+$sksDiambil;
        $sisaSKs = $targetSks-$totalDitempuh;

        if($targetSks > 0){
            $persentase = ($sksLulus/$targetSks)*100;
        }else{
            $persentase = 0;
        }

        if($sisaSKs<=0){
            $sisaSKs=0;
        }
        if($persentase>=100){
            $persentase=100;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Perhitungan Beban Studi</title>  
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
          <img src="img/mahasiswa-portal.png" alt="portal-mahasiswa">
          <div>
        <h1>Perhitungan Beban Studi</h1>
        </div>
        </header>
        <main>
            <div class="dua-kolom">
        <form method="post">
            <p>
                <label>SKS yang lulus :</label><br>
                <input type="number" name ="sks_lulus" min="0" required>
            </p>   
            <p>
                <label>SKS yang sedang diambil :</label><br>
                <input type="number" name= "sks_diambil" min="0" required>
            </p>
            <p>
                <label>Target SKS Kelulusan :</label><br>
                <input type="number" name="target_sks" min="0" required>
            </p>
            <button typ="submit">Hitung Beban SKS</button>
        </form>
        </div>
    <?php if($_SERVER["REQUEST_METHOD"]==="POST"): ?>
        <div class="hasil">
            <h2>Hasil Perhitungan :</h2>
        <p>Total SKS ditempuh:
            <strong><?= $totalDitempuh ?>SKS</strong>
        </p>
        <p>Sisa SKS :
            <strong><?= $sisaSKs ?>SKS</strong>
        </p>
        <p>Persentase Kemajuan Studi :
            <strong><?= number_format($persentase, 2) ?>%</strong>
        </p>
        </div>
    <?php endif; ?>

    </main>
        <p><a href="index.html">kembali ke halaman utama</a></p>
        <footer>
        <p> Pemrograman Kelas A @2026</p>
    </footer>
    </body>
    </html>