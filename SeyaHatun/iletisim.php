<?php

include('baglan.php');

session_start();

if(isset($_SESSION['Kullanici_EPosta'])) {


?>

<!doctype html>
<html lang"tr">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="Sehayat Yolculuk Firması">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>SeyaHAT'UN - İletişim</title>
        
        <link rel="stylesheet" type="text/css" href="css/iletisim.css">
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
        <section id="iletisim" class="iletisim-kismi">
            <div class="iletisim">
               <div class="konteynir">
                    <div class="col3">
                        <div class="iletisim-konteynir">
                            <img src="resimler/gmail.png" class="fotoğraf-over">
                            <div class="iletisim-overlay">
                                <div class="iletisim-link">
                                    <a href="mailto:havva2293@gmail.com">G-Mail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col3">
                        <div class="iletisim-konteynir">
                            <img src="resimler/instagram.png" class="fotoğraf-over">
                            <div class="iletisim-overlay">
                                <div class="iletisim-link">
                                    <a href="https://www.instagram.com/havvahatundincr/">Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col3">
                        <div class="iletisim-konteynir">
                            <img src="resimler/whatsapp.png" class="fotoğraf-over">
                            <div class="iletisim-overlay">
                                <div class="iletisim-link">
                                    <a href="https://wa.me/905535857419">WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <p>&copy; 2024 Seyahat ve Bilet Sitesi</p>
        </footer>
    </body>
</html>

<?php
                                          
}

?>