<?php

require('simple_html_dom.php');

$html = file_get_html('https://panoramafirm.pl/kursy_i_nauka_jazdy/firmy,1.html');
// $dom = str_get_html('https://panoramafirm.pl/kursy_i_nauka_jazdy/firmy,1.html');

$nazwa = $html->find('a[class=business-card-title addax addax-cs_hl_hit_company_name_click]');
$miasto = $html->find('div[class=address-container has-left-icon]');
$kontakty = $html->find('li[class=bottom-bar-tooltip-toggle col-xs]');
preg_match_all('/\d\d\d\s\d\d\d\s\d\d\d|\d\d\s\d\d\d\s\d\d\s\d\d/', implode(" ", $kontakty), $tel);
$www = $html->find('a[class=addax addax-cs_hl_hit_homepagelink_click]');
$email = $html ->find('a[class=addax addax-cs_hl_email_submit_click count-hovers]');
// echo '<pre>';
// print_r($tel);
// die;
$ilosc = count($nazwa);
for ($i=0; $i < $ilosc; $i++ ){

	echo $nazwa[$i]->plaintext;
	echo '; ';
	echo $miasto[$i]->plaintext;
	echo '; ';
	echo $tel[0][$i];
	echo '; ';
	echo $www[$i]->href;
	echo '; ';
	$em_ail = str_replace('mailto:', '', $email[$i]->href);
	echo $em_ail;
	echo '</br>';

}

