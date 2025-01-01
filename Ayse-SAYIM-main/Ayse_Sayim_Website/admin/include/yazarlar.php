<?php 
  if (isset($_POST['search_writer'])) {
    $keyword = $_POST['search_writer'];
    if (!empty($keyword)) {
      $writerss = get_filter_writer($keyword);
    } else {
      $writerss = get_writer();
    }
  } else {
    $writerss = get_writer();
  };
?>
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yazarlar</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            
              <a href="<?=SITE?>/index.php?page=yazar_ekle.php" class="btn btn-primary float-right" >Yazar Ekle</a>
          </div>
          <div class="card-input">
            <form action="#" method="POST">
              <div class="input-group">
                <input type="text" name="search_writer" id="search_writer" class="form-control" placeholder="Search writer" >
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          İsim
                      </th>
                      <th style="width: 30%">
                          Ülke
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php while ($writer = mysqli_fetch_assoc($writerss)): ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              <?=$writer['isim']; ?>
                          </a>
                      </td>
                      <td>
                          <a>
                            <?=$writer['ülke']; ?>
                          </a>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="<?=SITE.'index.php?page=edit_writer.php&id='.$writer['Id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm delete" href="<?=SITE.'index.php?page=delete_writer.php&id='.$writer['Id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Sil
                          </a>
                      </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
          </table>

          <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bu ögeyi silmek istediğinize emin misiniz ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Hayır</button>
                    <button type="button" class="btn btn-primary" id="confirm">Evet</button>
                    <!-- <a href="" class="btn btn-danger" id="confirm"></a> -->
                </div>
                </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>

  <script>
    $('.delete').click((e) => {
      e.preventDefault();
      $('.modal').show();
      let element = e.target.getAttribute('href');
      $('#confirm').click(() => {
        window.location.href = element;
      });
      $('#close').click(() => {
        $('.modal').hide();
      })
    })
  </script>