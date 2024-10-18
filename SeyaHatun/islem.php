<?php 

ob_start();
session_start();

require 'baglan.php';

if(isset($_POST['kayit']))
{
    $Kullanici_Adi = $_POST['kullanici_adi'];
    $Kullanici_Soyadi = $_POST['kullanici_soyadi'];
    $Kullanici_EPosta = $_POST['kullanici_eposta'];
    $Kullanici_Sifre = $_POST['kullanici_sifre'];
    $Kullanici_Sifre_tekrar = $_POST['kullanici_sifre_tekrar'];
    $Kullanici_Rol = "standart";
    
    if(!$Kullanici_Adi){
        echo "Lütfen Kullanıcı Adınızı girin.";
    }
    
    elseif(!$Kullanici_Soyadi){
        echo "Lütfen Soyadınızı girin.";
    }
    
    elseif(!$Kullanici_EPosta){
        echo "Lütfen E-Postanızı girin.";
    }
    
    elseif(!$Kullanici_Sifre || !$Kullanici_Sifre_tekrar){
        echo "Lütfen şifrenizi girin.";
    }
    
    elseif($Kullanici_Sifre != $Kullanici_Sifre_tekrar){
        echo "Lütfen girdiğiniz şifre ve şifre tekrarını birebir aynı karakterler olarak girin.";
    }
    
    else{
        $sorgu = $db->prepare('INSERT INTO kullanicilar SET Kullanici_Adi = ?, Kullanici_Soyadi = ?, Kullanici_EPosta = ?, Kullanici_Sifre = ?, Kullanici_Rol = ?');
        $ekle = $sorgu->execute([
            $Kullanici_Adi, $Kullanici_Soyadi, $Kullanici_EPosta, $Kullanici_Sifre, $Kullanici_Rol
        ]);
        if($ekle){
            echo "Kayıt başarıyla gerçekleştirildi, yönlendiriliyorsunuz !";
            header('Refresh:2; index.php');
        }
        else{
            echo "Bir hata oluştu, lütfen kayıt oluşturmayı tekrar deneyiniz !";
            header('Refresh:2; index.php');
        }
    }
    
}

if(isset($_POST['giris'])){
    $Kullanici_EPosta = $_POST['eposta'];
    $kullanici_Sifre = $_POST['sifre'];
    
    if(!$Kullanici_EPosta){
        echo "Lütfen E-Postanızı girin.";
    }
    
    elseif(!$kullanici_Sifre){
        echo "Lütfen şifrenizi girin";
    }
    
    else{
        $kullanici_sorgula = $db->prepare('SELECT * FROM kullanicilar WHERE Kullanici_EPosta = ? && Kullanici_Sifre = ?');
        $kullanici_sorgula->execute([
            $Kullanici_EPosta, $kullanici_Sifre
        ]);
        
        $say = $kullanici_sorgula->rowCount();
        
        if($say == 1){
            $_SESSION['Kullanici_EPosta'] = $Kullanici_EPosta;
            header('Refresh:1; tarihsec.php');
        }
        
        else{
            echo "E-Posta veya şifreniz hatalı, lütfen tekrar giriş yapmayı deneyin !";
            header('Refresh:2; index.php');
        }
    }
}

?>