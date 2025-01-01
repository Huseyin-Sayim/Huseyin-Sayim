<?php
    include '../libs/functions.php';
    if (isset($_POST['key'])) {
        $keyword = $_POST['key'];
        if (!empty($keyword)) {
            $yazarlar = get_filter_writer($keyword);
            ob_start();
            include 'writer_data.php';
            echo json_encode(["html" => ob_get_clean(), "key" => $keyword]);
            die;
        } else {
            $yazarlar = get_writer();
            
            ob_start();
            include 'writer_data.php';
            echo json_encode(["html" => [ob_get_clean()], "key" => $keyword]);
            die;
        };
    };
?>