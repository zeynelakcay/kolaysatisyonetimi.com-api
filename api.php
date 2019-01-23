<?php
//Api System
header('Content-Type: text/html; charset=utf-8');
$company_id	 = $COMPANY_ID; // Panel Üzerinden Elde Edilecek
$website_id	 = $WEBSITE_ID; // Panel Üzerinden Elde Edilecek
$order_status_id = $ORDER_STATUS_ID; // Panel Üzerinden Elde Edilecek

$fullname	 =(isset($_POST['fullname'])) ?  $_POST['fullname'] : "Name Not Entered";  // Form'dan Gelen Ad Bilgisi
$email		 =(isset($_POST['email'])) ?  $_POST['email'] : "E-mail Not Entered"; // Form'dan Gelen E-mail Bilgisi
$phone		 =(isset($_POST['phone'])) ?  $_POST['phone'] : "Phone Not Entered";  // Form'dan Gelen Telefon Bilgisi
$district   = (isset($_POST['district'])) ? $_POST['district'] : "Phone Not District"; // Form'dan Gelen İlçe Bilgisi
$city		 =(isset($_POST['city'])) ? $_POST['city'] : "Phone Not City"; // Form'dan Gelen İl Bilgisi
$address		 = (isset($_POST['address'])) ?  $_POST['address'] : "Phone Not Address";  // Form'dan Gelen Adres Bilgisi  



$message = $MESSAGE_TEXT; // Formdan Gelen Diger Bilgiler

$url	 = 'http://kolaysatisyonetimi.com/Api/Order/add';
$data	 = array('company_id' => $company_id, 'website_id' => $website_id, 'order_status_id' => $order_status_id, 'fullname' => $fullname, 'email' => $email, 'phone' => $phone,'district' => $district,'city' => $city,'address' => $address, 'comment' => $message);    

print_r(httpPost($url, $data));

function httpPost($url, $data)
{
    $curl		 = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response	 = curl_exec($curl);
    curl_close($curl);
    return $response;
}

//header("Refresh: 5; url=/");
