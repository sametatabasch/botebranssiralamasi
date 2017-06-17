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
$puan = floatval(strip_tags(trim(str_replace(',', '.', $_GET['p']))));
$sira = intval(strip_tags(trim($_GET['s'])));
$brans = strval(trim($_GET['b']));
if ($sira != 0 || $puan != 0)
    listeyeEkle($puan, $sira,$brans);
?>

<h3 class=""> Kayıt edilen puan ve sıralaması = <?= $puan ?> -> <?= $sira ?></h3>
<a class="btn btn-default center-block" href="/" target="_blank">Listeyi Gör</a>
</body>
</html>