<?php

require 'baglan.php';

?>

<!doctype html>
<html lang"tr">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="Sehayat Yolculuk Firması">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>SeyaHAT'UN - Giriş Yap</title>
         
        <link rel="stylesheet" type="text/css" href="css/giris.css">
    </head>
    
    <header>
        <img class="logoimg" src="resimler/hatunlogo.png">
    </header>
    
    <body>
        <div class="login">
            <div class="login-screen">
                <div class="app-title">
                    <h1>Giriş Yap</h1>
                </div>
            <form action="islem.php" method="post">
                <div class="login-form">
                    <div class="control-group">
                        <input type="text" name="eposta" class="login-field" placeholder="E-Posta" id="login-eposta">
                        <label class="login-field-icon" for="login-eposta"></label>
                    </div>
                    <div class="control-group">
                        <input type="password" name="sifre" class="login-field" placeholder="Şifre" id="login-sifre">
                        <label class="login-field-icon" for="login-sifre"></label>
                    </div>
                    <button href="index.php" name="giris" class="btn">Giriş Yap</button>
                </div>    
            </form>
            <a href="kayit.php"><button name="kayit" class="btn">Kayıt Ol</button></a>
            </div>
        </div>
    </body>
</html>