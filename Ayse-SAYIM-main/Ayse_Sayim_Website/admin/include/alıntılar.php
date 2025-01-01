
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alıntılar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Alıntılar</h3>

          <div class="card-tools">
            
              <a href="<?=SITE.'index.php?page=alinti_ekle.php'?>" class="btn btn-primary float-right" >Alıntı Ekle</a>
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
                          Alıntı
                      </th>
                      <th style="width: 30%">
                          Kitap Adı
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php $quotations = get_quotation(); while ($quotation = mysqli_fetch_assoc($quotations)): ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              <?= substr($quotation['alıntı'], 0, 100). '...' ; ?>
                          </a>
                      </td>
                      <td>
                          <a class="font-weight-bold">
                            <?=$quotation['kitap_adi']; ?>
                          </a>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="<?=SITE.'index.php?page=edit_quotation.php&id='.$quotation['Id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm delete" href="<?=SITE.'index.php?page=delete_quotation.php&id='.$quotation['Id']?>">
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