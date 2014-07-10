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

function get_content($file,$url,$hours = 24,$fn = '',$fn_args = '') {

  $current_time = time(); $expire_time = $hours * 60 * 60; $file_time = filemtime($file);

  if(file_exists($file) && ($current_time - $expire_time < $file_time)) {

    return file_get_contents($file);

  } else {

    $content = get_url($url);
    if($fn) { 
      $content = $fn($content,$fn_args); 
    }
    
    $content.= '<!-- cached:  '.time().'-->';
    file_put_contents($file,$content);

    return $content;

  }

}

function get_url($url) {

  $curl = curl_init();
  curl_setopt($curl,CURLOPT_URL,$url);
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); 
  curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);
  $content = curl_exec($curl);
  curl_close($curl);

  return $content;

}