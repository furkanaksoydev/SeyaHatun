<?php

include('baglan.php');

session_start();

if(isset($_SESSION['Kullanici_EPosta'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $koltuk_no = $_POST['koltuk_no'];
        $bilet_id = $_POST['bilet_id'];
        $kalkis = $_POST['kalkis'];
        $varis = $_POST['varis'];
        $tarih = $_POST['tarih'];
        $saat = $_POST['saat'];
        $fiyat = $_POST['fiyat'];
        $cinsiyet = $_POST['cinsiyet'];
        $kredi_karti = $_POST['kredi_karti'];
        $son_kullanma_tarihi = $_POST['son_kullanma_tarihi'];
        $cvv = $_POST['cvv'];

        $odeme_basarili = true;

        if ($odeme_basarili) {
            // Kullanıcı ID'sini al
            $email = $_SESSION['Kullanici_EPosta'];
            $stmt = $db->prepare("SELECT Kullanici_ID FROM kullanicilar WHERE Kullanici_EPosta = ?");
            $stmt->execute([$email]);
            $kullanici = $stmt->fetch();
            $kullanici_id = $kullanici['Kullanici_ID'];

            $stmt = $db->prepare("INSERT INTO odemeler (Kullanici_ID, Bilet_ID, Koltuk_ID, Cinsiyet, Odeme_Miktari, Odeme_Tarihi) VALUES (?, ?, ?, ?, ?, NOW())");
            
?>

<!doctype html>
<html lang"tr">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="Sehayat Yolculuk Firması">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>SeyaHAT'UN - Ödeme İşlemi</title>
        
        <link rel="stylesheet" type="text/css" href="css/odeme_sayfasi.css">
    </head>
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
    <body>
        
        <?php
        
            if ($stmt->execute([$kullanici_id, $bilet_id, $koltuk_no, $cinsiyet, $fiyat])) {
                echo "<p>Ödeme başarıyla tamamlandı. Biletiniz alınmıştır. Tarih Seç ekranına yönlendiriliyorsunuz.</p>";
                header('Refresh:4; tarihsec.php');
            } else {
                echo "<p>Ödeme işlemi sırasında bir hata oluştu. Lütfen önceki sayfaya dönerek tekrar deneyin.</p>";
            }
        } else {
            echo "<p>Ödeme başarısız oldu. Lütfen tekrar deneyiniz.</p>";
        }
    } else {
        echo "Geçersiz istek.";
        exit();
    }
} else {
    echo "Lütfen giriş yapınız.";
    exit();
}

        
        ?>
        
        <footer>
            <p>&copy; 2024 Seyahat ve Bilet Sitesi</p>
        </footer>
    </body>
</html>
