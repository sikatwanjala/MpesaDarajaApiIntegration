<?php

header("Content-Type:application/json");


$env = "sandbox";
$type = 4;
$shortcode = '600988';
$conumerKey = "yk8HeBf6A74rZ7BZ1jZT6WYLG9agLWXGfsE4BQWOG40ehj0k";
$consumersecret = "jicwGsWAYLAac0Ab0zAAp0Lr2i3BwDpATv3ISNe92bRk4N2l3I1fAU22jYlCFuTt";
$initiatorName = "testapi";//not sure
$initiatroPassword = "Safaricom978!";//not sure
$result_url = "https://mydomain.com/TransactionStatus/queue/"; //not sure
$timeout_url = "http://mydomain.com/TransactionStatus/queue/"; //not sure

//ENSURING THAT TRANSACTIONS ARE ENTERED
// if(!isset($_GET["transactionID"])){
//     echo"Technical error";
//     exit();
// }

//TRANSACTION CODE VALIDATION
 $transactionID = $_GET["transactionID"];
 //TRANSACTION ID = "SCI3GKTQA7"
 $command = "TransactionStatusQuery";
 $remarks = "Transaction satatus Query";
 $occasion = "Transaction status Query";
 $callback = null;
 
 $access_token = ($env == "live") ? "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials" : "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
 $credentails = base64_encode($conumerKey . ':' .$consumersecret);
 $ch = curl_init($access_token);
 curl_setopt($ch,  CURLOPT_HTTPHEADER, ["Authorization: Basic ". $credentials]);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $responce =curl_exec($ch);
 curl_close($ch);
 $result = json_decode($responce);

 $token = isset($result->{'access_token'}) ? $result ->{'access_token'} : "N/A";
 $publicKey = file_get_contents(__DIR__."/mpesa_public_cert.cer");
 $isvalid = openssl_public_encrypt($initiatorPassword, $encrypted, $publicKey, OPENSSL_PKCS1_PADDING);
 $password = base64_decode($encrypted);

 //echom$token

 $curl_post_data = array(
    "Initiattor" => $initiatorName,
    "SecurityCredentialls" => $password,
    "commandID" => $transactionID,
    "partyA"   => $shortcode,
    "IdentifierType"  => $type,
    "ResultURL"     =>  $result_url,
    "QueueTimeoutURL" => $timeout_url,
    "Remarks"    => $remarks,
    "Occasion"     => $occasion,
 );
 $data_string = json_encode($curl_post_data);
 //ECHO $DATA_STRING
 $endpoint =($env == "live") ? "https://api.safaricom.co.ke/mpesa/transactionstatus/v1/query":"https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query";

 $ch2 = curl_init($endpoint);
 curl_setopt($ch2, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token, 'Content-Type: application/json']);
 curl_setopt($ch2, CURLOPT_POST, 1);
 curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_string);
 curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
 $responce = curl_exec($ch2);
 curl_close($ch2);

 //echo "Authorization: ".$respoce

 $result = json_decode($responce);
 $verified = $result->{'ResponceCode'};
 if($verified === "0"){
    echo "Transaction verified as TRUE";

 }else{
    echo "Transaction doesnt exist";
 }






// Body

//   {
//     "BusinessShortCode": 174379,
//     "Password": "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjQwMzE5MDAzNDA4",
//     "Timestamp": "20240319003408",
//     "TransactionType": "CustomerPayBillOnline",
//     "Amount": 1,
//     "PartyA": 254708374149,
//     "PartyB": 174379,
//     "PhoneNumber": 254706599924,
//     "CallBackURL": "https://mydomain.com/path",
//     "AccountReference": "CompanyXLTD",
//     "TransactionDesc": "Payment of X" 
//   }
?>