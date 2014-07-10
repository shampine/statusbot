<?php include_once('inc/header.php'); ?>

  <div class="container">
    <p><?php echo date('D g:i a', $monitor_response_time); ?></p>
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
        <tbody>

        </tbody>
      </table>
    </div>
  </div>

<?php include_once('inc/footer.php'); ?>
