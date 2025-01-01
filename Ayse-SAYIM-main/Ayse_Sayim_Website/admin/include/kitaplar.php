<?php 
  if (isset($_POST['search_book'])) {
    $keyword = $_POST['search_book'];
    if (!empty($keyword)) {
      $books = get_filter_book($keyword);
    } else {
      $books = get_books();
    }
  } else {
    $books = get_books();
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
            <h1>Kitaplarım</h1>
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
              <a href="<?=SITE?>/index.php?page=kitap_ekle.php" class="btn btn-primary float-right" >Kitap Ekle</a>
          </div>
          <div class="card-input">
            <form action="#" method="POST">
              <div class="input-group">
                <input type="text" name="search_book" id="search_book" class="form-control" placeholder="Search book" >
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects" id="book_table">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Book Name
                      </th>
                      <th style="width: 30%">
                          Writer
                      </th>
                      <th style="width: 30%">
                          Category
                      </th>
                      <th>
                          Date
                      </th>
                      
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php while ($book = mysqli_fetch_assoc($books)): ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              <?=$book['kitap_adi']; ?>
                          </a>
                      </td>
                      <td class="book_name">
                          <a>
                            <?php 
                              echo $book['isim'];
                            ?>
                          </a>
                      </td>
                      <td>
                          <a>
                            <?=$book['kategori']?>
                          </a>
                      </td>
                      <td class="project_progress">
                          <?=$book['tarih']; ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm my-2" href="<?=SITE.'index.php?page=edit_book.php&id='.$book['Id'];?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm delete" href="<?=SITE.'index.php?page=delete_book.php&id='.$book['Id'];?>">
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
    });
    
    // $('#search_book').keyup(() => {
    //   let keyword = $('#search_book').val();
    //   $.ajax({
    //     type: "POST",
    //     url: "controller/action/actionBooks.php",
    //     data: {key: keyword},
    //     dataType: "json",
    //     success: function (response) {
    //       // $('tbody').html(response);
    //       $('#tbody').html(response["responseText"]);

    //     },
    //     error: function (r) {
    //       $('#tbody').html(r["resonseText"]);
    //       console.log(r["responseText"]);
    //     }
    //   });
    // });

  </script>