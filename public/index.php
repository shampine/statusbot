<?php

  // Example description & title
  $description = "This is my description";
  $title = "Home Page";

  include_once('inc/header.php');

?>

<section class="container">
  <article class="col-xs-6">
    <h1>lp-boilerplate</h1>
    <p>
      Environment: <?php echo $environment; ?><br />
      Hostname: <?php echo $hostname; ?><br />
      Site Title: <?php echo $default_title; ?><br />
      Site Description: <?php echo $default_description; ?><br />
    </p>
  </article>
<section>

<?php include_once('inc/footer.php'); ?>
