<?php  

    // function get_books() {
    //     include 'ayar.php';
    //     $query = 'SELECT * from kitaplar INNER JOIN yazarlar ON kitaplar.yazar_id = yazarlar.Id ';
    //     $result = mysqli_query($connection, $query);
    //     mysqli_close($connection);
    //     return $result;
    // };

    function kitaplari_getir() {
        include 'ayar.php';
        $query = 'SELECT * from kitaplar ORDER BY tarih DESC';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function id_kitap_getir($id) {
        include 'ayar.php';
        $query = "SELECT * from kitaplar WHERE yazar_id = '$id' ";
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_writer() {
        include 'ayar.php';
        $query = 'SELECT * from yazarlar ORDER BY isim ASC ';
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function okunan_kitap_sayisi() {
        include 'ayar.php';
        $query = 'SELECT * FROM `kitaplar` WHERE `okudum`=1';
        $result = mysqli_query($connection, $query);
        $sonuc = mysqli_num_rows($result);
        mysqli_close($connection);
        return $sonuc;
    };

    function yarim_kitap_sayisi() {
        include 'ayar.php';
        $query = 'SELECT * FROM `kitaplar` WHERE `yarım`=1';
        $result = mysqli_query($connection, $query);
        $sonuc = mysqli_num_rows($result);
        mysqli_close($connection);
        return $sonuc;
    };

    function okunacak_kitap_sayisi() {
        include 'ayar.php';
        $query = 'SELECT * FROM `kitaplar` WHERE `okuyacagım`=1';
        $result = mysqli_query($connection, $query);
        $sonuc = mysqli_num_rows($result);
        mysqli_close($connection);
        return $sonuc;
    };

    function get_categories() {
        include 'ayar.php';
        $query = 'SELECT * from kitap_kategori';
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function get_book_filter ($k_isim, $yazar_id, $cat_id) {
        include 'ayar.php';
        $query = "";
        if (!empty($yazar_id)) {
            $query = "SELECT k.Id, k.kitap_adi, k.yazar_id, k.resim, k.okudum, k.yarım, k.okuyacagım, y.isim, y.ülke_id FROM `kitaplar` as k INNER JOIN `yazarlar` as y ON k.yazar_id = y.Id WHERE k.yazar_id = $yazar_id";
        } else {
            $query = "SELECT k.Id, k.kitap_adi, k.yazar_id, k.resim, k.okudum, k.yarım, k.okuyacagım, y.isim, y.ülke_id FROM `kitaplar` as k INNER JOIN `yazarlar` as y ON k.yazar_id = y.Id WHERE 1";
        }

        if (!empty($cat_id)) {
            $query .= " AND y.ülke_id  = $cat_id ";
        };

        if (!empty($k_isim)) {
            $query .= " AND kitap_adi LIKE '%$k_isim%' OR isim LIKE '%$k_isim%' ";
        };

        $result = mysqli_query($connection, $query);
        
        mysqli_close($connection);
        return $result;
    };

    function get_last_book() {
        include 'ayar.php';
        $query = 'SELECT * from kitaplar WHERE okudum = 1 ORDER BY tarih DESC LIMIT 1 ';
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function alintilari_getir() {
        include 'ayar.php';
        $query = 'SELECT * from alıntılar a INNER JOIN kitaplar k on a.kitap_id = k.Id';
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function yazi_kategori() {
        include 'ayar.php';
        $query = 'SELECT * from yazı_kategori';
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function yazi_getir() {
        include 'ayar.php';
        $query = 'SELECT y.Id, y.baslik, y.metin, y.resim_1, y.resim_2, y.resim_3 , y.yazı_tarih, yk.kategori  from yazılarım y INNER JOIN yazı_kategori yk ON y.etiket_Id = yk.Id ORDER BY y.yazı_tarih DESC ';
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function filter_alinti_getir($keyword) {
        include 'ayar.php';
        $query = "SELECT * from alıntılar a INNER JOIN kitaplar k on a.kitap_id = k.Id";
        if (!empty($keyword)) {
            $query .= " WHERE kitap_adi like '%$keyword%'";
        };
        $result = mysqli_query($connection, $query);
        return $result;
    };

    function get_book_by_Id ($id) {
        include 'ayar.php';
        $query = "SELECT k.Id, k.yazar_id, k.kitap_adi, k.inceleme, k.tarih, k.puan, k.resim, k.okudum, k.yarım, k.okuyacagım, y.isim, y.yazar_resim, kk.kategori FROM `kitap_kategori` as kk INNER JOIN `kitaplar` as k ON kk.Id = k.catregory_Id INNER JOIN `yazarlar` as y ON k.yazar_id = y.Id WHERE k.Id = '$id'";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function get_writer_by_id ($id) {
        include 'ayar.php';
        $query = "SELECT * from yazarlar as y INNER JOIN ülkeler ü on y.ülke_id = ü.Id WHERE y.Id = $id ";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function secilen_yaziyi_getir($id) {
        include 'ayar.php';
        $query = "SELECT * from yazılarım WHERE Id = $id ";
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

    function add_country($country_name) {
        include 'ayar.php';
        $query = "INSERT INTO ülkeler (ülke) VALUES ('$country_name')";
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

    function get_book_by_yazar_id($id) {
        include 'ayar.php';
        $query = "SELECT * from kitaplar WHERE yazar_id = $id ";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

    function add_book ($isim, $yazar, $inceleme_no_validate, $cat, $tarih, $puan, $resim_url, $okudum, $yarim, $okuyacagim) {
        include 'ayar.php';
        $inceleme = str_replace("'",'"', $inceleme_no_validate);
        $query = "INSERT INTO `kitaplar`(`kitap_adi`, `yazar_id`, `inceleme`, `catregory_Id`, `tarih`, `puan`, `resim`, `okudum`, `yarım`, `okuyacagım`) VALUES ('$isim', '$yazar', '$inceleme', '$cat', '$tarih', '$puan', '$resim_url', '$okudum', '$yarim', '$okuyacagim')";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    };

?>