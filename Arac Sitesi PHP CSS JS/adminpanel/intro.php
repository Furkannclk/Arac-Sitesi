<?php include 'includes/head.php'; ?>
<body>
  <div class="container-scroller">
    
    <?php include 'includes/navbar.php' ?>
    
    <div class="container-fluid page-body-wrapper">

      <?php include 'includes/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12">
              <?php if($_GET['action'] == 'ok') { echo "<div class='card p-3 my-4 bg-primary'>";
    echo "<b class='text-white'>İşlem Başarılı</b>";
    echo "</div>"; } ?>
              <?php if($_GET['action'] == 'no') { echo "<div class='card p-3 my-4 bg-danger'>";
    echo "<b class='text-white'>İşlem Başarısız</b>";
    echo "</div>"; } ?>
              <div class="card p-4">
                <div class="card-header">
                  <p></p>
                </div>
                <div class="card-body row">
                  <div class="col-md-6">
                    <form class="" action="includes/action.php" method="post">
                      <label for="" class="form-label">Yazı:</label>
                      <textarea type="" class="form-control" id="editor" name="text"><?php echo getIntroText(); ?></textarea>
        							<script>
        								CKEDITOR.replace( 'editor' );
        							</script>
                      <button type="submit" class="btn btn-primary my-2" name="updateIntroText">Güncelle</button>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <table class="table table-responsive table-striped" id="dataTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>İmage</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $sql = "SELECT * FROM intro WHERE id!=1";
                        foreach ($db->query($sql) as $key) { $sira++; ?>
                          <tr>
                            <td><?php echo $sira; ?></td>
                            <td> <img src="../<?php echo $key['image'] ?>" alt=""></td>
                            <td>
                              <a href="includes/action.php?sil=ok&p=intro&id=<?php echo $key['id'] ?>" class="btn btn-sm btn-danger p-2">Sil</a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <hr>
                    <form class="" action="includes/action.php" enctype="multipart/form-data" method="post">
                      <div class="form-group">
                        <label for="" class="form-label">Resim:</label>
                        <span style="font-size: 12px; font-weight: bold;" class="d-flex mb-3 text-primary">Çoklu yükleme işlemi yapabilirsiniz.</span>
                        <input type="file" name="image[]" class="form-control" multiple>
                      </div>
                      <button type="submit" class="btn btn-primary" name="introImageEkle">Ekle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include 'includes/footer.php'; ?>
