<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 20.08.2016
 * Time: 18:51
 */
require_once "functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>BÖTE Tüm alanlar dahil braş Sıralaması</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <meta name="author" content="Samet ATABAŞ">
    <meta charset="utf-8"/>
</head>
<body>
<?php
$branslar = [
    "BİLGİSAYAR VE ÖĞRETİM TEKNOLOJİLERİ ÖĞRETMENLİĞİ",
    "BİLGİ TEKNOLOJİLERİ", "BİLGİSAYAR BİLİMİ / BİLGİSAYAR BİLİMLERİ",
    "BİLGİSAYAR BİLİMİ VE MÜHENDİSLİĞİ / BİLGİSAYAR BİLİMLERİ MÜHENDİSLİĞİ",
    "BİLGİSAYAR MÜHENDİSLİĞİ",
    "BİLGİSAYAR ÖĞRETMENLİĞİ",
    "BİLGİSAYAR SİSTEMLERİ ÖĞRETMENLİĞİ",
    "BİLGİSAYAR TEKNOLOJİSİ BÖLÜMÜ",
    "BİLGİSAYAR TEKNOLOJİSİ VE BİLİŞİM SİSTEMLERİ",
    "BİLGİSAYAR VE KONTROL ÖĞRETMENLİĞİ",
    "BİLİŞİM SİSTEMLERİ MÜHENDİSLİĞİ",
    "BİLİŞİM SİSTEMLERİ VE TEKNOLOJİLERİ",
    "ELEKTRONİK VE BİLGİSAYAR ÖĞRETMENLİĞİ",
    "İSTATİSTİK VE BİLGİSAYAR BİLİMLERİ",
    "KONTROL VE BİLGİSAYAR MÜHENDİSLİĞİ",
    "MATEMATİK VE BİLGİSAYAR / MATEMATİK-BİLGİSAYAR",
    "YAZILIM MÜHENDİSLİĞİ"
];

$puan = floatval(strip_tags(trim(str_replace(',', '.', $_GET['p']))));
$puan2017 = floatval(strip_tags(trim(str_replace(',', '.', $_GET['p2017']))));
$sira = intval(strip_tags(trim($_GET['s'])));
$brans = strval(strip_tags(trim($_GET['b'])));
$atandiMi = boolval(trim($_GET['2016K']));
if ($sira != 0 && ($puan > 0 && $puan <= 100) && in_array($brans, $branslar)) {
    listeyeEkle($puan,$puan2017, $sira, $brans, $atandiMi);
    echo '
    <h3 class=""> Kayıt edilen puan ve sıralaması = ' . $puan . ' -> ' . $sira . '</h3>
    <a class="btn btn-default center-block" href="/" target="_blank">Listeyi Gör</a>';
} else {
    echo '
    <h3 class=""> Hatalı Giriş</h3>
    <a class="btn btn-default center-block" href="/" target="_blank">Listeyi Gör</a>';
}
?>


</body>
</html>
