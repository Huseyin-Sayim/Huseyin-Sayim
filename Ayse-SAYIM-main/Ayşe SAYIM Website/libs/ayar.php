<?php 
    $server = 'localhost';
    $server_username = 'root';
    $password = '';
    $database = 'ayse_sayim';

    $connection = mysqli_connect($server, $server_username, $password, $database);

    mysqli_set_charset($connection, 'UTF8');

    if (mysqli_connect_errno() > 0) {
        die ('Error'. mysqli_connect_errno());
    };

?>