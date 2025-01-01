<?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $selected_quotation = mysqli_fetch_assoc(get_selected_quotation($id));
        $selected_quotation_book = mysqli_fetch_assoc(get_selected_book($selected_quotation['kitap_id']));

        if (isset($_POST['edit_quotation'])) {
            $quotation = str_replace("'", '"', $_POST['alinti']);
            $book_id = $_POST['kitap_adi'];
            if (!empty($quotation) && !empty($book_id)) {
                if (edit_quotation($id, $quotation, $book_id)) {
                    $_SESSION['message'] = 'Başarıyla güncellendi';
                    $_SESSION['type'] = 'success';
                    echo '<script>window.location.href = "'. SITE .'index.php?page=alıntılar.php ";</script>';
                } else {
                    echo '<script>Swal.fire("Hata", "Bir hata oluştu", "error"); </script>';
                };
            } else {
                echo '<script>Swal.fire("Hata", "Boş alanlar var", "error"); </script>';
            };
        };
    };

?>   
    
    <form action="#" method="POST" class="w-50 mx-auto my-5">
        <label for="alinti">Alıntı Giriniz</label>
        <textarea name="alinti" id="alinti" class="form-control mb-3 mt-1" placeholder="Yaptığınız alıntıyı giriniz" ><?=$selected_quotation['alıntı']?></textarea>
        <label for="kitap_adi">Kitap Seciniz</label>
        <select name="kitap_adi" class="form-control mb-3 mt-1" id="kitap_adi">
            <option value="" disabled > Alıntı Yaptığınız Kitabı seciniz</option>
            <?php $kitaplar = get_books(); while ($kitap = mysqli_fetch_assoc($kitaplar)): ?>
                <?php if ($kitap['Id'] == $selected_quotation_book['Id']): ?>
                    <option value="<?php echo $kitap['Id']; ?>" selected>
                        <?php echo $kitap['kitap_adi']; ?>
                    </option>
                <?php else: ?>
                    <option value="<?php echo $kitap['Id']; ?>">
                        <?php echo $kitap['kitap_adi']; ?>
                    </option>
                <?php endif; ?>
            <?php endwhile; ?>
        </select>
        <input type="submit" name="edit_quotation" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
    </form>