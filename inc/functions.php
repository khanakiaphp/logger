<?php

function getFinalData()
{
  global $kuid;
  return array(
    "Server" => getServerParams(),
    "Request" => $_REQUEST,
    "uid" => $kuid
  );
}

function getServerParams()
{
  return array(
    "REQUEST_URI" => $_SERVER['REQUEST_URI'],
    "REQUEST_METHOD" => $_SERVER['REQUEST_METHOD'],
    "IP" => get_client_ip(),
    'php_version' => phpversion()
  );
}

function getRequestHeaders()
{
  $headers = array();
  foreach ($_SERVER as $key => $value) {
    if (substr($key, 0, 5) <> 'HTTP_') {
      continue;
    }
    $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
    $headers[$header] = $value;
  }
  return $headers;
}

function get_client_ip()
{
  $ipaddress = '';
  if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP') . ' - ' . 'HTTP_CLIENT_IP';
  else if (getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR') . ' - ' . 'HTTP_X_FORWARDED_FOR';
  else if (getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED') . ' - ' . 'HTTP_X_FORWARDED';
  else if (getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR') . ' - ' . 'HTTP_FORWARDED_FOR';
  else if (getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED') . ' - ' . 'HTTP_FORWARDED';
  else if (getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR') . ' - ' . 'REMOTE_ADDR';
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}