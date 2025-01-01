<?php  
    $title = $text = $category_id = $date = $image_1 = $image_2 = $image_3 = '';
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $selected_post = mysqli_fetch_assoc(get_selected_post($id));
        if (isset($_POST['edit_post'])) {
            $title = $_POST['baslik'];
            $text = str_replace("'",'"',$_POST['yazi']);
            $category_id = $_POST['cat'];
            $date = $_POST['tarih'];
            $image_1 = $_FILES['resim_1'];
            $image_2 = $_FILES['resim_2'];
            $image_3 = $_FILES['resim_3'];
            
            if (!empty($image_1)) {
                $name_1 = $image_1['name'];
                $tmp_1 = $image_1['tmp_name'];
                $my_path_1 = 'img/yazı/'. $name_1;
                if (move_uploaded_file($tmp_1 , $my_path_1)) {
                    $image_1_url = $image_1['name'];
                } else {
                    $image_err = '1. resim dosyaya aktarılamadı' . '<br>' ;
                };
            };

            if (!empty($image_2)) {
                $name_2 = $image_2['name'];
                $tmp_2 = $image_2['tmp_name'];
                $my_path_2 = 'img/yazı/'. $name_2;
                if (move_uploaded_file($tmp_2 , $my_path_2)) {
                    $image_2_url = $image_2['name'];
                } else {
                    $image_err .= '2.resim dosyaya aktarılamadı' . '<br>' ;
                };
            };

            if (!empty($image_3)) {
                $name_3 = $image_3['name'];
                $tmp_3 = $image_3['tmp_name'];
                $my_path_3 = 'img/yazı/'. $name_3;
                if (move_uploaded_file($tmp_3 , $my_path_3)) {
                    $image_3_url = $image_3['name'];
                } else {
                    $image_err .= '3. resim dosyaya aktarılamadı';
                };
            };

            if (empty($image_1_url)) {
                $image_1_url = $selected_post['resim_1'];
            };

            if (empty($image_2_url)) {
                $image_2_url = $selected_post['resim_2'];
            };

            if (empty($image_3_url)) {
                $image_3_url = $selected_post['resim_3'];
            };

            if (!empty($title) && !empty($text) && !empty($category_id) && !empty($date)) {
                if (edit_post($id, $title, $text, $category_id, $date, $image_1_url, $image_2_url, $image_3_url)) {
                    $_SESSION['message'] = 'Başarıyla güncellendi';
                    $_SESSION['type'] = 'success';
                    echo '<script>window.location.href = "'. SITE .'index.php?page=yazılar.php ";</script>';
                } else {
                    echo '<script>Swal.fire("Hata", "Bir hata oluştu", "error"); </script>';
                };
            } else {
                echo '<script>Swal.fire("Hata", "Boş alanlar var", "error"); </script>';
            };
        
        };
    };
?>
    <div class="container">
        <form action="#" method="POST" class="w-75 mx-auto my-5" enctype="multipart/form-data">
            <label for="baslik">Yazı Başlığınızı Giriniz</label>
            <input type="text" name="baslik" id="baslik" class="form-control mb-3 mt-1" placeholder="Baslik giriniz" value="<?=$selected_post['baslik']?>">
            <label for="yazi">Yazınızı Giriniz</label>
            <textarea name="yazi" id="yazi" class="form-control mb-3 mt-1" placeholder="Yazı metninizi giriniz" ><?=$selected_post['metin']?></textarea>
            <label for="cat">Yazı Kategorisini Seciniz</label>
            <select name="cat" class="form-control mb-3 mt-1" id="cat">
                <option value="" disabled > Yazdığınız yazının kategorisini seçiniz</option>
                <?php $kategoriler = get_post_category(); while ($kategori = mysqli_fetch_assoc($kategoriler)): ?>
                    <?php if ($selected_post['etiket_id'] == $kategori['Id']): ?>
                        <option value="<?php echo $kategori['Id']; ?>" selected>
                            <?php echo $kategori['kategori']; ?>
                        </option>
                    <?php else: ?>
                        <option value="<?php echo $kategori['Id']; ?>">
                            <?php echo $kategori['kategori']; ?>
                        </option>
                    <?php endif; ?>
                <?php endwhile; ?>
            </select>

            <label for="tarih">Tarih Giriniz</label>
            <input type="date" name="tarih" id="tarih" class="form-control mb-3 mt-1" placeholder="Baslik giriniz" value="<?=$selected_post['yazı_tarih']?>">

            <div class="resimler border p-3 mb-3">
                <h5>Resimleri Sırayla Seçiniz</h5>
                <input type="file" name="resim_1" id="resim_1" class="form-control my-3">
                <input type="file" name="resim_2" id="resim_2" class="form-control my-3">
                <input type="file" name="resim_3" id="resim_3" class="form-control my-3">
                <div class="alert alert-danger fs-5 p-2 my-3">Resim seçmek zorunlu değildir !!!!</div>
            </div>

            <input type="submit" name="edit_post" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
        </form>
    </div>