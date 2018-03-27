<?php
// delete session, destory sesion variables
session_start();
session_unset();
session_destroy();
session_write_close();

// redirect to index page
echo "Redirecting in 1 second..";
header("refresh:1; url=index.php");

?>
