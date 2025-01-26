<?php
    session_start();
    session_destroy();
    setcookie("cookie_logado", 1, time()-10, "/");
    header("Location: ../homepage.php?msg=3");
?>