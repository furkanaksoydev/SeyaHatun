<?php
include('baglan.php');

if (isset($_GET['bilet_id'])) {
    $bilet_id = intval($_GET['bilet_id']);

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=seyahatun;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT Kalkis_Sehir, Varis_Sehir, Tarih, Saat, Fiyat FROM biletler WHERE Bilet_ID = :bilet_id");
        $stmt->bindParam(':bilet_id', $bilet_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("SELECT Koltuk_ID FROM odemeler WHERE Bilet_ID = :bilet_id");
        $stmt->bindParam(':bilet_id', $bilet_id);
        $stmt->execute();
        $dolu_koltuklar = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

        $response = [
            'Kalkis_Sehir' => $result['Kalkis_Sehir'],
            'Varis_Sehir' => $result['Varis_Sehir'],
            'Tarih' => $result['Tarih'],
            'Saat' => $result['Saat'],
            'Fiyat' => $result['Fiyat'],
            'Dolu_Koltuklar' => $dolu_koltuklar
        ];

        echo json_encode($response);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Bağlantı hatası: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Bilet ID belirtilmemiş.']);
}
?>
