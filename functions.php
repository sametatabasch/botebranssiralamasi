<?php
error_reporting(E_ALL);
if (!ini_get('display_errors')) {
    ini_set('display_errors', 1);
}
require_once "veriler.php";
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 04.01.2014
 * Time: 22:20
 */
try {
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUserName, $dbPassWord, $options);
} catch (PDOException $e) {
    echo 'Hata: ' . $e->getMessage();
}
function listeyeEkle($puan, $puan2017, $sira, $brans, $_atandiMi)
{
    global $db;
    $tarih = date('d.m.Y');
    $atandiMi = $_atandiMi === true ? 1 : 0;
    try {
        $query = $db->prepare("REPLACE INTO liste2018 (puan,puan2017,sira,brans,tarih,atandiMi) VALUES (:puan,:sira,:brans,:tarih,:atandiMi)");
        $query->bindParam(':puan', $puan);
        $query->bindParam(':puan2017', $puan2017);
        $query->bindParam(':sira', $sira);
        $query->bindParam(':brans', $brans);
        $query->bindParam(':tarih', $tarih);
        $query->bindParam(':atandiMi', $atandiMi);
        $query->execute();
    } catch (PDOException $e) {
        die('Hata: ' . $e->getMessage());
    }
}