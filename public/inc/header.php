<?php include_once('../functions.php'); ?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo theTitle(); ?></title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <meta name="description" content="<?php echo theDescription(); ?>"><?php
    // Cache buster for stylesheet
    $stylesheet = 'style/screen.css?' . filemtime('style/screen.css'); ?>
    <link rel="stylesheet" href="<?php echo $stylesheet; ?>">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script type='text/javascript' src='js/modernizr.js'></script>
    <?php echo theAnalytics(); ?>
  </head>
  <body>
