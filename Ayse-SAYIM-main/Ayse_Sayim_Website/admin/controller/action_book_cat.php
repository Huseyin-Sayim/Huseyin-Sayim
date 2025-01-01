<?php
    session_start();
    include '../DB_connection/functions.php';
    include '../DB_connection/ayar.php';
    define('SITE', get_data()['url']);

if(isset($_POST["book_category_name"])){
  $category = $_POST["book_category_name"];

  $cats = get_category();
  while (($cat = mysqli_fetch_assoc($cats))) {
      if (trim(strtolower($cat['kategori'])) == trim(strtolower($category))) {
          $match = 'match found';
      };
  };
  if (!empty($match)) {
      echo json_encode(["result" => false,"message" =>"Found data"]);
      die();
  } else {
      if (add_book_category($category)) {
        if ($category = mysqli_fetch_assoc(add_last_book_cat())) {
            ob_start();
            include 'book_table_data.php';
            echo json_encode(["result" => true,"message" =>"Data added", "html" => ob_get_clean()]);
            die();
        };
      };
  };
}

?>