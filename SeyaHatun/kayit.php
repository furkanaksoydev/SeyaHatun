<!doctype html>
<html lang"tr">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="Sehayat Yolculuk Firması">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>SeyaHAT'UN - Kayıt Ol</title>
        
        <link rel="stylesheet" type="text/css" href="css/giris.css">
    </head>
    
    <header>
        <img class="logoimg" src="resimler/hatunlogo.png">
    </header>
    
    <body>
        <div class="login">
            <div class="login-screen">
                <div class="app-title">
                    <h1>Kayıt Ol</h1>
                </div>
            <form action="islem.php" method="post">
                <div class="login-form">
                    <div class="control-group">
                        <input type="text" name="kullanici_adi" class="login-field" placeholder="Ad" id="login-ad">
                        <label class="login-field-icon" for="login-ad"></label>
                    </div>
                    <div class="control-group">
                        <input type="text" name="kullanici_soyadi" class="login-field" placeholder="Soyad" id="login-soyad">
                        <label class="login-field-icon" for="login-soyad"></label>
                    </div>
                    <div class="control-group">
                        <input type="text" name="kullanici_eposta" class="login-field" placeholder="E-Posta" id="login-eposta">
                        <label class="login-field-icon" for="login-eposta"></label>
                    </div>
                    <div class="control-group">
                        <input type="password" name="kullanici_sifre" class="login-field" placeholder="Şifre" id="login-sifre">
                        <label class="login-field-icon" for="login-sifre"></label>
                    </div>
                    <div class="control-group">
                        <input type="password" name="kullanici_sifre_tekrar" class="login-field" placeholder="Şifre Tekrar" id="login-sifre-tekrar">
                        <label class="login-field-icon" for="login-sifre-tekrar"></label>
                    </div>
                    
                    <button href="kayit.php" name="kayit" class="btn">Kayıt Ol</button>
                </div>    
            </form>
            <a href="index.php"><button class="btn">Giriş Yap</button></a>
            </div>
        </div>
    </body>
</html>