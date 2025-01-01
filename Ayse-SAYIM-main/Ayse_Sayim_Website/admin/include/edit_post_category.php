<?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $selected_post_category = mysqli_fetch_assoc(get_selected_post_category($id));
        if (isset($_POST['edit_post_cat'])) {
            $cat = $_POST['category'];
            if (!empty($cat)) {
                if (edit_post_category($id, $cat)) {
                    $_SESSION['message'] = 'Başarıyla güncellendi';
                    $_SESSION['type'] = 'success';
                    echo '<script>window.location.href = "'. SITE .'index.php?page=post_categories.php ";</script>';
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
        <input type="text" name="category" id="category" class="form-control mb-3 mt-1" placeholder="Eklemek istediğiniz kategoriyi giriniz" value="<?=$selected_post_category['kategori']?>" >
        
        <input type="submit" name="edit_post_cat" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
</form>