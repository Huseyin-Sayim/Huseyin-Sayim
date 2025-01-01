<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">İnfo</h1>
          </div><!-- /.col -->
          
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                    $book_count = mysqli_num_rows(get_books());
                    echo $book_count; 
                  ?>
                </h3>

                <p>Kitaplar</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book-bookmark"></i>
              </div>
              <a href="<?=SITE?>/index.php?page=kitaplar.php" class="small-box-footer">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php 
                    $writers_count = mysqli_num_rows(get_writer());
                    echo $writers_count;
                  ?>
                </h3>

                <p>Yazarlar</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-secret"></i>
              </div>
              <a href="<?=SITE?>/index.php?page=yazarlar.php" class="small-box-footer">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  <?php 
                    $my_posts = mysqli_num_rows(get_posts());
                    echo $my_posts;
                  ?>
                </h3>

                <p>Yazılarım</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-feather"></i>
              </div>
              <a href="<?=SITE?>/index.php?page=yazılar.php" class="small-box-footer">Daha Fazla<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                    $book_cat = mysqli_num_rows(get_category());
                    echo $book_cat;
                  ?>
                </h3>

                <p>Kitap Kategori</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-layer-group"></i>
              </div>
              <a href="<?=SITE?>/index.php?page=book_categories.php" class="small-box-footer">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                    $post_cat = mysqli_num_rows(get_post_category());
                    echo $post_cat;
                  ?>
                </h3>

                <p>Yazı Kategori</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-table-list"></i>
              </div>
              <a href="<?=SITE?>/index.php?page=post_categories.php" class="small-box-footer">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
    </section>
  </div>