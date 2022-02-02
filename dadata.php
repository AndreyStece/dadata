<?php

require __DIR__.'/vendor/autoload.php';

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  if (isset($_POST["ip_address"]) || isset($_POST["city_address"])) {
    $token = "3c65be65167a55d68711a83169ca31756926143b";
    $secret = "ee10ba942f71c2cd3a2f0a501f40d0e745826ca4";
    $dadata = new \Dadata\DadataClient($token, $secret);
    if (isset($_POST["ip_address"])) {
      try {
        $response = $dadata->iplocate($_POST["ip_address"]);
        if (!$response) {
          throw new Exception('Ошибка: Неверный формат IP');
        }
        else {
          echo $response["unrestricted_value"];
        }
      } catch (Exception $e) {
        echo "Ошибка: Неверный формат IP";
        return;
      }
    }
  }
  if (isset($_POST["city_address"])) {
    $response = $dadata->suggest("address", $_POST["city_address"]);
    $arr = array();
    foreach ($response as $el) {
      foreach ($el as $it) {
        array_push($arr, $it);
        break;
      }
    }
    echo json_encode($arr);
    return;
  }
}
