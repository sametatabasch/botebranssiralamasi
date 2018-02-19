<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>2017 - BÖTE Branş Sıralaması</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui viewport-fit=cover">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-1.12.3.js"></script>

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs/jqc-1.12.3/dt-1.10.12/datatables.min.css"/>

    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs/jqc-1.12.3/dt-1.10.12/datatables.min.js"></script>


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
    <ins data-publisher="adm-pub-139630885245" data-ad-type="interstitial" class="adm-ads-area" data-ad-network="167662869748" data-ad-sid="206" data-ad-width="320" data-ad-height="480"></ins>
    <script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
    <!-- Admatic interstitial 320x480 Ad Code END -->
    <!-- Admatic interstitial 800x600 Ad Code START -->
    <ins data-publisher="adm-pub-139630885245" data-ad-type="interstitial" class="adm-ads-area" data-ad-network="167662869748" data-ad-sid="209" data-ad-width="800" data-ad-height="600"></ins>
    <script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
    <!-- Admatic interstitial 800x600 Ad Code END -->
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3 class="panel-title">2017 BÖTE Branş Sıralaması</h3>

        </div>
        <div class="panel-body">
            <div class="col-lg-3 col-xs-6">
                <!-- Girilen KPSS puan sayısı small box -->
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
<div class="modal fade  kpssFrekans" tabindex="-1" role="dialog" aria-labelledby="kpssFrekansModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="kpssFrekansModalLabel">KPSS Puanlarının Frekans Grafiği</h4>
            </div>
            <div class="modal-body">
                <?php
                $labels = "[";
                $data = "[";
                foreach ($db->query("SELECT round(puan)AS kpss, count(round(puan)) AS frekans  FROM `liste2017` GROUP BY kpss ORDER BY kpss") as $row) {
                    $labels .= '"' . $row['kpss'] . '",';
                    $data .= $row['frekans'] . ",";
                }
                $labels .= "]";
                $data .= "]";
                ?>
                <div id="container" >
			2016 KPSS puanı ile
			<div class="btn-group">
	        		<div class="btn btn-default">ataması yapılmış <span class="badge">
				<?= $db->query("SELECT count(puan) AS toplam FROM liste2017 WHERE atandiMi=1")->fetch()['toplam'] ?></span></div>
			        <div class="btn btn-default">ataması yapılmamış <span class="badge">
				<?= $db->query("SELECT count(puan) AS toplam FROM liste2017 WHERE atandiMi=0")->fetch()['toplam'] ?></span></div>
			        <div class="btn btn-default">atanma durumunu güncellemesi gereken <span class="badge">
				<?= $db->query("SELECT count(puan) AS toplam FROM liste2017 WHERE atandiMi=2")->fetch()['toplam'] ?></span></div>
			 </div> kişi var.
			<div id="grafik" style="width:100%; height:400px;"></div>
		</div>
                <script>
                    $(function () {
                        var myChart = Highcharts.chart('grafik', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'P10 Frekans Grafiği'
                            },
                            xAxis: {
                                categories: <?=$labels?>
                            },
                            yAxis: {
                                title: {
                                    text: 'P10 Puanı'
                                }
                            },
                            series: [{
                                name: 'Frekans',
                                data: <?=$data?>
                            }]
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<!-- Branş Sıralaması ekle modal-->
<div class="modal fade  bransSiralamasiEkle" tabindex="-1" role="dialog"
     aria-labelledby="bransSiralamasiEkleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="bransSiralamasiEkleModalLabel">Nasıl Eklenir</h4>
            </div>
            <div class="modal-body">
                <p>Hazırlanan javascript kodunu kullanarak branş sıralamanızı ekleyebilirsiniz.</p>
                <p>
                <ol>
                    <li>İlk olarak <a target="_blank"
                                      href="https://github.com/sametatabasch/botebranssiralamasi/blob/master/siralamaBelirle.js">buraya</a>
                        tıklayarak açılan sayfadaki kodların tamamını kopyalayın
                    </li>
                    <li>
                        Sonrasında <a target="_blank" href="https://ais.osym.gov.tr/KPSS1/2017/1/BransBazindaSiralama">ÖSYM
                            Branş Sıralaması sayfasına</a> giriş yapın.
                    </li>
                    <li>
                        Açılan sayfada puan türünüzü P10 olarak seçin.
                    </li>
                    <li>
                        ÖSYM Branş Sıralaması sayfasındayken adres çubuğunu temizleyin ve <b>javascript:</b> yazıp hemen
                        peşine kopyaladığınız kodu yapıştırın ve enter a basın.
                    </li>
                    <li>Ekranda açılan pencerede listeye ekle butonuna tıkladığınızda puanınız listeye eklenecektir.
                    </li>
                </ol>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Yapım Aşaması modal-->
<div class="modal fade  yapimasamasi" tabindex="-1" role="dialog" aria-labelledby="yapimasamasiModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="yapimasamasiModalLabel">Yapım Aşamasında</h4>
            </div>
            <div class="modal-body">
                Yapım Aşamasında
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(":input").inputmask();
    });
</script>
<!-- Admatic Scroll 300x250 Ad Code START -->
<ins data-publisher="adm-pub-139630885245" data-ad-type="Scroll" class="adm-ads-area" data-ad-network="167662869748" data-ad-sid="304" data-ad-width="300" data-ad-height="250"></ins>
<script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
<!-- Admatic Scroll 300x250 Ad Code END -->
</body>
</html>
