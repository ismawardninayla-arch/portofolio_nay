<?php
// ===== SOAL 8: Blok PHP pengolahan =====

// Variabel
$hargaPorsi = 15000;
$kesalahan = [];
$hasil = null;

// Fungsi
function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ",", ".");
}

function hitungDiskon($total)
{
    if ($total >= 60000) {
        return $total * 10 / 100;
    }
    return 0;
}

// Proses hanya jalan kalau form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $jumlah = filter_var($_POST["jumlah"] ?? "", FILTER_VALIDATE_INT);

    // Validasi
    if ($nama == "") {
        $kesalahan[] = "Nama pemesan tidak boleh kosong.";
    }
    if ($jumlah === false || $jumlah < 1) {
        $kesalahan[] = "Jumlah porsi harus bilangan bulat minimal 1.";
    }

    // Hitung total dan diskon
    if (count($kesalahan) == 0) {
        $total = $jumlah * $hargaPorsi;
        $diskon = hitungDiskon($total);
        $bayar = $total - $diskon;

        $hasil = [
            "nama" => $nama,
            "jumlah" => $jumlah,
            "total" => $total,
            "diskon" => $diskon,
            "bayar" => $bayar,
        ];
    }
}
?>
<!DOCTYPE html>
<!-- ===== SOAL 1: Kerangka HTML5 ===== -->
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Bu Sari</title>
    <link rel="stylesheet" href="c.css">
</head>
<body>

    <!-- ===== SOAL 2: Header ===== -->
    <header>
        <h1>Warung Bu Sari</h1>
        <p>Pesan makanan dengan mudah</p>
    </header>

    <main>
        <!-- SOAL 6: pembungkus dua kolom -->
        <div class="dua-kolom">

            <!-- ===== SOAL 4: Form pemesanan ===== -->
            <form method="post" action="" class="form-pesan">
                <label for="nama">Nama pemesan</label>
                <input type="text" id="nama" name="nama" required>

                <label for="jumlah">Jumlah porsi</label>
                <input type="number" id="jumlah" name="jumlah" min="1" step="1" required>

                <button type="submit">Hitung Pesanan</button>
            </form>

            <!-- ===== SOAL 5: Kotak daftar harga ===== -->
            <div class="daftar-harga">
                <h3>Daftar Harga</h3>
                <p>Nasi Ayam: Rp 15.000 / porsi</p>
                <p>Diskon 10% jika total minimal Rp 60.000</p>
            </div>

        </div>

        <!-- ===== SOAL 9: Hasil dan pesan kesalahan ===== -->
        <?php if (count($kesalahan) > 0): ?>
            <div class="pesan-error">
                <h3>Pesanan belum bisa dihitung</h3>
                <ul>
                    <?php foreach ($kesalahan as $pesan): ?>
                        <li><?= $pesan ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($hasil !== null): ?>
            <div class="hasil">
                <h3>Rincian Pesanan</h3>
                <p>Nama: <strong><?= htmlspecialchars($hasil["nama"]) ?></strong></p>
                <p>Jumlah: <?= $hasil["jumlah"] ?> porsi</p>
                <p>Total: <?= rupiah($hasil["total"]) ?></p>
                <p>Diskon: <?= rupiah($hasil["diskon"]) ?></p>
                <p>Bayar: <strong><?= rupiah($hasil["bayar"]) ?></strong></p>
            </div>
        <?php endif; ?>
    </main>

    <!-- ===== SOAL 3: Footer ===== -->
    <footer>
        <p>Pemrograman Web Kelas A &copy;2026</p>
    </footer>

</body>
</html>