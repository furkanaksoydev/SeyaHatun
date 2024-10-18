<?php 
require 'baglan.php';

if(isset($_POST['biletara']))
{
    $Kalkis_Sehir = $_POST['kalkis_sehir'];
    $Varis_Sehir = $_POST['varis_sehir'];
    $Tarih = $_POST['tarih'];
    
    $bilet_sorgula = $db->prepare('SELECT * FROM biletler WHERE Kalkis_Sehir = ? && Varis_Sehir = ? && Tarih = ?');
    $bilet_sorgula->execute([
        $Kalkis_Sehir, $Varis_Sehir, $Tarih
    ]); 

    $biletler = $bilet_sorgula->fetchAll(PDO::FETCH_COLUMN, 0);

    if ($biletler) {
        $biletler_json = json_encode($biletler);
        header("Location: biletler.php?biletler=" . urlencode($biletler_json));
        exit();
    } else {
        header("Location: biletler.php?biletler=" . urlencode($biletler_json));
    }
}
?>