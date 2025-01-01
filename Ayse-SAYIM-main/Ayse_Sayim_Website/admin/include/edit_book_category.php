<?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $selected_book_category = mysqli_fetch_assoc(get_selected_category($id));
        if (isset($_POST['edit_book_cat'])) {
            $cat = $_POST['category'];
            if (!empty($cat)) {
                if (edit_book_category($id, $cat)) {
                    $_SESSION['message'] = 'Başarıyla güncellendi';
                    $_SESSION['type'] = 'success';
                    echo '<script>window.location.href = "'. SITE .'index.php?page=book_categories.php ";</script>';
                } else {
                    echo '<script>Swal.fire("Hata", "Bir hata oluştu", "error"); </script>';
                };
            } else {
                echo '<script>Swal.fire("Hata", "Kategori boş bırakılamaz", "error"); </script>';
            }
        };
    };
?>

<form action="#" method="POST" class="w-50 mx-auto my-5">
        <label for="category">Kategori Giriniz</label>
        <input type="text" name="category" id="category" class="form-control mb-3 mt-1" placeholder="Eklemek istediğiniz kategoriyi giriniz" value="<?=$selected_book_category['kategori']?>" >
        
        <input type="submit" name="edit_book_cat" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
</form>