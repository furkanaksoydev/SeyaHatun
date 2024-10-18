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
        <title>SeyaHAT'UN - Bilet Tarihi Seç</title>
        <link rel="stylesheet" type="text/css" href="css/tarihsec.css">


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Seyahat ve Bilet Sitesi</title>
    </head>
<body>
<div class="background-image"></div>
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

    <main>
        <div class="search-menu">
            <section id="search">
                <h2>Bilet Arayın</h2>
                <form action="tarihislem.php" method="post">
                    <label for="departure">Kalkış Yeri:</label>
                    <select class="secenekler" name="kalkis_sehir" required>
                    
                        <?php
                        
                            
                            $kalkis_yerleri = mysqli_query($mylidb, "SELECT * FROM kalkis_konumlari");
                            while($c = mysqli_fetch_array($kalkis_yerleri)) {
                        
                        ?>
                        <option value="<?php echo $c['Sehir_Adi'] ?>"><?php echo $c['Sehir_Adi'] ?> </option>
                        <?php } ?>
                        
                    </select>
                                                           
                    <br><br>
                    
                    <label for="destination">Varış Yeri:</label>
                    <select class="secenekler" name="varis_sehir" required>
                    
                        <?php
                            
                        
                            $varis_konumlari = mysqli_query($mylidb, "SELECT * FROM varis_konumlari");
                            
                            while($c = mysqli_fetch_array($varis_konumlari)) {
                        
                        ?>
                        <option value="<?php echo $c['Sehir_Adi'] ?>"><?php echo $c['Sehir_Adi'] ?> </option>
                        <?php } ?>
                        
                    </select>
                    
                    <br><br>

                    <label for="date">Tarih:</label>
                    <input class="tarih" type="date" id="date" name="tarih" required>

                    <button href="tarihsec.php" name="biletara">Ara</button>
                </form>
            </section>
        </div>
    </main>
 
    <footer>
        <p>&copy; 2024 Seyahat ve Bilet Sitesi</p>
    </footer>
</body>
</html>
<?php
}
?>