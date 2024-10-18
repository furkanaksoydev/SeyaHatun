<?php
include('baglan.php');
session_start();

if (isset($_SESSION['Kullanici_EPosta'])):
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeyaHAT'UN - Biletler</title>
    <link rel="stylesheet" type="text/css" href="css/biletler.css">
</head>
<body>
<header>
    <img class="logoimg" src="resimler/hatunlogo.png">
    <nav>
        <ul>
            <h1>
                <?php echo $_SESSION['Kullanici_EPosta']; ?>
                <button class="cikisbutton">
                    <a href="cikisislem.php">Çıkış Yap</a>
                </button>
            </h1>
            <li><a href="tarihsec.php">Tarih Seç</a></li>
            <li><a href="hakkimizda.php">Hakkımızda</a></li>
            <li><a href="iletisim.php">İletişim</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Seçmiş Olduğunuz Filtrelere Göre Belirlenmiş Biletler</h2>
    <div class="bilet-yapisi">
        <div class="biletler">
            <?php
                if (isset($_GET['biletler'])):
                    $biletler_json = urldecode($_GET['biletler']);
                    $biletler = json_decode($biletler_json, true);

                    if (!empty($biletler)):
                        try {
                                $pdo = new PDO('mysql:host=localhost;dbname=seyahatun;charset=utf8', 'root', '');
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $bilet_ids = implode(',', array_map('intval', $biletler));

                                $stmt = $pdo->query("SELECT * FROM biletler WHERE Bilet_ID IN ($bilet_ids)");
                                $sonuc_biletler = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $stmt = $pdo->query("SELECT Bilet_ID, Koltuk_ID, Cinsiyet FROM odemeler WHERE Bilet_ID IN ($bilet_ids)");
                                $dolu_koltuklar = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $dolu_koltuklar_dizisi = [];
                                foreach ($dolu_koltuklar as $dolu_koltuk) {
                                    $dolu_koltuklar_dizisi[$dolu_koltuk['Bilet_ID']][$dolu_koltuk['Koltuk_ID']] = $dolu_koltuk['Cinsiyet'];
                            }

                            if ($sonuc_biletler):
                                foreach ($sonuc_biletler as $bilet):
                                    echo "<table border='1'><tr></tr>";
                                    echo "<tr>
                                            <td>" . htmlspecialchars($bilet["Kalkis_Sehir"]) . "</td>
                                            <td>" . htmlspecialchars($bilet["Varis_Sehir"]) . "</td>
                                            <td>" . htmlspecialchars($bilet["Tarih"]) . "</td>
                                            <td>" . htmlspecialchars($bilet["Saat"]) . "</td>
                                            <td>" . htmlspecialchars($bilet["Fiyat"]) . "</td>
                                          </tr>";
                                    echo "<tr class='image-otobus'><td colspan='8'>";
                                ?>
                <div class="hepsi">
                    <div class="tamami">
                        <div class="otobus">
                            <?php
                                $koltuk_konumlari = [
                                    1 => ['top' => '200px', 'left' => '230px'],
                                    2 => ['top' => '90px', 'left' => '230px'],
                                    3 => ['top' => '50px', 'left' => '230px'],
                                    4 => ['top' => '200px', 'left' => '290px'],
                                    5 => ['top' => '90px', 'left' => '290px'],
                                    6 => ['top' => '50px', 'left' => '290px'],
                                    7 => ['top' => '200px', 'left' => '350px'],
                                    8 => ['top' => '90px', 'left' => '350px'],
                                    9 => ['top' => '50px', 'left' => '350px'],
                                    10 => ['top' => '200px', 'left' => '410px'],
                                    11 => ['top' => '90px', 'left' => '410px'],
                                    12 => ['top' => '50px', 'left' => '410px'],
                                    13 => ['top' => '200px', 'left' => '470px'],
                                    14 => ['top' => '90px', 'left' => '470px'],
                                    15 => ['top' => '50px', 'left' => '470px'],
                                    16 => ['top' => '200px', 'left' => '530px'],
                                    17 => ['top' => '90px', 'left' => '530px'],
                                    18 => ['top' => '50px', 'left' => '530px'],
                                    19 => ['top' => '200px', 'left' => '590px'],
                                    20 => ['top' => '200px', 'left' => '650px'],
                                    21 => ['top' => '90px', 'left' => '650px'],
                                    22 => ['top' => '50px', 'left' => '650px'],
                                    23 => ['top' => '200px', 'left' => '710px'],
                                    24 => ['top' => '90px', 'left' => '710px'],
                                    25 => ['top' => '50px', 'left' => '710px'],
                                    26 => ['top' => '200px', 'left' => '770px'],
                                    27 => ['top' => '90px', 'left' => '770px'],
                                    28 => ['top' => '50px', 'left' => '770px'],
                                    29 => ['top' => '200px', 'left' => '830px'],
                                    30 => ['top' => '90px', 'left' => '830px'],
                                    31 => ['top' => '50px', 'left' => '830px'],
                                ];

                                foreach ($koltuk_konumlari as $i => $konum):
                                    $koltukClass = 'boskoltuk';
                                    if (isset($dolu_koltuklar_dizisi[$bilet['Bilet_ID']][$i])) {
                                        $cinsiyet = $dolu_koltuklar_dizisi[$bilet['Bilet_ID']][$i];
                                        $koltukClass = $cinsiyet === 'erkek' ? 'dolu-koltuk-erkek' : 'dolu-koltuk-kadin';
                                    }
                                ?>
                                <a class="koltuk <?php echo $koltukClass; ?>" data-seat-number="<?php echo $i; ?>" data-bilet-id="<?php echo $bilet['Bilet_ID']; ?>" style="top: <?php echo $konum['top']; ?>; left: <?php echo $konum['left']; ?>;">
                                    <text class="koltuksayi"><?php echo $i; ?></text>
                                </a>
                                <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php
                                echo "</td></tr>";
                            endforeach;
                            echo "</table>";
                        else:
                            echo "Bu kriterlere uygun bilet bulunamadı.";
                        endif;
                    } catch (PDOException $e) {
                        echo 'Bağlantı hatası: ' . $e->getMessage();
                    }
                else:
                    echo "Bu kriterlere uygun bilet bulunamadı.";
                endif;
            else:
                echo "Bilet bilgileri alınamadı.";
            endif;
            ?>
        </div>
    </div>

    <div id="odemeKismi" class="odeme-kismi-sabit"></div>
</main>

    
    
    
        <script>
        document.querySelectorAll('.boskoltuk').forEach(koltuk => {
            koltuk.addEventListener('click', function() {
                const seatNumber = this.dataset.seatNumber;
                const biletId = this.dataset.biletId;

                // AJAX isteği
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'bilet_detay.php?bilet_id=' + biletId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        const kalkis = response.Kalkis_Sehir;
                        const varis = response.Varis_Sehir;
                        const tarih = response.Tarih;
                        const saat = response.Saat;
                        const fiyat = response.Fiyat;

                        const odemeKismi = document.getElementById('odemeKismi');
                        odemeKismi.innerHTML = ''; // Mevcut içeriği temizle

                        odemeKismi.innerHTML += `
                            <p>Koltuk Numarası: ${seatNumber}</p>
                            <p>Bilet ID: ${biletId}</p>
                            <p>Kalkış Şehri: ${kalkis}</p>
                            <p>Varış Şehri: ${varis}</p>
                            <p>Tarih: ${tarih}</p>
                            <p>Saat: ${saat}</p>
                            <p>Fiyat: ${fiyat}</p>
                            <form action="odeme_sayfasi.php" method="post">
                                <input type="hidden" name="koltuk_no" value="${seatNumber}">
                                <input type="hidden" name="bilet_id" value="${biletId}">
                                <input type="hidden" name="kalkis" value="${kalkis}">
                                <input type="hidden" name="varis" value="${varis}">
                                <input type="hidden" name="tarih" value="${tarih}">
                                <input type="hidden" name="saat" value="${saat}">
                                <input type="hidden" name="fiyat" value="${fiyat}">
                                <label for="cinsiyet">Cinsiyet:</label>
                                <select name="cinsiyet" id="cinsiyet" required>
                                    <option value="">Seçiniz</option>
                                    <option value="erkek">Erkek</option>
                                    <option value="kadin">Kadın</option>
                                </select>
                                <br><br><br>
                                <input type="submit" value="Ödeme Sayfasına Git">
                            </form>
                        `;
                    } else {
                        console.error('Bilet detayları yüklenemedi.');
                    }
                };
                xhr.send();
            });
        });
        </script>
    </body>
</html>
<?php
else:
    echo "Giriş yapmalısınız.";
endif;
?>
