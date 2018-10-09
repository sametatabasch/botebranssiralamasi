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
    $tercihEdilenPuan= max($puan,$puan2017);
    try {
        $query = $db->prepare("REPLACE INTO liste2018 (puan,puan2017,tercihEdilenPuan,sira,hesaplananSira,brans,tarih,atandiMi) VALUES (:puan,:puan2017,:tercihEdilenPuan,:sira,:hesaplananSira,:brans,:tarih,:atandiMi)");
        $query->bindParam(':puan', $puan);
        $query->bindParam(':puan2017', $puan2017);
        $query->bindParam(':tercihEdilenPuan', $tercihEdilenPuan);
        $query->bindParam(':sira', $sira);
        $query->bindParam(':hesaplananSira', $sira);
        $query->bindParam(':brans', $brans);
        $query->bindParam(':tarih', $tarih);
        $query->bindParam(':atandiMi', $atandiMi);
        $query->execute();

        $eklenenPuanId= $db->lastInsertId();
        $query=$db->query("SELECT * FROM liste2018 where id=$eklenenPuanId");
        $query->execute();
        $eklenenPuan=$query->fetchObject();

        /* Tercih edilen puana göre yerleşilecek olansıra belirleniyor*/
        $yeniguncelSira=$db->query("SELECT MIN(sira) As yeniSira FROM liste2018 where puan < $eklenenPuan->tercihEdilenPuan");
        $yeniguncelSira=$yeniguncelSira->fetch()['yeniSira'];

        /*yerleşilecek olan sıra hesaplananSira olarak veri tabanına yazılıyor*/
        $query=$db->query("UPDATE liste2018 SET hesaplananSira=$yeniguncelSira where id=$eklenenPuanId");

        /* kişinin hesaplanan sıralaması ile eski sıralaması arasında kalan güncel sıralamaları 1 arttır.*/
        $query=$db->query("UPDATE liste2018 SET hesaplananSira=(hesaplananSira+1) where hesaplananSira<$eklenenPuan->sira ANd hesaplananSira>=$yeniguncelSira AND id!=$eklenenPuanId");

    } catch (PDOException $e) {
        die('Hata: ' . $e->getMessage());
    }
}