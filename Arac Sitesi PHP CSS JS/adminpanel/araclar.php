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
              <div class="card p-4">
                <div class="card-header">
                  <h2>Araçlar</h2>
                </div>

                <div class="card-body">
                  <?php if(!isset($_GET['p'])) { ?>
                  <table id="dataTable" class="table table-responsive table-hover table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Resmi</th>
                        <th>İsmi</th>
                        <th>Kategori</th>
                        <th>Açıklama</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $sql = "SELECT * FROM araclar";
                      foreach ($db->query($sql) as $key) { $sira++; ?>
                        <tr>
                          <td><?php echo $sira ?></td>
                          <td><img src="../<?php echo $key['image'] ?>"></td>
                          <td><?php echo $key['name'] ?></td>
                          <td><?php echo getCatName($key['kategori']) ?></td>
                          <td><?php echo $key['aciklama'] ?></td>
                          <td>
                            <a href="includes/action.php?sil=ok&p=arac&id=<?php echo $key['id'] ?>" class="btn btn-danger btn-sm p-2">Sil</a>
                            <a href="araclar.php?p=edit&id=<?php echo $key['id'] ?>" class="btn btn-warning btn-sm p-2">Düzenle</a>
                          </td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                <?php } ?>
                <?php if($_GET['p'] == 'add') { ?>
                  <div class="col-md-6">
                    <form class="forms-sample" action="includes/action.php" enctype="multipart/form-data" method="post">
                      <div class="form-group">
                        <label for="" class="form-label">Araba İsmi</label>
                        <input type="text" class="form-control" name="carName">
                      </div>
                        <div class="form-group">
                        <label for="" class="form-label">Araba fiyat</label>
                        <input type="text" class="form-control" name="carPrice">
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Araba Resmi</label>
                        <input type="file" class="form-control" name="carImage">
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Araba Kategori</label>
                        <select class="form-control" name="carCategory">
                          <option value="">Araba Kategorisi Seçin</option>
                          <?php

                          $sql = "SELECT * FROM categories";
                          foreach ($db->query($sql) as $key) { ?>
                            <option class="form-control" value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Araç Açıklama:</label>
                        <textarea type="" class="form-control" id="editor" name="text"></textarea>
          							<script>
          								CKEDITOR.replace( 'editor' );
          							</script>
                      </div>
                      <button type="submit" name="addCar" class="btn btn-primary btn-block">Ekle</button>
                    </form>
                  </div>
                <?php } ?>
                <?php if($_GET['p'] == 'edit') { ?>
                  <?php

                  $id = $_GET['id'];
                  $sql = $db->prepare("SELECT * FROM araclar WHERE id=?");
                  $sql->execute(array($id));
                  $cek = $sql->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <div class="col-md-6">
                    <form class="forms-sample" action="includes/action.php" enctype="multipart/form-data" method="post">
                      <div class="form-group">
                        <label for="" class="form-label">Araba İsmi</label>
                        <input type="text" class="form-control" name="carName" value="<?php echo $cek['name'] ?>">
                      </div>
                        <div class="form-group">
                        <label for="" class="form-label">Araba Fiyatı</label>
                        <input type="text" class="form-control" name="carPrice" value="<?php echo $cek['carPrice'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Araba Resmi</label>
                        <img src="../<?php echo $cek['image'] ?>" alt="" width="100">
                        <input type="file" class="form-control" name="carImage">
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Araba Kategori</label>
                        <select class="form-control" name="carCategory">
                          <option value="<?php echo $cek['kategori'] ?>"><?php echo getCatName($cek['kategori']) ?></option>
                          <option value="" disabled>---------------</option>
                          <?php

                          $sql = "SELECT * FROM categories";
                          foreach ($db->query($sql) as $key) { ?>
                            <option class="form-control" value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">Araç Açıklama:</label>
                        <textarea type="" class="form-control" id="editor" name="text"><?php echo $cek['aciklama'] ?></textarea>
          							<script>
          								CKEDITOR.replace( 'editor' );
          							</script>
                      </div>
                      <input type="hidden" value="<?php echo $id ?>" name="id">
                      <button type="submit" name="editCar" class="btn btn-primary btn-block">Düzenle</button>
                    </form>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include 'includes/footer.php'; ?>
