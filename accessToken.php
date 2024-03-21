<?php
//YOU MPESA API KEYS
$consumerKey = "yk8HeBf6A74rZ7BZ1jZT6WYLG9agLWXGfsE4BQWOG40ehj0k";
$consumerSecret = "jicwGsWAYLAac0Ab0zAAp0Lr2i3BwDpATv3ISNe92bRk4N2l3I1fAU22jYlCFuTt";
//ACCESS TOKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
$access_token = $result->access_token;
curl_close($curl);


