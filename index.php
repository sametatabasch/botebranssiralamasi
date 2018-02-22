<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>2017 - BÖTE Branş Sıralaması</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui viewport-fit=cover">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-1.12.3.js"></script>

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jqc-1.12.3/dt-1.10.16/r-2.2.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jqc-1.12.3/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

    <!-- tarih sıralamasını yaptırabilmek için ekliyorum. https://datatables.net/blog/2014-12-18 -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>


    <!-- Latest compiled and minified JavaScript -->

    <meta name="author" content="Samet ATABAŞ">
    <meta charset="utf-8"/>
    <!-- Google İzleme kodu -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-75339179-1', 'auto');
        ga('send', 'pageview');

    </script>
    <script type="text/javascript" src="js/jquery.inputmask.bundle.min.js"></script>
    <!--Highchart  -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <!-- Admatic interstitial 320x480 Ad Code START -->
    <ins data-publisher="adm-pub-139630885245" data-ad-type="interstitial" class="adm-ads-area"
         data-ad-network="167662869748" data-ad-sid="206" data-ad-width="320" data-ad-height="480"></ins>
    <script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
    <!-- Admatic interstitial 320x480 Ad Code END -->
    <!-- Admatic interstitial 800x600 Ad Code START -->
    <ins data-publisher="adm-pub-139630885245" data-ad-type="interstitial" class="adm-ads-area"
         data-ad-network="167662869748" data-ad-sid="209" data-ad-width="800" data-ad-height="600"></ins>
    <script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
    <!-- Admatic interstitial 800x600 Ad Code END -->
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h2 class="panel-title pull-left">2017 BÖTE Branş Sıralaması</h2>
            <div class="pull-right">
                <a href="https://github.com/sametatabasch/botebranssiralamasi" target="_blank" style="color:white">
                    <svg aria-hidden="true" version="1.1" viewBox="0 0 16 16" width="32" class="pull-right" height="20">
                        <path fill-rule="evenodd"
                              d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                    </svg>
                    Github</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <!-- Girilen KPSS puan sayısı small box -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $db->query("SELECT count(puan) AS puanSayisi FROM liste2017")->fetch()['puanSayisi'] ?></h3>

                        <p>KPSS puanı girildi</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target=".bransSiralamasiEkle">
                        Sende Ekle <i class="glyphicon glyphicon-circle-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Max KPSS Puanı small box-->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= round($db->query("SELECT MAX(puan) AS maxPuan FROM `liste2017`")->fetch()['maxPuan'], 3) ?></h3>

                        <p>Girilen en yüksek KPSS puanı</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-stats"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target=".kpssFrekans">
                        DetaylıBilgi <i class="glyphicon glyphicon-circle-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Min KPSS Puanı small box-->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= round($db->query("SELECT MIN(puan) AS minPuan FROM `liste2017`")->fetch()['minPuan'], 3) ?></h3>

                        <p>Girilen en düşük KPSS puanı</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-stats"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target=".kpssFrekans">
                        DetaylıBilgi <i class="glyphicon glyphicon-circle-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Destek small box -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Destek</h3>

                        <p>Play store da yayında olan Eğitsel oyunumu indirirerek bana destek olabilirsiniz.</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-star"></i>
                    </div>
                    <a href="https://play.google.com/store/apps/details?id=net.gencbilisim.buluttaMatematik"
                       class="small-box-footer">
                        Bulutta Matematik <i class="glyphicon glyphicon-circle-arrow-down"></i>
                    </a>
                </div>
            </div>

            <!-- Table -->
            <table id="siralamaListesi" class="table table-responsive table-striped table-bordered dataTable">
                <thead>
                <th>Sıra</th>
                <th>Puan</th>
                <th>Branş</th>
                <th>Genel Sıralama</th>
                <th> 2016Kpss İle Atandı</th>
                <th>Güncelleme Tarihi</th>
                </thead>
                <tbody>

                <?php $s = 1;
                foreach ($db->query("SELECT puan,sira,brans,tarih,atandiMi FROM liste2017 ORDER BY sira ASC") as $row): ?>
                    <tr>
                        <td><?= $s ?></td>
                        <td><?= $row['puan'] ?></td>
                        <td><?= $row['brans'] ?></td>
                        <td><?= $row['sira'] ?></td>
                        <td><?php
                            if (is_null($row['atandiMi']) || $row['atandiMi'] == 2) {
                                $atamaDurumu = 'Güncelleme Gerekli';
                            } else {
                                $atamaDurumu = $row['atandiMi'] ? 'Atandı' : 'Atanmadı';
                            }
                            echo $atamaDurumu ?></td>
                        <td><?= $row['tarih'] ?></td>
                    </tr>
                    <?php $s++; endforeach; ?>
                </tbody>
            </table>

            <script type="text/javascript">
                $(document).ready(function () {
                    $.fn.dataTable.moment( 'DD.MM.YYYY' );
                    $('#siralamaListesi').DataTable({
                        "language": {
                            "sProcessing": "İşleniyor...",
                            "sLengthMenu": "Sayfada _MENU_ Kayıt Göster",
                            "sZeroRecords": "Eşleşen Kayıt Bulunmadı",
                            "sInfo": "  _TOTAL_ Kayıttan _START_ - _END_ Arası Kayıtlar",
                            "sInfoEmpty": "Kayıt Yok",
                            "sInfoFiltered": "( _MAX_ Kayıt İçerisinden Bulunan)",
                            "sInfoPostFix": "",
                            "search": "Bul:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "İlk",
                                "sPrevious": "Önceki",
                                "sNext": "Sonraki",
                                "sLast": "Son"
                            }
                        },
                        "pageLength": 25,
                    });
                });
            </script>
        </div>
        <div class="panel-footer">
            <a class="pull-left" href="/2016">2016 Listesi</a>
            <a class="pull-right" href="http://gencbilisim.net">Samet Atabaş - GençBilişim.net</a>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- Grafik modal-->
<?php require_once "grafikModal.php"; ?>
<!-- Branş Sıralaması ekle modal-->
<?php require_once "bransSiralamasiEkleodal.php"; ?>
<!-- Yapım Aşaması modal-->
<?php require_once "yapimAsamasindaModal.php"; ?>

<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(":input").inputmask();
    });
</script>
<!-- Admatic Scroll 300x250 Ad Code START -->
<ins data-publisher="adm-pub-139630885245" data-ad-type="Scroll" class="adm-ads-area" data-ad-network="167662869748"
     data-ad-sid="304" data-ad-width="300" data-ad-height="250"></ins>
<script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
<!-- Admatic Scroll 300x250 Ad Code END -->
</body>
</html>
