<?php

/**
* Timezone
* 
* http://www.php.net/manual/en/timezones.america.php
*
**/

date_default_timezone_set('America/Los_Angeles');

/**
* SEO & Analytics
* 
* Add Google Analytics and meta title/description
*
**/

$default_title = 'statusbot';
$default_description = 'A public facing status page built of the Uptime Robot API.';
$google_analytics = 'UA-xxxxxxxx-x';

/**
* Environments
*
* Fill out each set of environments along with fully qualified URLs for hassle free switching. Just add
* the env_local or env_staging empy file outside the public root.
*
**/

if ( file_exists( dirname( __FILE__ ) . '/env_local' ) ) {

  // Local Environment
  $environment = 'dev';
  $hostname = 'http://statusbot.dev';

} elseif ( file_exists( dirname( __FILE__ ) . '/env_staging' ) ) {

  // Staging Environment
  $environment = 'staging';
  $hostname = 'http://dev.statusbot.com';

} else {

  // Production Environment
  $environment = 'production';
  $hostname = 'http://statusbot.com';

}

/**
* Uptime Robot
*
* Sets the API and the custom URL for the call to uptime robot.
* Documentation: https://uptimerobot.com/api
*
**/

$api_args = array(
  'apiKey' => 'API_KEY',
  'customUptimeRatio' => '1-2-3-4-5',
  'responseTimes' => '1',
  'responseTimesAverage' => '180',
  // Do not change these arguments
  'noJsonCallback' => '1',
  'format' => 'json'
);
