<?php

require_once(__DIR__ . '/config.php');

function theTitle() {
  global $title, $default_title;
  if ($title) {
    return $title;
  } else {
    return $default_title;
  }
}

function theDescription() {
  global $description, $default_description;
  if ($description) {
    return $description;
  } else {
    return $default_description;
  }
}

function theAnalytics() {
  global $environment, $hostname, $google_analytics;
  if($environment === 'production') {
    $hostname = parse_url($hostname, PHP_URL_HOST);
    $analytics = "
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '$google_analytics', '$hostname');
        ga('send', 'pageview');

      </script>
    ";
    return $analytics;
  }
}

// $file = __DIR__.'/resonse.json';
// $url =

// $api_data = get_content(__DIR__ . 'response.json', )

function api_url($api) {

  $api_url = 'http://api.uptimerobot.com/getMonitors?';

  foreach($api as $key=>$value) {

    if(!isset($key) || $value == '') {

      unset($key);

    } else {

      $query[] = $key.'='.$value;

    }

  }

  $url = implode('&', $query);

  $api_url = $api_url . $url;

  return $api_url;

}

function get_monitors($file,$url,$min = 5) {

  $current_time = time(); 
  $expire_time = $min * 60;
  $data = array();

  if(file_exists($file)) {

    $file_time = filemtime($file);
    $data['time'] = $file_time;

  } else {

    $file_time = false;
    $data['time'] = $file_time;

  }

  if($file_time && ($current_time - $expire_time < $file_time)) {

    $data['response'] = file_get_contents($file);

  } else {

    $content = get_url($url);
    file_put_contents($file, $content);

    $data['response'] = $content;

  }

  return $data;

}

function get_url($url) {

  $curl = curl_init();
  curl_setopt($curl,CURLOPT_URL,$url);
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); 
  curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);
  $data = curl_exec($curl);
  curl_close($curl);

  return $data;

}

$file = __DIR__ . '/response.json';
$api_url = api_url($api_args);
$data = get_monitors($file, $api_url);

$monitor_response = json_decode($data['response'], true);
$monitor_response_time = isset($data['time']) ? $data['time'] : null;
