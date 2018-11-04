<?
$cena = $_GET['cena'];
$cena = str_replace(" ","",$cena);
$cena = str_replace("₽","",$cena);
$cena = str_replace("$","",$cena);
$cena = str_replace("€","",$cena);

// 2.
// Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
// Payment of the set sum with a choice of currency on site ROBOKASSA

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "trade.nativbio.ru";
$mrh_pass1 = "b3aE6Ao1iXU6Gc6CBXZV";

// номер заказа
// number of order
$inv_id = 0;

// описание заказа
// order description
$inv_desc = $_GET['email'];

// сумма заказа
// sum of order
$out_summ = $cena;

// тип товара
// code of goods
$shp_item = "1";

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "";

// язык
// language

$culture = "ru";
if($_GET['c'] == 'ru') {
	$OutSumCurrency = "RUR";
} 
elseif($_GET['c'] == 'de') {
	$OutSumCurrency = "EUR";
}
elseif($_GET['c'] == 'en') {
	$OutSumCurrency = "USD";
}
elseif($_GET['c'] == 'fr') {
	$OutSumCurrency = "EUR";
}
// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$OutSumCurrency:$mrh_pass1:Shp_item=$shp_item");

// форма оплаты товара
// payment form
print "<html>".
      "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
      "<input type=hidden name=MrchLogin value=$mrh_login>".
      "<input type=hidden name=OutSum value=$out_summ>".
      "<input type=hidden name=InvId value=$inv_id>".
      "<input type=hidden name=Desc value='$inv_desc'>".
      "<input type=hidden name=SignatureValue value=$crc>".
      "<input type=hidden name=Shp_item value='$shp_item'>".
      "<input type=hidden name=IncCurrLabel value=$in_curr>".
      "<input type=hidden name=Culture value=$culture>".
      "<input type=hidden name=OutSumCurrency value=$OutSumCurrency>".
      "<input type=hidden name=IsTest value=1>".
      "<input type=submit class='but' value='Pay'>".
      "</form></html>";
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> <script type='text/javascript'>
$(document).ready(function(){
 $(".but").click();
});
</script>