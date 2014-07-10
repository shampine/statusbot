<?php
/**
*
* Basic configuration for lp-boilerplate. Currently sets environment && hostname.
*
**/

/**
* Defaults:
*
* Overwrite these default options below by calling the matching variable before the header include and
* defining it on your page template (e.g., $default_title => $title) to override the defaults on a per
* page basis, otherwise leave alone.
*
**/

$default_title = 'lp-boilerplate';
$default_description = 'A simple boilerplate with some cool things.';
$google_analytics = 'UA-xxxxxxxx-x';

/**
* Environments:
*
* Fill out each set of environments along with fully qualified URLs for hassle free switching. Just add
* the env_local or env_staging empy file outside the public root.
*
**/

if ( file_exists( dirname( __FILE__ ) . '/env_local' ) ) {

  // Local Environment
  $environment = 'dev';
  $hostname = 'http://example.dev';

} elseif ( file_exists( dirname( __FILE__ ) . '/env_staging' ) ) {

  // Staging Environment
  $environment = 'staging';
  $hostname = 'http://dev.example.com';

} else {

  // Production Environment
  $environment = 'production';
  $hostname = 'http://example.com';
}

/**
*
* No need to modify further unless you are planning to commit back changes to the boilerplate.
*
**/

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
?>
