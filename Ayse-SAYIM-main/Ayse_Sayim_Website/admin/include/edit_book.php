<?php
    if ($_GET['id'] && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $selected_book = mysqli_fetch_assoc(get_selected_book($id));

        $error = '';
        $read = $half = $waiting = 0;

        if (isset($_POST['edit_book'])) {
            $name = $_POST['kitap_isim'];
            $writer =  $_POST['yazar'];
            $desc = str_replace("'", '"', $_POST['inceleme']);
            $cat = $_POST['kategori'];
            $date = $_POST['tarih'];
            $point = $_POST['puan'];
            $image = $_FILES['resim'];
            $situation = $_POST['durum'];

            //! Okunan kitap kısmı 

            if ($situation == 'okudum') {
                $read = 1;
            } else if ($situation == 'yarim') {
                $half = 1;
                if(empty($point)) {
                    $point = 0;
                };
                if (empty($desc)) {
                    $desc = 'Bu kitap hakkinda inceleme bulunmuyor.';
                };
            } else if ($situation == 'okuyacagim') {
                $waiting = 1;
                $point = 0;
                if (empty($date)) {
                    $date = null;
                };
                if (empty($desc)) {
                    $desc = 'Bu kitap hakkinda inceleme bulunmuyor.';
                };
            };

            

            //! Resmi 'img' klasörü içersine aktarma
            $file_name = $image['name'];
            $tmp_name = $image['tmp_name'];
            $myPath ='img/Kitap/'. $file_name;

            if (move_uploaded_file($tmp_name, $myPath)) {
                 $image_url = $image['name'];
            } else {
                $iamge_err = 'Resim aktarılırken bir hata oluştu.'. $image['error'];
            };

            if (empty($image_url)) {
                $image_url = $selected_book['resim'];
            };

            if (!empty($name) && !empty($writer) && !empty($desc) && !empty($cat) && !empty($image_url) && !empty($situation)){

                if (edit_book($id, $name, $writer, $desc, $cat, $date, $point, $image_url, $read, $half, $waiting)) {
                    $_SESSION['message'] = 'Başarıyla güncellendi';
                    $_SESSION['type'] = 'success';
                    echo '<script>window.location.href = "'. SITE .'index.php?page=kitaplar.php ";</script>';
                } else {
                    echo '<script>Swal.fire("Hata", "Bir hata oluştu", "error"); </script>';
                };
            } else {
                echo '<script>Swal.fire("Hata", "Boş alanlar var", "error"); </script>';
            };


        };
    };

    
    
?>

<div class="card card-primary col-md-8 mx-auto my-5">
              <div class="card-header">
                <h3 class="card-title">Kitap Düzenle</h3>
              </div>
            <form role="form" action="#" method="POST" enctype="multipart/form-data" class="ml-5 pl-5">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kitap_isim">Kitap Adı</label>
                    <input type="text" class="form-control" id="kitap_isim" name="kitap_isim" placeholder="Enter book name" value="<?=$selected_book['kitap_adi']?>">
                  </div>
                  <div class="form-group">
                    <label for="yazar"></label>
                    <select name="yazar" id="yazar" class="form-control">
                        <option value=""disabled>Yazar Seciniz</option>
                            <?php $yazarlar = get_writer(); while ($writer = mysqli_fetch_assoc($yazarlar)): ?>
                                <?php if ($writer['Id'] == $selected_book['yazar_id']): ?>
                                    <option value="<?php echo $writer['Id']; ?>" selected >
                                        <?php echo $writer['isim']; ?>
                                    </option>
                                <?php else: ?>
                                    <option value="<?php echo $writer['Id']; ?>">
                                        <?php echo $writer['isim']; ?>
                                    </option>
                                <?php endif; ?>
                        <?php endwhile; ?>
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label for="inceleme">İnceleme</label>
                    <textarea name="inceleme" id="inceleme" class="form-control" placeholder="Enter text">
                        <?=$selected_book['inceleme']?>
                    </textarea>
                  </div>

                  <div class="form-group">
                    <label for="kategori"></label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="" disabled >Kategori Seciniz</option>
                        <?php $kategoriler = get_category(); while ($kategori = mysqli_fetch_assoc($kategoriler)): ?>
                            <?php if ($kategori['Id'] == $selected_book['category_Id']): ?>
                                <option value="<?php echo $kategori['Id']; ?>" selected >
                                    <?php echo $kategori['kategori']; ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $kategori['Id']; ?>">
                                    <?php echo $kategori['kategori']; ?>
                                </option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </select>
                        
                  </div>

                  <div class="form-group">
                    <label for="tarih">Tarih</label>
                    <input type="date" class="form-control" id="tarih" name="tarih" value="<?=$selected_book['tarih'];?>">
                  </div>

                  <div class="form-group">
                    <label for="puan">Puan</label>
                    <input type="number" class="form-control" id="puan" name="puan"
                    placeholder="Kitaba puan veriniz" value="<?=$selected_book['puan'];?>">
                  </div>

                  <div class="form-group">
                    <label for="resim">Resim Seciniz</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="resim" name="resim" value="<?=$selected_book['resim'];?>">
                        <label class="custom-file-label" for="resim">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 border p-2">

                    <legend>Kitap Durumu</legend>
                    <input type="radio" name="durum" id="okudum" value="okudum" <?php if ($selected_book['okudum'] == 1) {echo 'checked';} ?>>
                    <label for="okudum" class="me-3">Okudum</label>

                    <input type="radio" name="durum" id="yarim" value="yarim" <?php if ($selected_book['yarım'] == 1) {echo 'checked';} ?>>
                    <label for="yarim" class="me-3">Yarım</label>

                    <input type="radio" name="durum" id="okuyacagim" value="okuyacagim" <?php if ($selected_book['okuyacagım'] == 1) {echo 'checked';} ?>>
                    <label for="okuyacagim" class="me-3">Okuyacagğım</label>
                </div>

                <div class="card-footer">
                  <button type="submit" name="edit_book" class="btn btn-primary w-100">Ekle</button>
                </div>
            </form>
        </div>