<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=SITE?>" class="brand-link">
      <img src="img/aysesayimmain.jpg"  class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ayse SAYIM</span>
    </a>

  
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li id="pages" class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Sayfalar
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php $contentsss = get_contents(); while ($content = mysqli_fetch_assoc($contentsss)): ?>
              <li class="nav-item">
                <a href="<?=SITE?>/index.php?page=<?=strtolower($content['item_url']).'.php' ?>" class="nav-link bg-secondary">
                  <i class="far fa-circle nav-icon"></i>
                  <p> <?=$content['items'] ;?> </p>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link bg-success">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Ekleme işlemleri
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=SITE?>index.php?page=kitap_ekle.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kitap Ekle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=SITE?>/index.php?page=yazar_ekle.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Yazar Ekle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=SITE?>/index.php?page=alinti_ekle.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Alıntı Ekle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=SITE?>/index.php?page=yazi_ekle.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Yazı Ekle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=SITE?>/index.php?page=add_book_category.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kitap Kategorisi Ekle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=SITE?>/index.php?page=add_post_category.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Yazı Kategorisi Ekle</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link bg-warning">
            <i class="fa-solid fa-user-lock mr-2"></i>
            <p>
              Hesap
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=SITE.'index.php?page=edit_password.php'?>" class="nav-link">
                  <i class="fa-solid fa-key mx-1"></i>
                  <p> Düzenle </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=SITE.'index.php?page=logout.php'?>" class="nav-link">
                  <i class="fa-solid fa-right-from-bracket mx-1"></i>
                  <p> Çıkış Yap </p>
                </a>
              </li>
          </ul>
        </li>

      </ul>
    </nav>
  
  </aside>

  <script type="text/javascript" src="sweatalert/script.js"></script>