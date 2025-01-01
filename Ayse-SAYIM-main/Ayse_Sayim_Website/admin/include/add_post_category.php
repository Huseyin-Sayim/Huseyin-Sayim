<?php
    $category = '';
    $category_err = $added_success = '';
    if (isset($_POST['add_post_cat']) && !empty($_POST['post_category'])) {
        $category = $_POST['post_category'];
        $cats = get_post_category();
        while (($cat = mysqli_fetch_assoc($cats))) {
            if (trim(strtolower($cat['kategori'])) == trim(strtolower($category))) {
                $match = 'match found';
            };
        };
        if (!empty($match)) {
            $_SESSION['message'] = 'Aynısından ekleyemezsiniz';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=add_post_category.php ";</script>';
        } else {
            if (add_post_category($category)) {
                $_SESSION['message'] = 'Başarıyla eklendi';
                $_SESSION['type'] = 'success';
               echo '<script>window.location.href = "'. SITE .'index.php?page=post_categories.php ";</script>';
            };
        };
    } else {
        $category_err = 'Kategori ekleme alanı boş bırakılamaz.';
    };

?>

<form action="#" method="POST" class="w-50 mx-auto my-5">
        <label for="post_category">Kategori Giriniz</label>
        <input type="text" name="post_category" id="post_category" class="form-control mb-3 mt-1" placeholder="Eklemek istediğiniz kategoriyi giriniz" >
        <?php if (!empty($category_err)): ?>
            <span class="invalid-feedback">
                <?=$category_err?>
            </span>
        <?php endif; ?>

        <?php if (!empty($added_success)):?>
            <div class="alert alert-success">
                <?=$added_success?>
            </div>
        <?php endif; ?>
        
        <input type="submit" name="add_post_cat" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
</form>