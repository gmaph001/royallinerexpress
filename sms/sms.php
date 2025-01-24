<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://control.msg91.com/api/v5/flow/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'template_id' => 'EntertemplateID',
    'sender' => 'EnterSenderID',
    'short_url' => '1 (On) or 0 (Off)',
    'mobiles' => '919XXXXXXXXX',
    'VAR1' => 'VALUE 1',
    'VAR2' => 'VALUE 2'
  ]),
  CURLOPT_HTTPHEADER => [
    "Authkey: <authkey>",
    "accept: application/json",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}