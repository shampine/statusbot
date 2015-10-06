<?php include_once('inc/header.php'); ?>

  <div class="container">
    <h1>Statusb<i class="fa fa-check-circle"></i>t</h1>
    <p class="updated animated flash">Updated: <?php echo date('D g:i a', $monitor_response_time); ?></p>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr class="animated fadeInUp">
            <th>Server</th>
            <th>Current Status</th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-12 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-36 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-60 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-84 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-108 hours")); ?></th>
            </th>
          </tr>
        </thead>
        <tbody><?php

          foreach($servers as $server) {

            echo '<tr>';
            echo '<th class="animated flipInX">'.$server['friendlyname'].'</th>';
            echo '<th class="animated flipInX">'.($server['status'] === "2" ? '<i class="fa fa-check-circle"></i> Online' : '<i class="fa fa-times-circle"></i> Offline').'</th>';

            foreach($server["ratios"] as $ratio) {
              echo '<th class="hidden-xs animated flipInX">';

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
          <tr class="animated fadeInUp">
            <th>Site</th>
            <th>Current Status</th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-12 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-36 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-60 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-84 hours")); ?></th>
            <th class="hidden-xs"><?php echo date('D m.d',strtotime("-108 hours")); ?></th>
            </th>
          </tr>
        </thead>
        <tbody><?php

          foreach($sites as $site) {

            echo '<tr>';
            echo '<th class="animated flipInX"><a href="'.$site['url'].'" target="_blank">'.$site['friendlyname'].'</a></th>';
            echo '<th class="animated flipInX">'.($site['status'] === "2" ? '<i class="fa fa-check-circle"></i> Online' : '<i class="fa fa-times-circle"></i> Offline').'</th>';

            foreach($site["ratios"] as $ratio) {
              echo '<th class="hidden-xs animated flipInX">';

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
