<?php

header('Content-Type: text/html; charset=utf-8');
$company_id	 = $COMPANY_ID;
$website_id	 = $WEBSITE_ID;
$order_status_id = $ORDER_STATUS_ID;

(isset($_POST['fullname'])) ? $fullname	 = $_POST['fullname'] : "Name Not Entered";
(isset($_POST['email'])) ? $email		 = $_POST['email'] : "E-mail Not Entered";
(isset($_POST['phone'])) ? $phone		 = $_POST['phone'] : "Phone Not Entered";  


$message = $MESSAGE_TEXT;

$url	 = 'http://kolaysatisyonetimi.com/Api/Order/add';
$data	 = array('company_id' => $company_id, 'website_id' => $website_id, 'order_status_id' => $order_status_id, 'fullname' => $fullname, 'email' => $email, 'phone' => $phone, 'comment' => $message);

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
