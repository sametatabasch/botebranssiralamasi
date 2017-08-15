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
        var A = "2712,2547,2399,1995,1996,1997,1999,2000,2365,2001,2412,2087,2545,2118,2396,1998,2529".split(",");
        document.getElementById("SorgulaModel_YerlesenleriDahilEtme").checked = true;
        var brans = $("input:checked", "#listViewProgramlar")[0].labels[0].innerHTML.split(" - ")[1];
        for (x of document.getElementById("listViewProgramlar").querySelectorAll("input[type=\"checkbox\"]")) A.indexOf(x.id) > -1 ? x.checked = true : x.parentNode.remove();
        $("#SorgulaModel_SecilenPuanTur_listbox").children("[data-offset-index=\"8\"]").trigger("click");
        $("[value=\"Hesapla\"]").trigger("click");
        var sonuc = document.getElementById("divResultInner");
        var sayac = 0;
        /* toplamda 4 değişiklik oluyor bu 4 değişikliğin sonunda kodları çalıştırmak için sayaç ekledim.*/
        sonuc.addEventListener("DOMSubtreeModified", function () {
            sayac++;
            if (sayac >= 4) {
                document.getElementsByTagName("body").item(0).innerHTML += \'<div id=\"window\">\' +
                    "<div class=\"msg\" style=\"text-align: center;font-size: 2em;\"></div><div class=\"clear\"></div><button class=\"yes button\" style=\"margin: 15px auto;display: block;\">Listeye Ekle</button>" +
                    "</div>";

                var sira = document.querySelector("span[data-bind=\"text : SiraNo\"]").innerHTML;
                var puan = document.querySelector("span[data-bind=\"text : SiralamaYapilanPuan\"]").innerHTML;

                document.querySelector("#window .msg").innerHTML = "P10 Puan Türünde sıralamanız : " + sira + "</br>" +
                    "Puanınızın isimsiz olarak kaydedilmesini ister misiniz? " +
                    "<input type=\'checkbox\' name=\'atandiMi\'> 2016 KPSS Puanım ile Atandım   ";
                /*yes ve no butonları tıklama dinleyicisi ekle*/
                $(".yes").click(function () {
                    var atandiMi = document.querySelector(\'input[name=\"atandiMi\"]\').checked;
                    console.log(atandiMi);
                    $("#window .msg").html("<iframe src=\"https://botesiralamasi.gencbilisim.net/ekle.php?p=" + puan + "&s=" + sira + "&b=" + brans + "&2016K=" + atandiMi + "\" width=\"100%\" height=\"100%\">");
                    $(this).hide();
                });
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
        alert("Bu kod sadece 2017 Kpss için kullanılır.")
    }
})();
';
