<?php
    unset($_SESSION['username']);
    unset($_SESSION['password']);

    echo '<script>window.location.href = "'. SITE .'index.php?page=home.php ";</script>';
?>