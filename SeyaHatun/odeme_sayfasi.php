<?php

include('baglan.php');

session_start();

if(isset($_SESSION['Kullanici_EPosta'])) {

?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeyaHAT'UN - Ödeme</title>
    <link rel="stylesheet" type="text/css" href="css/odeme_sayfasi.css">
</head>
<body>
<header>
    <img class="logoimg" src="resimler/hatunlogo.png">
    <nav>
        <ul>
            <h1><?php echo $_SESSION['Kullanici_EPosta']; ?><button class="cikisbutton"><a href="cikisislem.php">Çıkış Yap</a></button></h1>
            <li><a href="tarihsec.php">Tarih Seç</a></li>
            <li><a href="hakkimizda.php">Hakkımızda</a></li>
            <li><a href="iletisim.php">İletişim</a></li>
        </ul>
    </nav>
</header>

<h2>Ödeme Bilgileri</h2>
<div class="odeme-formu">
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $koltuk_no = $_POST['koltuk_no'];
            $bilet_id = $_POST['bilet_id'];
            $kalkis = $_POST['kalkis'];
            $varis = $_POST['varis'];
            $tarih = $_POST['tarih'];
            $saat = $_POST['saat'];
            $fiyat = $_POST['fiyat'];
            $cinsiyet = $_POST['cinsiyet'];

            echo "<p>Koltuk Numarası: " . htmlspecialchars($koltuk_no) . "</p>";
            echo "<p>Bilet ID: " . htmlspecialchars($bilet_id) . "</p>";
            echo "<p>Kalkış Şehri: " . htmlspecialchars($kalkis) . "</p>";
            echo "<p>Varış Şehri: " . htmlspecialchars($varis) . "</p>";
            echo "<p>Tarih: " . htmlspecialchars($tarih) . "</p>";
            echo "<p>Saat: " . htmlspecialchars($saat) . "</p>";
            echo "<p>Fiyat: " . htmlspecialchars($fiyat) ." TL</p>";
            echo "<p>Cinsiyet: " . htmlspecialchars($cinsiyet) . "</p>";
        } else {
            echo "Geçersiz istek.";
            exit();
        }
    ?>

    <form action="odeme_islem.php" method="post">
        <input type="hidden" name="koltuk_no" value="<?php echo $koltuk_no; ?>">
        <input type="hidden" name="bilet_id" value="<?php echo $bilet_id; ?>">
        <input type="hidden" name="kalkis" value="<?php echo $kalkis; ?>">
        <input type="hidden" name="varis" value="<?php echo $varis; ?>">
        <input type="hidden" name="tarih" value="<?php echo $tarih; ?>">
        <input type="hidden" name="saat" value="<?php echo $saat; ?>">
        <input type="hidden" name="fiyat" value="<?php echo $fiyat; ?>">
        <input type="hidden" name="cinsiyet" value="<?php echo $cinsiyet; ?>">
        <div class="form-group">
            <label for="kredi-karti">Kredi Kartı Numarası:</label>
            <input type="text" id="kredi-karti" name="kredi_karti" required>
        </div>
        <div class="form-group">
            <label for="son-kullanma-tarihi">Son Kullanma Tarihi:</label>
            <input type="text" id="son-kullanma-tarihi" name="son_kullanma_tarihi" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>
        </div>
        <button type="submit">Ödemeyi Tamamla</button>
    </form>
</div>

<footer>
    <p>&copy; 2024 Seyahat ve Bilet Sitesi</p>
</footer>
</body>
</html>

<?php

}
?>
