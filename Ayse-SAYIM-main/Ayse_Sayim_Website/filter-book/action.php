<?php 
    include '../libs/functions.php';
    if (isset($_POST['wrtId'])) {
        $writerId = $_POST['wrtId'];
        if (!empty($writerId)) {
            $kitaplar = get_book_by_writerId($writerId);
            if (mysqli_num_rows($kitaplar) > 0 ) {
                ob_start();
                include 'filterData.php';
                echo json_encode(["result" => true, "html" => ob_get_clean()]);
            } else {
                $alert = '<div
                    class="alert alert-danger"
                    role="alert">
                    <p>Sayfyamda bu yazarın kitabı bulunmuyor.</p>
                </div>';
                echo json_encode(["result" => true, "html" => $alert]); 
            };
        };
    };
?>