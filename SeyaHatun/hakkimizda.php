<?php

include('baglan.php');

session_start();

if(isset($_SESSION['Kullanici_EPosta'])) {


?>

<!doctype html>
<html lang"tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>SeyaHAT'UN - Hakkımızda</title>
        
        <link rel="stylesheet" type="text/css" href="css/hakkimizda.css">
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
        
        <div class="hakkimizda-foto">
            <div  class="fotoğraf-over">
            </div>
        </div>
        
        <footer>
            <p>&copy; 2024 Seyahat ve Bilet Sitesi</p>
        </footer>
    </body>
</html>

<?php
                                          
}

?>