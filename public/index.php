<?php include_once('inc/header.php'); ?>

  <div class="container">
    <p class="updated">Updated: <?php echo date('D g:i a', $monitor_response_time); ?></p>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Server</th>
            <th><?php echo date('D m.d'); ?></th>
            <th><?php echo date('D m.d',strtotime("-1 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-2 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-3 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-4 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-5 days")); ?></th>
            </th>
          </tr>
        </thead>
        <tbody><?php

          $monitors = $monitor_response['monitors']['monitor'];

          foreach($monitors as $monitor) {

            // var_dump($monitor);

            echo '<tr>';
            echo '<th><a href="'.$monitor['url'].'" target="_blank">'.$monitor['friendlyname'].'</a></th>';
            echo '<th>'.($monitor['status'] === "2" ? '<i class="fa fa-check-circle"></i>' : '<i class="fa fa-times-circle').'<th>';
            echo '</tr>';

          } ?>

        </tbody>
      </table>
    </div>
  </div>

<?php include_once('inc/footer.php'); ?>
