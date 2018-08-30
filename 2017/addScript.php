<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 17.06.2017
 * Time: 16:40
 */

echo
'(function () {
    if (location.pathname == "/KPSS1/2017/1/BransBazindaSiralama") {
        /*Bilişim teknolojileri branşını tercih edebilecek branşlar*/
        var A = "2712,2547,2399,1995,1996,1997,1999,2000,2365,2001,2412,2087,2545,2118,2396,1998,2529".split(",");
        var KabulEdilenBranslar = [
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
        /*Branş Bilgisini Alınması todo ikinci üniversite okuyanlar için birden fazla seçilmiş branş oluyor bunun denetimi yapılmalı*/
        var brans = $("input:checked", "#listViewProgramlar")[0].labels[0].innerHTML.split(" - ")[1];
        if (KabulEdilenBranslar.indexOf(brans) !== -1) {
            /*Önceki yerleştirmeleri sıralamaya dahil etmemesi için checkbox ın seçilmesi*/
            document.getElementById("SorgulaModel_YerlesenleriDahilEtme").checked = true;

            /*Bilişim teknolojileri dersini tercih edebilecek branşların seçilmesi ve diğer branşların listeden silinmesi*/
            for (x of document.getElementById("listViewProgramlar").querySelectorAll("input[type=\"checkbox\"]")) A.indexOf(x.id) > -1 ? x.checked = true : x.parentNode.remove();
            /*2017 sayfasında çalışmıyor
             Puan türünün seçilmesi
             $("#SorgulaModel_SecilenPuanTur_listbox").children("[data-offset-index=\"8\"]").click();*/
            /*Hesapla butonunun tıklaması*/
            $("[value=\"Hesapla\"]").trigger("click");
            /*Hesaplama işleminden sonra sıralamanın yazdığı HTML elementi*/
            var sonuc = document.getElementById("divResultInner");
            var sayac = 0;
            /* toplamda 4 değişiklik oluyor bu 4 değişikliğin sonunda kodları çalıştırmak için sayaç ekledim.*/
            sonuc.addEventListener("DOMSubtreeModified", function () {
                sayac++;
                if (sayac >= 4) {
                    var sira = document.querySelector("span[data-bind=\"text : SiraNo\"]").innerHTML;
                    var puan = document.querySelector("span[data-bind=\"text : SiralamaYapilanPuan\"]").innerHTML;
                    var puanTuru = document.querySelector("span[data-bind=\"text : SiralamaYapilanPuanTuru\"]").innerHTML;
                    /* ÖSYM sayfasında hazır bulunan  Kendowindow eklentisi ile gösterilecek mesajın şablonunun body içerisine eklenmesi*/
                    document.getElementsByTagName("body").item(0).innerHTML += \'<div id=\"window\">\' +
                        "<div class=\"msg\" style=\"text-align: center;font-size: 2em;\"></div><div class=\"clear\"></div><button class=\"yes button\" style=\"margin: 15px auto;display: block;\">Listeye Ekle</button>" +
                        "</div>";
                    /* ÖSYM sayfasında hazır bulunan  Kendowindow eklentisi ile gösterilecek mesajın içeriğinin body içerisine eklenmesi*/
                    document.querySelector("#window .msg").innerHTML = puanTuru + " Türünde sıralamanız : " + sira + "</br>" +
                        "Puanınızın isimsiz olarak kaydedilmesini ister misiniz? " +
                        "<input type=\"checkbox\" name=\"atandiMi\"> 2016 KPSS Puanım ile Atandım   ";
                    /*P10 dışında bir branş seçildiyse uyarı ver ve listeye ekle butonunu sil.*/
                    if (puanTuru !== \'KPSSP10\') {
                        $(".yes").remove();
                        $("#window .msg").html("Lütfen sayfayı yenileyip P10 türü ile tekrar hesaplayınız.");
                    } else {
                        $(".yes").click(function () {
                            /*Atandım kutucuğunun işaretlenmiş olup olmadığını kontrol et.*/
                            var atandiMi = 0;
                            if (document.querySelector("input[name=\"atandiMi\"]").checked) {
                                atandiMi = 1
                            } else {
                                atandiMi = 0
                            }
                            /*listeye ekleme işlemini yapmak için iframe içerisinde ekle.php sayfası çağırılıyor*/
                            $("#window .msg").html("<iframe src=\"https://botesiralamasi.gencbilisim.net/ekle.php?p=" + puan + "&s=" + sira + "&b=" + brans + "&2016K=" + atandiMi + "\" width=\"100%\" height=\"100%\">");
                            $(this).hide();
                        });
                    }
                    /*kendowindow eklentisi ile sonuç penceresi gösteriliyor*/
                    $("#window").kendoWindow({
                        width: "600px",
                        title: "Sıralamanız",
                        visible: false,
                        actions: [
                            "Pin",
                            "Minimize",
                            "Maximize",
                            "Close"
                        ],
                    }).data("kendoWindow").center().open();
                    window.scrollTo(0, document.body.scrollHeight);
                }
            });
        } else {
            alert("Bu kod sadece Bilişim teknolojileri öğretmen adayları tarafından kullanılabilir.")
        }

    } else {
        alert("Bu kod sadece 2017 Kpss için kullanılır.")
    }
})();
';
