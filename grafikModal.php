<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 22.02.2018
 * Time: 15:18
 */
?>
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
                <div id="container">
                    2016 KPSS puanı ile
                    <div class="btn-group">
                        <div class="btn btn-default">ataması yapılmış <span class="badge">
				<?= $db->query("SELECT count(puan) AS toplam FROM liste2017 WHERE atandiMi=1")->fetch()['toplam'] ?></span>
                        </div>
                        <div class="btn btn-default">ataması yapılmamış <span class="badge">
				<?= $db->query("SELECT count(puan) AS toplam FROM liste2017 WHERE atandiMi=0")->fetch()['toplam'] ?></span>
                        </div>
                        <div class="btn btn-default">atanma durumunu güncellemesi gereken <span class="badge">
				<?= $db->query("SELECT count(puan) AS toplam FROM liste2017 WHERE atandiMi=2")->fetch()['toplam'] ?></span>
                        </div>
                    </div>
                    kişi var.
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