    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script src="js/main.js"></script><?php

    if ($environment === 'dev') {
     echo "<script src='http://localhost:3000/socket.io/socket.io.js'></script>";
     echo "<script src='http://localhost:3001/browser-sync-client.min.js'></script>";
    } ?>

  </body>
</html>