<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 22.02.2018
 * Time: 15:20
 */
?>

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
                    <li>İlk olarak aşağıdaki kodların tamamını kopyalayın
                        <pre>
                            <code>
(function () {
    var s = document.createElement("script");
    s.src = "https://botesiralamasi.gencbilisim.net/addScript.php";
    document.body.appendChild(s);
})();</code>
                        </pre>
                    </li>
                    <li>
                        Sonrasında <a target="_blank" href="https://ais.osym.gov.tr/KPSS1/2017/1/BransBazindaSiralama">ÖSYM
                            Branş Sıralaması sayfasına</a> giriş yapın.
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
