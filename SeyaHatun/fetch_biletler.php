<?php
include('baglan.php');

if (isset($_GET['bilet_id'])) {
    $bilet_id = $_GET['bilet_id'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=seyahatun;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM biletler WHERE Bilet_ID = :bilet_id");
        $stmt->bindParam(':bilet_id', $bilet_id, PDO::PARAM_INT);
        $stmt->execute();
        $bilet_detay = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($bilet_detay);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Bağlantı hatası: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Bilet ID alınamadı.']);
}
?>
