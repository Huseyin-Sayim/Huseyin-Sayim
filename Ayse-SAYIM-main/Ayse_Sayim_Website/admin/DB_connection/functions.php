<?php
    function get_data() {
        include 'ayar.php';
        $query = 'SELECT * from settings';
        $result = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($result);
        return $data;
    };

    function get_contents() {
        include 'ayar.php';
        $query = 'SELECT * from contents';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function add_country($country_name) {
        include 'ayar.php';
        $query = "INSERT INTO ülkeler (ülke) VALUES ('$country_name')";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function get_country() {
        include 'ayar.php';
        $query = 'SELECT * from ülkeler';
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function get_books() {
        include 'ayar.php';
        $query = 'SELECT k.Id, k.kitap_adi, k.tarih, k.yazar_id, k.category_Id, y.isim , kk.kategori from kitaplar as k INNER JOIN yazarlar as y on k.yazar_id = y.Id INNER JOIN kitap_kategori as kk on k.category_id = kk.Id ORDER BY k.kitap_adi ASC';
        // $query = 'SELECT * from kitaplar';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_filter_book ($keyword) {
        include 'ayar.php';
        $query = "SELECT k.Id, k.kitap_adi, k.tarih, k.yazar_id, k.category_Id, y.isim , kk.kategori from kitaplar as k INNER JOIN yazarlar as y on k.yazar_id = y.Id INNER JOIN kitap_kategori as kk on k.category_id = kk.Id WHERE k.kitap_adi LIKE '%$keyword%' ORDER BY k.kitap_adi ASC";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_quotation() {
        include 'ayar.php';
        $query = 'SELECT a.Id, a.alıntı, a.kitap_id, k.kitap_adi from alıntılar a INNER JOIN kitaplar k on a.kitap_id = k.Id';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_writer() {
        include 'ayar.php';
        $query = 'SELECT y.Id, y.isim, y.ülke_id, u.ülke from yazarlar y INNER JOIN ülkeler u on y.ülke_id = u.Id ORDER BY y.isim ASC';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_filter_writer ($keyword) {
        include 'ayar.php';
        $query = "SELECT y.Id, y.isim, y.ülke_id, u.ülke from yazarlar y INNER JOIN ülkeler u on y.ülke_id = u.Id WHERE y.isim LIKE '%$keyword%' ORDER BY y.isim ASC";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_posts() {
        include 'ayar.php';
        $query = 'SELECT y.Id, y.metin, y.baslik, y.etiket_id, y.resim_1, y.resim_2, y.resim_3, y.yazı_tarih, yk.kategori from yazılarım y INNER JOIN yazı_kategori yk on y.etiket_id = yk.Id ORDER BY y.yazı_tarih DESC ';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_category() {
        include 'ayar.php';
        $query = 'SELECT * from kitap_kategori ORDER BY kategori ASC';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function add_book ($isim, $yazar, $inceleme_no_validate, $cat, $tarih, $puan, $resim_url, $okudum, $yarim, $okuyacagim) {
        include 'ayar.php';
        $inceleme = str_replace("'",'"', $inceleme_no_validate);
        $query = "INSERT INTO `kitaplar`(`kitap_adi`, `yazar_id`, `inceleme`, `category_Id`, `tarih`, `puan`, `resim`, `okudum`, `yarım`, `okuyacagım`) VALUES ('$isim', $yazar, '$inceleme', '$cat', '$tarih', '$puan', '$resim_url', '$okudum', $yarim, $okuyacagim)";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function add_writer($isim, $ulke_id, $resim) {
        include 'ayar.php';
        $query = "INSERT INTO `yazarlar`(`isim`, `ülke_id`, `yazar_resim`) VALUES ('$isim', '$ulke_id', '$resim')";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function eklenen_ulkeyi_getir($istenilen_ulke) {
        include 'ayar.php';
        $ulke = trim(strtoupper($istenilen_ulke));
        $query = "SELECT * from ülkeler WHERE ülke = '$ulke'";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_post_category () {
        include 'ayar.php';
        $query = "SELECT * from yazı_kategori ORDER BY kategori ASC";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function add_blog_post ($baslik, $yazi, $cat, $resim_1_url,  $resim_2_url, $resim_3_url ,$tarih) {
        include 'ayar.php';
        $query = "INSERT INTO `yazılarım`(`baslik`, `metin`, `etiket_Id`, `resim_1`, `resim_2`, `resim_3`, `yazı_tarih`) VALUES ('$baslik', '$yazi', '$cat', '$resim_1_url', '$resim_2_url', '$resim_3_url', '$tarih')";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_selected_writer ($id) {
        include 'ayar.php';
        $query = "SELECT * from yazarlar WHERE Id = $id ";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function add_book_category($category) {
        include 'ayar.php';
        $query = "INSERT INTO kitap_kategori(kategori) VALUES ('$category')";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function add_post_category($category) {
        include 'ayar.php';
        $query = "INSERT INTO yazı_kategori(kategori) VALUES ('$category')";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_selected_book($id) {
        include 'ayar.php';
        $query = "SELECT * from kitaplar WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function edit_book($id, $name, $writer, $desc, $cat, $date, $point, $image, $read, $half, $waiting ) {
        include 'ayar.php';
        $query = "UPDATE `kitaplar` SET `kitap_adi`='$name',`yazar_id`='$writer',`inceleme`='$desc',`category_Id`='$cat',`tarih`='$date',`puan`='$point',`resim`='$image',`okudum`='$read',`yarım`='$half',`okuyacagım`='$waiting' WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function delete_book($id) {
        include 'ayar.php';
        $query = "DELETE from kitaplar WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function delete_writer($id) {
        include 'ayar.php';
        $query = "DELETE from yazarlar WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_selected_country($id) {
        include 'ayar.php';
        $query = "SELECT * from ülkeler WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function  edit_writer($id, $name, $country, $image_url) {
        include 'ayar.php';
        $query = "UPDATE `yazarlar` SET `isim`='$name',`ülke_id`='$country',`yazar_resim`='$image_url' WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_selected_quotation($id) {
        include 'ayar.php';
        $query = "SELECT * from alıntılar WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function edit_quotation($id, $quotation, $book_id) {
        include 'ayar.php';
        $query = "UPDATE `alıntılar` SET `alıntı`='$quotation',`kitap_id`='$book_id' WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function delete_quotation($id) {
        include 'ayar.php';
        $query = "DELETE from alıntılar WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_selected_post($id) {
        include 'ayar.php';
        $query = "SELECT * from yazılarım WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function edit_post($id, $title, $text, $category_id, $date, $image_1_url, $image_2_url, $image_3_url) {
        include 'ayar.php';
        $query = "UPDATE `yazılarım` SET `baslik`='$title',`metin`='$text',`etiket_Id`='$category_id',`resim_1`='$image_1_url',`resim_2`='$image_2_url',`resim_3`='$image_3_url',`yazı_tarih`='$date' WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function delete_post($id) {
        include 'ayar.php';
        $query = "DELETE from yazılarım WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_selected_category($id) {
        include 'ayar.php';
        $query = "SELECT * from kitap_kategori WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_selected_post_category($id) {
        include 'ayar.php';
        $query = "SELECT * from yazı_kategori WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function edit_book_category($id, $cat) {
        include 'ayar.php';
        $query = "UPDATE kitap_kategori SET kategori = '$cat' WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function edit_post_category($id, $cat) {
        include 'ayar.php';
        $query = "UPDATE yazı_kategori SET kategori = '$cat' WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function delete_book_category($id) {
        include 'ayar.php';
        $query = "DELETE from kitap_kategori WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function delete_post_category($id) {
        include 'ayar.php';
        $query = "DELETE from yazı_kategori WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_admin() {
        include 'ayar.php';
        $query = "SELECT * from admin";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function add_last_book_cat() {
        include 'ayar.php';
        $query = "SELECT * from kitap_kategori ORDER BY Id DESC LIMIT 1";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function add_last_post_cat() {
        include 'ayar.php';
        $query = "SELECT * from yazı_kategori ORDER BY Id DESC LIMIT 1";
        $result = mysqli_query($connection, $query);
        return $result;
    };
?>