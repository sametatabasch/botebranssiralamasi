<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>2017 - BÖTE Branş Sıralaması</title>
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
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3 class="panel-title">2017 BÖTE Branş Sıralaması</h3>

        </div>
        <div class="panel-body">
            <div class="col-lg-4 col-xs-6">
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
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= round($db->query("SELECT MAX(puan) AS maxPuan FROM `liste2017`")->fetch()['maxPuan'],3) ?></h3>

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

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= round($db->query("SELECT MIN(puan) AS minPuan FROM `liste2017`")->fetch()['minPuan'],3) ?></h3>

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
            <!-- Table -->
            <table id="siralamaListesi" class="table table-responsive table-striped table-bordered dataTable">
                <thead>
                <th>Sıra</th>
                <th>Puan</th>
                <th>Genel Sıralama</th>
                <th>Güncelleme Tarihi</th>
                </thead>
                <tbody>

                <?php $s = 1;
                foreach ($db->query("SELECT puan,sira,brans,tarih FROM liste2017 ORDER BY sira ASC") as $row): ?>
                    <tr>
                        <td><?= $s ?></td>
                        <td><?= $row['puan'] ?></td>
                        <td><?= $row['brans'] ?></td>
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
<div class="modal fade  kpssFrekans" tabindex="-1" role="dialog" aria-labelledby="kpssFrakansModalLabel">
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
                <canvas id="myChart" width="400" height="400"></canvas>
                <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?= $labels ?>,
                            datasets: [{
                                label: '# Frekans Değeri',
                                data: <?= $data ?>,
                                backgroundColor: 'rgba(54, 162, 235, 0.4)',
                                borderColor: 'rgba(0, 38, 255, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        max: 100,
                                        min: 0,
                                        stepSize: 1
                                    }
                                }]
                            }
                        }
                    });
                </script>

            </div>
        </div>
    </div>
</div>
<!-- KPSS Puan gir Modal -->
<div class="modal fade kpssPuanGir" tabindex="-1" role="dialog" aria-labelledby="kpssModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="kpssModalLabel">Kpss Puanı Ekle</h4>
            </div>
            <div class="modal-body" id="kpssPuanGirModalBody">
                <div class="alert alert-info" role="alert">
                    <div class="pull-left">
                        Lütfen sonucunuzu
                        <a class="alert-link" href="https://sonuc.osym.gov.tr/Sorgu.aspx?SonucID=4110"> 2017 KPSS sonuç
                            Sayfasından</a>
                        kopyalayarak olduğu gibi yazın.
                    </div>

                    <div class="clearfix"></div>
                </div>

                <form name="kpssPuanGir" id="kpssPuanGir" method="post" action="kpssEkle.php">
                    <div class="form-group">
                        <label for="tcno">TC NO:</label>
                        <input class="form-control" type="text" data-inputmask="'mask': '9{11}'"
                               name="tcno" id="tcno" required>
                    </div>
                    <div class="form-group">
                        <label for="kpss">Kpss Puanı:</label>
                        <input class="form-control" data-inputmask="'mask': '1{*}9{1,2}.9{1,4}'"
                               id="kpss" name="kpss" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control btn btn-default" type="submit" value="Kaydet">
                    </div>
                </form>
                <script type="text/javascript">
                    $('#kpssPuanGir').on('submit', function () {
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            data: $(this).serializeArray(),
                            success: function (returnData) {
                                $('#kpssPuanGirModalBody').append(
                                    '<div class="alert alert-' + returnData['status'] + ' alert-dismissable fade in">' +
                                    '<i class="fa fa-check"></i>' +
                                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>' +
                                    '' + returnData['msg'] +
                                    '</div>'
                                );
                                $('#kpssPuanGir')[0].reset();
                                var z = setInterval(function () {
                                    $('#kpssPuanGirModalBody .alert').alert('close');
                                }, 5000);
                            }
                        });
                        return false;
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<!-- Branş Sıralaması ekle modal-->
<div class="modal fade  bransSiralamasiEkle" tabindex="-1" role="dialog" aria-labelledby="bransSiralamasiEkleModalLabel">
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
                    <li>İlk olarak <a target="_blank" href="https://github.com/sametatabasch/botebranssiralamasi/blob/master/siralamaBelirle.js">buraya</a>
                        tıklayarak açılan sayfadaki kodların tamamını kopyalayın
                    </li>
                    <li>
                        Sonrasında <a target="_blank" href="https://ais.osym.gov.tr/KPSS1/2017/1/BransBazindaSiralama">ÖSYM Branş Sıralaması sayfasına</a> giriş yapın.
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
</body>
</html>
