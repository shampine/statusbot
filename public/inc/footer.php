<?php

  if ($environment === 'dev') {
   echo "<script src='http://localhost:3000/socket.io/socket.io.js'></script>";
   echo "<script src='http://localhost:3001/browser-sync-client.min.js'></script>";
  } ?>

  </body>
</html>