<?php include_once('inc/header.php'); ?>

  <div class="container">
    <p class="updated">Updated: <?php echo date('D g:i a', $monitor_response_time); ?></p>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Server</th>
            <th>Current Status</th>
            <th><?php echo date('D m.d',strtotime("-1 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-2 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-3 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-4 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-5 days")); ?></th>
            </th>
          </tr>
        </thead>
        <tbody><?php

          foreach($servers as $server) {

            echo '<tr>';
            echo '<th>'.$server['friendlyname'].'</th>';
            echo '<th>'.($server['status'] === "2" ? '<i class="fa fa-check-circle"></i> Online' : '<i class="fa fa-times-circle"></i> Offline').'</th>';

            foreach($server["ratios"] as $ratio) {
              echo '<th>';

              if($ratio === 'green') {

                echo '<i class="fa fa-check-circle"></i>';

              } elseif ($ratio === 'yellow') {

                echo '<i class="fa fa-minus-circle"></i>';

              } else {

                echo '<i class="fa fa-times-circle"></i>';

              }

              echo '</th>';

            }

            echo '</tr>';

          } ?>

        </tbody>
      </table>

    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Site</th>
            <th>Current Status</th>
            <th><?php echo date('D m.d',strtotime("-1 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-2 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-3 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-4 days")); ?></th>
            <th><?php echo date('D m.d',strtotime("-5 days")); ?></th>
            </th>
          </tr>
        </thead>
        <tbody><?php

          foreach($sites as $site) {

            echo '<tr>';
            echo '<th><a href="'.$site['url'].'" target="_blank">'.$site['friendlyname'].'</a></th>';
            echo '<th>'.($site['status'] === "2" ? '<i class="fa fa-check-circle"></i> Online' : '<i class="fa fa-times-circle"></i> Offline').'</th>';

            foreach($site["ratios"] as $ratio) {
              echo '<th>';

              if($ratio === 'green') {

                echo '<i class="fa fa-check-circle"></i>';

              } elseif ($ratio === 'yellow') {

                echo '<i class="fa fa-minus-circle"></i>';

              } else {

                echo '<i class="fa fa-times-circle"></i>';

              }

              echo '</th>';

            }

            echo '</tr>';

          } ?>

        </tbody>
      </table>

    </div>
  </div>

<?php include_once('inc/footer.php'); ?>
